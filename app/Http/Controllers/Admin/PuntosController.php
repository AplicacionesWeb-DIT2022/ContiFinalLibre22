<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Punto\BulkDestroyPunto;
use App\Http\Requests\Admin\Punto\DestroyPunto;
use App\Http\Requests\Admin\Punto\IndexPunto;
use App\Http\Requests\Admin\Punto\StorePunto;
use App\Http\Requests\Admin\Punto\UpdatePunto;
use App\Models\Punto;
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

class PuntosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPunto $request
     * @return array|Factory|View
     */
    public function index(IndexPunto $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Punto::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            [''],

            // set columns to searchIn
            ['']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.punto.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.punto.create');

        return view('admin.punto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePunto $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePunto $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Punto
        $punto = Punto::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/puntos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/puntos');
    }

    /**
     * Display the specified resource.
     *
     * @param Punto $punto
     * @throws AuthorizationException
     * @return void
     */
    public function show(Punto $punto)
    {
        $this->authorize('admin.punto.show', $punto);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Punto $punto
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Punto $punto)
    {
        $this->authorize('admin.punto.edit', $punto);


        return view('admin.punto.edit', [
            'punto' => $punto,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePunto $request
     * @param Punto $punto
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePunto $request, Punto $punto)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Punto
        $punto->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/puntos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/puntos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPunto $request
     * @param Punto $punto
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPunto $request, Punto $punto)
    {
        $punto->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPunto $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPunto $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Punto::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
