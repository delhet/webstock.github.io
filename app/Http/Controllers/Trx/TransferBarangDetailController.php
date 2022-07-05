<?php

namespace App\Http\Controllers\Trx;

use App\Http\Controllers\Controller;
use App\Http\Requests\Trx\TransferBarangDetailRequest;
use App\Models\Trx\TransferBarang;
use App\Models\Trx\TransferBarangDetail;
use App\Models\Master\Barang;
use Illuminate\Http\Request;

class TransferBarangDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = TransferBarang::all();
        return view('backend.pages.trx.transfer-barang.detail', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.trx.transfer-barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransferBarangDetailRequest $request)
    {
        $data = $request->all();

        $data_barang = Barang::findOrfail($data['id_barang']);
        $data_header = TransferBarang::findOrfail($data['transfer_barang_id']);

        if($data_barang->stock < $data['jumlah']){
            return redirect()->back()->withFailed(' stock tidak mencukupi berdasarkan jumlah.');
        }
        $data_barang->stock = $data_barang->stock - $data['jumlah'];
        TransferBarangDetail::create($data);
        $data_barang->update();


        $data_barang_tujuan = Barang::where("kode_barang","=",$data_barang->kode_barang)->where('for_store_id', '=', $data_header['tujuan_store_id'])->first();
        if(!is_null($data_barang_tujuan)){
            $data_barang_tujuan->stock = $data_barang->stock + $data['jumlah'];
            $data_barang_tujuan->update();
        }
        else{
            $data_barang_tujuan = $data_barang;
            $data_barang_tujuan->for_store_id =  $data_header['tujuan_store_id'];
            $data_barang_tujuan->stock = $data['jumlah'];
            $data_barang_tujuan->save();

        }
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

        return view('backend.pages.trx.transfer-barang.detail', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = TransferBarang::findOrFail($id);

        return view('backend.pages.trx.transfer-barang.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransferBarangDetailRequest $request, TransferBarangDetail $data_objDetail)
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
        $data = TransferBarangDetail::findOrFail($id);
        $data_barang = Barang::findOrfail($data['id_barang']);

        $data_barang->stock = $data_barang->stock - $data['jumlah'];
        $data_barang->update();
        $data->delete();
        return redirect()->back()
                        ->withSuccess(' deleted successfully.');
    }
}
