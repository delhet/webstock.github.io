<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Kategori;
use Illuminate\Support\Facades\DB;

class StockDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DB::select("select A.*,
        (select count(*) from barangs where for_store_id = A.id) as 'barang_toko',
        (select count(*) from transfer_barangs where dari_store_id = A.id) as 'barang_dikirim',
        (select count(*) from transfer_barangs where tujuan_store_id = A.id) as 'barang_diterima'
        from stores A");

        return  view('backend.pages.master.barang.store_stock', compact('items'));
    }
}
