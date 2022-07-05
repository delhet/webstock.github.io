<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PortfolioCategory as Category;
use App\Models\Portfolio;
use App\Models\Landing;
use App\Models\Master\Karyawan;
use App\Models\Master\Barang;
use App\Models\Service;
use App\Models\Trx\Order;
use App\Models\Trx\StockIn;
use App\Models\Trx\TransferBarang;

class DashboardController extends Controller
{
    public function index()
    {
        $countMasterKaryawan = Karyawan::all()->count();
        $countMasterBarang = Barang::all()->count();
        $countTrxMasuk = StockIn::all()->count();
        $countTrxKeluar = TransferBarang::all()->count();
        return view('backend.pages.dashboard',
        compact('countMasterKaryawan',
                'countMasterBarang',
                'countTrxMasuk',
                'countTrxKeluar'));
    }

    public function landing(Request $request)
    {
        return redirect('cms');
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function searchCity(Request $request)
    {
        $data = null;
        $keyword = $request->input('search');
        if ($keyword) {
            $data = City::where('name', 'like', '%'.$keyword.'%')
                        ->select('id', 'name as text')
                        ->get()->toArray();
        }

        return response()->json($data);
    }

    public function getPrice(Request $request) {
        $data = null;
        $code = 200;
        $from = $request->from_city_id;
        $to   = $request->to_city_id;

        if ($from && $to) {
            $data = PricingCity::whereFromCityId($from)
                                ->whereToCityId($to)
                                ->first();
            $code = $data ? $code : 404;
        } else {
            $code = 400;
        }

        return response()->json($data, $code);
    }

    public function tracking(Request $request) {
        // dd($request->all());
        $data = Order::with(
                'customer:id,name',
                'fromArea:id,name',
                'toArea:id,name',
                'pricingCity:id,price',
                'tracks'
            )->whereTrackingCode($request->tracking_code)->first();
        // dd($data);
        return view('frontend.pages.resi', compact('data'));
    }
}
