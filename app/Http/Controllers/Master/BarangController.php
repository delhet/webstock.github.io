<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\BarangRequest;
use App\Models\Master\Barang;
use App\Models\Master\Kategori;
use App\Models\Master\Store;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DB::select("SELECT A.*, B.kategori_barang,C.nama_store FROM barangs A
        left join kategoris B on A.id_kategori = B.id
        left join stores C on A.for_store_id = C.id ");

        return  view('backend.pages.master.barang.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $store_list = Store::all();
        $kategori_list = Kategori::all();
        return view('backend.pages.master.barang.create', compact('kategori_list','store_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BarangRequest $request)
    {
        $data = $request->all();

        Barang::create($data);

        return redirect()->route('master.barang.index')->withSuccess('Barang data added successfully.');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $Barang)
    {
        $store_list = Store::all();
        $kategori_list = Kategori::all();
        $item = $Barang;

        return view('backend.pages.master.barang.edit', compact('item','kategori_list','store_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BarangRequest $request,Barang $Barang)
    {
        $data = $request->all();

        $Barang->update($data);

        return redirect()->route('master.barang.index')->withSuccess('Barang data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $Barang)
    {
        $Barang->delete();

        return redirect()->route('master.barang.index')->withSuccess('Barang data deleted successfully.');
    }

    public function list_stock()
    {
        $items = DB::select("SELECT A.*, B.kategori_barang FROM barangs A
        left join kategoris B on A.id_kategori = B.id ");

        return  view('backend.pages.master.barang.store_stock', compact('items'));
    }


    /// API Area
    public function getBarang() {
        return response()->json(Barang::all(), 200);
    }

    public function getBarangById($id) {
        $barang = Barang::find($id);
        if(is_null($barang)){
            return response()->json(['message' => 'Barang not found.'], 404);
        }
        return response()->json($barang,200);
    }

    public function addBarang(BarangRequest $request) {
        $data = $request->all();

        Barang::create($data);
        return response()->json(['message' => 'Barang saved successfully.'], 200);
    }

    public function updateBarang(BarangRequest $request) {
        $data = $request->all();
        $barang = Barang::find($data['id']);
        if(is_null($barang)){
            return response()->json(['message' => 'Barang not found.'], 404);
        }

        $barang->update($data);
        return response()->json(['message' => 'Barang updated successfully.'], 200);
    }

    public function deleteBarang($id) {
        $barang = Barang::find($id);
        if(is_null($barang)){
            return response()->json(['message' => 'Barang not found.'], 404);
        }
        $barang->delete();
        return response()->json(['message' => 'Barang deleted successfully.'], 200);
    }
}
