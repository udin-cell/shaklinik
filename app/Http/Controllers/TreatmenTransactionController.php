<?php

namespace App\Http\Controllers;

use App\Models\Bookingtreatmen;
use App\Models\BookingtreatmenItem;
use App\Models\TreatmenTransaction;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TreatmenTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
                    <td>
                    <span class="center">
                    <div class="btn-group mb-2 btn-group-sm">
                                   
                                    <form class="inline-block" action="' . route('dashboard.bookingtreatmen.edit', $item->id) . '" method="GET">
                                    <button class="btn btn-warning mr-3" >
                                        Edit
                                    </button>
                                        '  . csrf_field() . '
                                    </form>
                                    <form class="inline-block" action="' . route('dashboard.bookingtreatmen.show', $item->id) . '" method="GET">
                                    <button class="btn btn-primary mr-3" >
                                        Detail
                                    </button>
                                        '  . csrf_field() . '
                                    </form>
                                   
                                    
                             </div>
                    </span>
                    </td>
                    
                      ';
                })
                ->editColumn('total_price', function ($item) {
                    return "Rp." . number_format($item->total_price);
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.dashboard.transactiontreatmen.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TreatmenTransaction  $treatmenTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(Bookingtreatmen $bookingtreatman)
    {
        $transactionitem = BookingtreatmenItem::with(['treatmen'])->where('bookingtreatmens_id', $bookingtreatman->id)->get();

        return view('pages.dashboard.transactiontreatmen.show', compact('bookingtreatman', 'transactionitem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TreatmenTransaction  $treatmenTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Bookingtreatmen $bookingtreatman)
    {
        return view('pages.dashboard.transactiontreatmen.edit', [
            'item' => $bookingtreatman,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TreatmenTransaction  $treatmenTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bookingtreatmen $bookingtreatman)
    {
        $data = $request->all();

        $bookingtreatman->update($data);

        return redirect()->route('dashboard.bookingtreatmen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TreatmenTransaction  $treatmenTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(TreatmenTransaction $treatmenTransaction)
    {
        //
    }
}
