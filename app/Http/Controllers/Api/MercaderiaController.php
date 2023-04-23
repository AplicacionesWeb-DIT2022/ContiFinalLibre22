<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Mercaderium\BulkDestroyMercaderium;
use App\Http\Requests\Admin\Mercaderium\DestroyMercaderium;
use App\Http\Requests\Admin\Mercaderium\IndexMercaderium;
use App\Http\Requests\Admin\Mercaderium\StoreMercaderium;
use App\Http\Requests\Admin\Mercaderium\UpdateMercaderium;
use App\Models\Mercaderium;
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

use Illuminate\Support\Facades\Log;

use Spatie\FlareClient\Api;

class MercaderiaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexMercaderium $request
     * @return array|Factory|View
     */
    public function index(IndexMercaderium $request)
    {
        $data['productos']= Producto::all();
        return json_encode($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.mercaderium.create');

        return view('admin.mercaderium.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMercaderium $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreMercaderium $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Mercaderium
        $mercaderium = Mercaderium::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/mercaderia'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/mercaderia');
    }

    /**
     * Display the specified resource.
     *
     * @param Mercaderium $mercaderium
     * @throws AuthorizationException
     * @return void
     */
    public function show(Mercaderium $mercaderium)
    {
        $this->authorize('admin.mercaderium.show', $mercaderium);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Mercaderium $mercaderium
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Mercaderium $mercaderium)
    {
        $this->authorize('admin.mercaderium.edit', $mercaderium);


        return view('admin.mercaderium.edit', [
            'mercaderium' => $mercaderium,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMercaderium $request
     * @param Mercaderium $mercaderium
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateMercaderium $request, Mercaderium $mercaderium)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Mercaderium
        $mercaderium->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/mercaderia'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/mercaderia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyMercaderium $request
     * @param Mercaderium $mercaderium
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyMercaderium $request, Mercaderium $mercaderium)
    {
        $mercaderium->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyMercaderium $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyMercaderium $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Mercaderium::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
