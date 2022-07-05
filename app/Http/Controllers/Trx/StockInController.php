<?php

namespace App\Http\Controllers\Trx;

use App\Http\Controllers\Controller;
use App\Models\Trx\StockIn;
use Illuminate\Http\Request;
use App\Http\Requests\Trx\StockInRequest;
use App\Models\Master\Barang;
use App\Models\Trx\StockInDetail;
use Illuminate\Support\Facades\DB;
use DOMPDF;

class StockInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DB::select("SELECT distinct A.*, (case when b.id is null then 'New' else 'Confirmed' end) as 'status'
        FROM stock_ins A
        left join stock_in_details B on A.id = B.stock_in_id ");

        return view('backend.pages.trx.stock-in.index', compact('items'));
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
    public function store(StockInRequest $request)
    {
        $data = $request->all();
        $data['no_document'] = randString(10);
        StockIn::create($data);

        return redirect()->route('trx.stock-in.index')->withSuccess('Berhasil tambah Header Barang Masuk, silahkan pilih barang.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item =  StockIn::findOrFail($id);
        $item_list_barang = DB::select("SELECT A.*,
        B.nama_barang,
        B.harga_jual,
        B.harga_beli
        FROM stock_in_details A
        left join barangs B on A.id_barang = B.id where A.stock_in_id = $id");
        $list_barang = Barang::all();
        return view('backend.pages.trx.stock-in.detail', compact('item','list_barang','item_list_barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(StockIn $data_obj)
    {
        // $item = StockIn::findOrFail($id);
        $item = $data_obj;
        // $employees = Employee::select('id', 'full_name', 'email')->get();

        return view('backend.pages.trx.stock-in.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StockInRequest $request, StockIn $data_obj)
    {
        // $data = $request->only('employee_id', 'tanggal_awal', 'tanggal_akhir', 'keterangan');
        $data = $request->all();

        $data_obj->update($data);

        return redirect()->route('trx.stock-in.index')->withSuccess('Event Tournament header data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StockIn $data_obj)
    {
        $data_obj->delete();

        return redirect()->route('trx.stock-in.index')->withSuccess('Event Tournament header data deleted successfully.');
    }

    /**
     * Export data to pdf
     * @param int $id [appliance_check id]
     * @return void
     */
    public function download($trx_id)
    {
        $items = DB::select("SELECT A.*,B.id_barang,B.jumlah,
        C.nama_barang,C.kode_barang,C.harga_beli as 'harga'
        FROM stock_ins A
        left join stock_in_details B on A.id = B.stock_in_id
        left join barangs C on C.id = B.id_barang
        where A.id = $trx_id");

        $pdf = DOMPDF::loadView('backend.pages.trx.stock-in.report', compact('items'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('Invoice Barang Masuk.pdf');
    }
    /**
     * Export data to pdf
     * @param int $id [appliance_check id]
     * @return void
     */
    public function akumulasi()
    {
        $items = DB::select("SELECT A.*, COALESCE((select SUM(X.jumlah) from stock_in_details X where X.id_barang = A.id),0) as 'jumlah_masuk'
        FROM barangs A");
        $pdf = DOMPDF::loadView('backend.pages.trx.stock-in.akumulasi', compact('items'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('Akumulasi Barang Masuk.pdf');
    }
}
function randString($length, $charset='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789')
{
    $str = '';
    $count = strlen($charset);
    while ($length--) {
        $str .= $charset[mt_rand(0, $count-1)];
    }
    return $str;
}
