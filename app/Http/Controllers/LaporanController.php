<?php

namespace App\Http\Controllers;

use App\Models\Bookingtreatmen;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LaporanController extends Controller
{
    //

    public function laporant()
    {
        $counter = 0;
        if (request()->ajax()) {
            $query = Transaction::query();

            return DataTables::of($query)
                ->addColumn('DT_RowIndex', function ($item) use (&$counter) {
                    $counter++; // Inkremenkan counter setiap kali fungsi dipanggil
                    return $counter;
                })
                ->addColumn('action', function ($item) {
                    return '
                  
                    
                      ';
                })
                ->editColumn('total_price', function ($item) {
                    return "Rp." . number_format($item->total_price);
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.dashboard.laporan.laporantransaction');
    }

    public function laporantx()
    {
        $counter = 0;
        if (request()->ajax()) {
            $query = Bookingtreatmen::with('user');

            return DataTables::of($query)
                ->addColumn('DT_RowIndex', function ($item) use (&$counter) {
                    $counter++; // Inkremenkan counter setiap kali fungsi dipanggil
                    return $counter;
                })
                ->addColumn('action', function ($item) {
                    return '
                    ';
                })
                ->editColumn('total_price', function ($item) {
                    return "Rp." . number_format($item->total_price);
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.dashboard.laporan.laporantreatmen');
    }
}
