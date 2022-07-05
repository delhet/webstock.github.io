<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\KategoriRequest;
use App\Models\Master\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Kategori::all();

        return  view('backend.pages.master.kategori.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.master.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KategoriRequest $request)
    {
        $data = $request->all();

        Kategori::create($data);

        return redirect()->route('master.kategori.index')->withSuccess('Kategori data added successfully.');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $Kategori)
    {
        $item = $Kategori;

        return view('backend.pages.master.kategori.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KategoriRequest $request,Kategori $Kategori)
    {
        $data = $request->all();

        $Kategori->update($data);

        return redirect()->route('master.kategori.index')->withSuccess('Kategori data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $Kategori)
    {
        $Kategori->delete();

        return redirect()->route('master.kategori.index')->withSuccess('Kategori data deleted successfully.');
    }


    /// API Area
    public function getKategori() {
        return response()->json(Kategori::all(), 200);
    }

    public function getKategoriById($id) {
        $kategori = Kategori::find($id);
        if(is_null($kategori)){
            return response()->json(['message' => 'Kategori not found.'], 404);
        }
        return response()->json($kategori,200);
    }

    public function addKategori(KategoriRequest $request) {
        $data = $request->all();

        Kategori::create($data);
        return response()->json(['message' => 'Kategori saved successfully.'], 200);
    }

    public function updateKategori(KategoriRequest $request) {
        $data = $request->all();
        $kategori = Kategori::find($data['id']);
        if(is_null($kategori)){
            return response()->json(['message' => 'Kategori not found.'], 404);
        }

        $kategori->update($data);
        return response()->json(['message' => 'Kategori updated successfully.'], 200);
    }

    public function deleteKategori($id) {
        $kategori = Kategori::find($id);
        if(is_null($kategori)){
            return response()->json(['message' => 'Kategori not found.'], 404);
        }
        $kategori->delete();
        return response()->json(['message' => 'Kategori deleted successfully.'], 200);
    }
}
