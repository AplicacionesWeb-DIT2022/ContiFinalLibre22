<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Lugare\BulkDestroyLugare;
use App\Http\Requests\Admin\Lugare\DestroyLugare;
use App\Http\Requests\Admin\Lugare\IndexLugare;
use App\Http\Requests\Admin\Lugare\StoreLugare;
use App\Http\Requests\Admin\Lugare\UpdateLugare;
use App\Models\Lugare;
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

class LugaresController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexLugare $request
     * @return array|Factory|View
     */
    public function index(){
        $data['lugares']=Lugare::paginate(100);
        Log::debug("XXXXXXXXXXXXXX");
        return response()->json([$data], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.lugare.create');

        return view('admin.lugare.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLugare $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreLugare $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Lugare
        $lugare = Lugare::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/lugares'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/lugares');
    }

    /**
     * Display the specified resource.
     *
     * @param Lugare $lugare
     * @throws AuthorizationException
     * @return void
     */
    public function show(Lugare $lugare)
    {
        $this->authorize('admin.lugare.show', $lugare);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Lugare $lugare
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Lugare $lugare)
    {
        $this->authorize('admin.lugare.edit', $lugare);


        return view('admin.lugare.edit', [
            'lugare' => $lugare,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLugare $request
     * @param Lugare $lugare
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateLugare $request, Lugare $lugare)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Lugare
        $lugare->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/lugares'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/lugares');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyLugare $request
     * @param Lugare $lugare
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyLugare $request, Lugare $lugare)
    {
        $lugare->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyLugare $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyLugare $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Lugare::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
