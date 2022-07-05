<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\StoreRequest;
use App\Models\Master\Store;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Store::all();

        return  view('backend.pages.master.store.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.master.store.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->all();

        Store::create($data);

        return redirect()->route('master.store.index')->withSuccess('Store data added successfully.');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $Store)
    {
        $item = $Store;

        return view('backend.pages.master.store.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request,Store $Store)
    {
        $data = $request->all();

        $Store->update($data);

        return redirect()->route('master.store.index')->withSuccess('Store data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $Store)
    {
        $Store->delete();

        return redirect()->route('master.store.index')->withSuccess('Store data deleted successfully.');
    }


    /// API Area
    public function getStore() {
        return response()->json(Store::all(), 200);
    }

    public function getStoreById($id) {
        $store = Store::find($id);
        if(is_null($store)){
            return response()->json(['message' => 'Store not found.'], 404);
        }
        return response()->json($store,200);
    }

    public function addStore(StoreRequest $request) {
        $data = $request->all();

        Store::create($data);
        return response()->json(['message' => 'Store saved successfully.'], 200);
    }

    public function updateStore(StoreRequest $request) {
        $data = $request->all();
        $store = Store::find($data['id']);
        if(is_null($store)){
            return response()->json(['message' => 'Store not found.'], 404);
        }

        $store->update($data);
        return response()->json(['message' => 'Store updated successfully.'], 200);
    }

    public function deleteStore($id) {
        $store = Store::find($id);
        if(is_null($store)){
            return response()->json(['message' => 'Store not found.'], 404);
        }
        $store->delete();
        return response()->json(['message' => 'Store deleted successfully.'], 200);
    }
}
