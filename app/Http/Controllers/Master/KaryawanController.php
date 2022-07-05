<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\KaryawanRequest;
use App\Models\Master\Karyawan;
use App\Models\Master\Store;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DB::select("SELECT A.*, C.nama_store FROM karyawans A
        left join stores C on A.for_store_id = C.id ");

        return  view('backend.pages.master.karyawan.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $store_list = Store::all();
        return view('backend.pages.master.karyawan.create', compact('store_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KaryawanRequest $request)
    {
        $data = $request->all();

        $data['password'] = Hash::make($request->password);
        Karyawan::create($data);

        return redirect()->route('master.karyawan.index')->withSuccess('Karyawan data added successfully.');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $Karyawan)
    {
        $store_list = Store::all();
        $item = $Karyawan;

        return view('backend.pages.master.karyawan.edit', compact('item','store_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KaryawanRequest $request,Karyawan $Karyawan)
    {
        $data = $request->all();

        $data['password'] = Hash::make($request->password);
        $Karyawan->update($data);

        return redirect()->route('master.karyawan.index')->withSuccess('Karyawan data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $Karyawan)
    {
        $Karyawan->delete();

        return redirect()->route('master.karyawan.index')->withSuccess('Karyawan data deleted successfully.');
    }


    /// API Area
    public function getKaryawan() {
        return response()->json(Karyawan::all(), 200);
    }

    public function getKaryawanById($id) {
        $karyawan = Karyawan::find($id);
        if(is_null($karyawan)){
            return response()->json(['message' => 'Karyawan not found.'], 404);
        }
        return response()->json($karyawan,200);
    }

    public function addKaryawan(KaryawanRequest $request) {
        $data = $request->all();

        Karyawan::create($data);
        return response()->json(['message' => 'Karyawan saved successfully.'], 200);
    }

    public function updateKaryawan(KaryawanRequest $request) {
        $data = $request->all();
        $karyawan = Karyawan::find($data['id']);
        if(is_null($karyawan)){
            return response()->json(['message' => 'Karyawan not found.'], 404);
        }

        $karyawan->update($data);
        return response()->json(['message' => 'Karyawan updated successfully.'], 200);
    }

    public function deleteKaryawan($id) {
        $karyawan = Karyawan::find($id);
        if(is_null($karyawan)){
            return response()->json(['message' => 'Karyawan not found.'], 404);
        }
        $karyawan->delete();
        return response()->json(['message' => 'Karyawan deleted successfully.'], 200);
    }
}
