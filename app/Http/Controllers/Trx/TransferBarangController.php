<?php

namespace App\Http\Controllers\Trx;

use App\Http\Controllers\Controller;
use App\Models\Master\Employee;
use App\Models\Master\ProfessionalTeam;
use App\Models\Master\Tournament;
use App\Models\Trx\TransferBarang;
use Illuminate\Http\Request;
use App\Http\Requests\Trx\TransferBarangRequest;
use App\Models\Master\Barang;
use App\Models\Master\Store;
use Illuminate\Support\Facades\DB;
use DOMPDF;


class TransferBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DB::select("SELECT distinct A.*,
        (case when b.id is null then 'New' else 'Confirmed' end) as 'status',
        C.nama_store as 'dari_store_nama',
        D.nama_store as 'tujuan_store_nama'
        FROM transfer_barangs A
        left join transfer_barang_details B on A.id = B.transfer_barang_id
        left join stores C on A.dari_store_id = C.id
        left join stores D on A.tujuan_store_id = D.id");

        return view('backend.pages.trx.transfer-barang.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $store_list = Store::all();
        return view('backend.pages.trx.transfer-barang.create', compact('store_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransferBarangRequest $request)
    {
        $data = $request->all();
        $data['no_document'] = randString(10);
        TransferBarang::create($data);

        return redirect()->route('trx.transfer-barang.index')->withSuccess('Berhasil tambah Header Transfer, silahkan pilih barang.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $store_list = Store::all();
        $item =  TransferBarang::findOrFail($id);
        $item_list_barang = DB::select("SELECT A.*,
        B.nama_barang,
        B.harga_jual,
        B.harga_beli
        FROM transfer_barang_details A
        left join barangs B on A.id_barang = B.id where A.transfer_barang_id = $id");
        $list_barang = Barang::all();
        return view('backend.pages.trx.transfer-barang.detail', compact('item','list_barang','item_list_barang','store_list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TransferBarang $eventTournament)
    {
        // $item = TransferBarang::findOrFail($id);
        $item = $eventTournament;
        // $employees = Employee::select('id', 'full_name', 'email')->get();

        return view('backend.pages.trx.transfer-barang.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransferBarangRequest $request, TransferBarang $eventTournament)
    {
        // $data = $request->only('employee_id', 'tanggal_awal', 'tanggal_akhir', 'keterangan');
        $data = $request->all();

        $eventTournament->update($data);

        return redirect()->route('trx.transfer-barang.index')->withSuccess('Event Tournament header data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransferBarang $eventTournament)
    {
        $eventTournament->delete();

        return redirect()->route('trx.transfer-barang.index')->withSuccess('Event Tournament header data deleted successfully.');
    }

    /**
     * Export data to pdf
     * @param int $id [appliance_check id]
     * @return void
     */
    public function download($trx_id)
    {
        $items = DB::select("SELECT A.*,B.id_barang,B.jumlah,
        C.nama_barang,C.kode_barang,C.harga_jual as 'harga'
        FROM transfer_barangs A
        left join transfer_barang_details B on A.id = B.transfer_barang_id
        left join barangs C on C.id = B.id_barang
        where A.id = $trx_id");

        $pdf = DOMPDF::loadView('backend.pages.trx.transfer-barang.report', compact('items'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('Invoice Barang Keluar.pdf');
    }
    /**
     * Export data to pdf
     * @param int $id [appliance_check id]
     * @return void
     */
    public function akumulasi()
    {
        $items = DB::select("SELECT A.*, COALESCE((select SUM(X.jumlah) from transfer_barang_details X where X.id_barang = A.id),0) as 'jumlah_keluar'
        FROM barangs A");
        $pdf = DOMPDF::loadView('backend.pages.trx.transfer-barang.akumulasi', compact('items'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('Akumulasi Barang Keluar.pdf');
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
