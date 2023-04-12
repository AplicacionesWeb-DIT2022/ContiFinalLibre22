<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Producto\BulkDestroyProducto;
use App\Http\Requests\Admin\Producto\DestroyProducto;
use App\Http\Requests\Admin\Producto\IndexProducto;
use App\Http\Requests\Admin\Producto\StoreProducto;
use App\Http\Requests\Admin\Producto\UpdateProducto;
use App\Models\Producto;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProductosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexProducto $request
     * @return array|Factory|View
     */
    public function index(IndexProducto $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Producto::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'descripcion', 'tipo', 'precio', 'cantidad'],

            // set columns to searchIn
            ['id', 'descripcion', 'tipo']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.producto.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.producto.create');

        return view('admin.producto.create', [
            'producto' => new Producto()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProducto $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreProducto $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Producto
        $producto = Producto::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/productos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/productos');
    }

    /**
     * Display the specified resource.
     *
     * @param Producto $producto
     * @throws AuthorizationException
     * @return void
     */
    public function show(Producto $producto)
    {
        $this->authorize('admin.producto.show', $producto);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Producto $producto
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Producto $producto)
    {
        $this->authorize('admin.producto.edit', $producto);


        return view('admin.producto.edit', [
            'producto' => $producto,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProducto $request
     * @param Producto $producto
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateProducto $request, Producto $producto)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Producto
        $producto->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/productos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyProducto $request
     * @param Producto $producto
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyProducto $request, Producto $producto)
    {
        $producto->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyProducto $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyProducto $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Producto::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
