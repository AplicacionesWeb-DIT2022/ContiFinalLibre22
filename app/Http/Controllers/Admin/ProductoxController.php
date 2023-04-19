<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Productox\BulkDestroyProductox;
use App\Http\Requests\Admin\Productox\DestroyProductox;
use App\Http\Requests\Admin\Productox\IndexProductox;
use App\Http\Requests\Admin\Productox\StoreProductox;
use App\Http\Requests\Admin\Productox\UpdateProductox;
use App\Models\Productox;
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

class ProductoxController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexProductox $request
     * @return array|Factory|View
     */
    public function index(IndexProductox $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Productox::class)->processRequestAndGet(
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

        return view('admin.productox.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.productox.create');

        return view('admin.productox.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductox $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreProductox $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Productox
        $productox = Productox::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/productoxes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/productoxes');
    }

    /**
     * Display the specified resource.
     *
     * @param Productox $productox
     * @throws AuthorizationException
     * @return void
     */
    public function show(Productox $productox)
    {
        $this->authorize('admin.productox.show', $productox);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Productox $productox
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Productox $productox)
    {
        $this->authorize('admin.productox.edit', $productox);


        return view('admin.productox.edit', [
            'productox' => $productox,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductox $request
     * @param Productox $productox
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateProductox $request, Productox $productox)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Productox
        $productox->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/productoxes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/productoxes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyProductox $request
     * @param Productox $productox
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyProductox $request, Productox $productox)
    {
        $productox->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyProductox $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyProductox $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Productox::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
