<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Http\Requests\TransactionRequest;
use App\Models\TransactionItem;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
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
            $query = Transaction::query();

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
                                   <a href="https://api.whatsapp.com/send?phone=' . $item->user->no_tlp . '&text=Terimakasih%20Sudah%20Memesan%20Produk%20Di%20Shaklinik.%0ABerikut%20Kode%20Invoice%20anda%0A%0AKode%20Invoice%20:%20*' . $item->kode_inv . '*%0A%0ASilahkan%20check%20invoice%20anda%20di%20menu%20%22Check%20Invoice%22%20agar%20dapat%20mengetahui%20apakah%20Betul%20Detail%20Produk%20yang%20anda%20pesan%20sesuai%0A%0Aterimkasih%20*Admin-%20Shaklinik%20Clara*-." class="btn btn-success text-white mr-2">Kirim Invoice</a>


                                    <form class="inline-block" action="' . route('dashboard.transaction.edit', $item->id) . '" method="GET">
                                    <button class="btn btn-warning mr-3" >
                                        Edit
                                    </button>
                                        '  . csrf_field() . '
                                    </form>
                                    <form class="inline-block" action="' . route('dashboard.transaction.show', $item->id) . '" method="GET">
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

        return view('pages.dashboard.transaction.index');
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TransactionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show(Transaction $transaction)
    {
        $transactionitem = TransactionItem::with(['product'])->where('transactions_id', $transaction->id)->get();


        return view('pages.dashboard.transaction.show', compact('transaction', 'transactionitem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Transaction $transaction)
    {
        return view('pages.dashboard.transaction.edit', [
            'item' => $transaction
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TransactionRequest $request, Transaction $transaction)
    {
        $data = $request->all();

        $transaction->update($data);

        return redirect()->route('dashboard.transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
