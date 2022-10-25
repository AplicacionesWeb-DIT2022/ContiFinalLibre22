<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PuntosVentum\BulkDestroyPuntosVentum;
use App\Http\Requests\Admin\PuntosVentum\DestroyPuntosVentum;
use App\Http\Requests\Admin\PuntosVentum\IndexPuntosVentum;
use App\Http\Requests\Admin\PuntosVentum\StorePuntosVentum;
use App\Http\Requests\Admin\PuntosVentum\UpdatePuntosVentum;
use App\Models\PuntosVentum;
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

class PuntosVentaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPuntosVentum $request
     * @return array|Factory|View
     */
    public function index(IndexPuntosVentum $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(PuntosVentum::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nombre', 'direccion', 'descripcion', 'codigo postal'],

            // set columns to searchIn
            ['id', 'nombre', 'direccion', 'descripcion']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.puntos-ventum.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.puntos-ventum.create');

        return view('admin.puntos-ventum.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePuntosVentum $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePuntosVentum $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the PuntosVentum
        $puntosVentum = PuntosVentum::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/puntos-venta'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/puntos-venta');
    }

    /**
     * Display the specified resource.
     *
     * @param PuntosVentum $puntosVentum
     * @throws AuthorizationException
     * @return void
     */
    public function show(PuntosVentum $puntosVentum)
    {
        $this->authorize('admin.puntos-ventum.show', $puntosVentum);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PuntosVentum $puntosVentum
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(PuntosVentum $puntosVentum)
    {
        $this->authorize('admin.puntos-ventum.edit', $puntosVentum);


        return view('admin.puntos-ventum.edit', [
            'puntosVentum' => $puntosVentum,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePuntosVentum $request
     * @param PuntosVentum $puntosVentum
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePuntosVentum $request, PuntosVentum $puntosVentum)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values PuntosVentum
        $puntosVentum->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/puntos-venta'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/puntos-venta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPuntosVentum $request
     * @param PuntosVentum $puntosVentum
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPuntosVentum $request, PuntosVentum $puntosVentum)
    {
        $puntosVentum->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPuntosVentum $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPuntosVentum $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    PuntosVentum::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
