<?php

namespace App\Http\Controllers\Trx;

use App\Http\Controllers\Controller;
use App\Http\Requests\Trx\StockInDetailRequest;
use App\Models\Trx\StockIn;
use App\Models\Trx\StockInDetail;
use App\Models\Master\Barang;
use Illuminate\Http\Request;

class StockInDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = StockIn::all();
        return view('backend.pages.trx.stock-in.detail', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.trx.stock-in.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StockInDetailRequest $request)
    {
        $data = $request->all();

        $data_barang = Barang::findOrfail($data['id_barang']);


        $data_barang->stock = $data_barang->stock + $data['jumlah'];
        StockInDetail::create($data);
        $data_barang->update();
        return redirect()->back()->withSuccess(' added successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item =  (object) [];

        return view('backend.pages.trx.stock-in.detail', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = StockIn::findOrFail($id);

        return view('backend.pages.trx.stock-in.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StockInDetailRequest $request, StockInDetail $data_objDetail)
    {
        $data = $request->all();

        return redirect()->back()
                        ->withSuccess(' updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = StockInDetail::findOrFail($id);
        $data_barang = Barang::findOrfail($data['id_barang']);

        $data_barang->stock = $data_barang->stock + $data['jumlah'];
        $data_barang->update();
        $data->delete();
        return redirect()->back()
                        ->withSuccess(' deleted successfully.');
    }
}
