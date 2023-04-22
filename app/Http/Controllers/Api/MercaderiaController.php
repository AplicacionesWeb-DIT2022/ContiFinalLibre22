<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Mercaderia\BulkDestroyMercaderia;
use App\Http\Requests\Admin\Mercaderia\DestroyMercaderia;
use App\Http\Requests\Admin\Mercaderia\IndexMercaderia;
use App\Http\Requests\Admin\Mercaderia\StoreMercaderia;
use App\Http\Requests\Admin\Mercaderia\UpdateMercaderia;
use App\Models\Mercaderia;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Validator;
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

class MercaderiaController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @param IndexMercaderia $request
     * @return array|Factory|View
     */
    public function index(){
        $data['mercaderia'] = Mercaderia::all();
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
        $this->authorize('admin.mercaderia.create');

        return view('admin.mercaderia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMercaderia $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreMercaderia $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Mercaderia
        // $Mercaderia = Mercaderia::create($sanitized);
        $mercaderia = Mercaderia::create($request->validated());

        if ($request->ajax()) {
            return ['redirect' => url('admin/mercaderias'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }
        return redirect('admin/mercaderias');
    }

    /**
     * Display the specified resource.
     *
     * @param Mercaderia $mercaderia
     * @throws AuthorizationException
     * @return void
     */
    public function show(Mercaderia $mercaderia)
    {
        $this->authorize('admin.mercaderia.show', $mercaderia);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Mercaderia $mercaderia
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Mercaderia $mercaderia)
    {
        $this->authorize('admin.mercaderia.edit', $mercaderia);
        return view('admin.mercaderia.edit', [
            'mercaderia' => $mercaderia,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMercaderia $request
     * @param Mercaderia $mercaderia
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateMercaderia $request, Mercaderia $mercaderia)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values mercaderia
        $mercaderia->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/mercaderia'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/mercaderias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyMercaderia $request
     * @param Mercaderia $mercaderia
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyMercaderia $request, Mercaderia $mercaderia)
    {
        $mercaderia->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyMercaderia $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyMercaderia $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Mercaderia::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
