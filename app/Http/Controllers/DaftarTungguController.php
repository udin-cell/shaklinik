<?php

namespace App\Http\Controllers;

use App\Models\DaftarTunggu;
use App\Models\Dokter;
use App\Models\Treatmen;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DaftarTungguController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dokter = Dokter::all();
        $pasien = User::where('roles', "USER")->get();
        $treatmen = Treatmen::all();

        if (request()->ajax()) {
            $query = DaftarTunggu::with('dokter', 'user', 'treatmen', 'treatmen.bagian');

            return DataTables::of($query)
                ->addColumn('DT_RowIndex', function ($item) use (&$counter) {
                    $counter++; // Inkremenkan counter setiap kali fungsi dipanggil
                    return $counter;
                })
                ->addColumn('action', function ($item) {
                    return '
                    <span class="center">
                    <div class="btn-group mb-2 mr-2 btn-group-sm">
                                   
                                    <a href="https://api.whatsapp.com/send?phone=' . $item->user->no_tlp . '&text=Terimakasih%20Telah%20Melakukan%20Pemesanan%20Di%20Shaklink.%0A%0ABerikut%20Detail%20Treatmen%20:%0ANo%20Urut%20anda%20:A-*' . $item->no_urut . '*,%0AKode%20Untuk%20Melngecheck%20Detailnya%20berikut%0AKode%20nya%20: *' . $item->kode_jadwal . '*,%0ADetail%20jadwal%20Treatmen.%0AJam%20%20: *' . $item->jam . '*,%0ATanggal%20%20: *' . $item->tgl . '*, %0ATolong%20Diharpakan%20Datang%20Lebih%20Awal%20Lima%20Menit%20Sebelum%20Kesepakatan%20Jadwal...%20%20%0A%0A%0A%0A%20Terimakasih%20*Admin-Shaklink..*" class="btn btn-success text-white mr-2">Kirim Invoice</a>

                                    <form class="inline-block" action="' . route('dashboard.daftartunggu.destroy', $item->id) . '" method="POST">
                                    <button class="btn btn-danger" >
                                        Hapus
                                    </button>
                                        ' . method_field('delete') . csrf_field() . '
                                    </form>
                             </div>
                    </span>    
                    
                    ';
                })
                ->editColumn('no_urut', function ($item) {
                    return "No Urut - A" . $item->no_urut;
                })
                ->editColumn('bagian', function ($item) {
                    return $item->treatmen->bagian->nama_bagian;
                })
                ->rawColumns(['action',])
                ->make();
        }

        return view('pages.dashboard.daftartunggu.index', compact('dokter', 'pasien', 'treatmen'));
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
        $data = $request->all();
        $noKode = rand(1111, 9999);
        $data['kode_jadwal'] =  "JD-" . $noKode;

        // Mendapatkan tanggal yang diinputkan
        $inputDate = Carbon::parse($data['tgl']);

        // Mendapatkan nomor urut terakhir pada tanggal yang diinputkan
        $nomorUrutTerakhir = DaftarTunggu::whereDate('tgl', $inputDate)->max('no_urut');

        // Jika tidak ada nomor urut sebelumnya, setel ke 0
        $nomorUrutTerakhir = $nomorUrutTerakhir ?? 0;

        // Increment nomor urut terakhir
        $nomorUrut = $nomorUrutTerakhir + 1;

        $data['no_urut'] = $nomorUrut;

        DaftarTunggu::create($data);

        return redirect()->route('dashboard.daftartunggu.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DaftarTunggu $daftartunggu)
    {
        $daftartunggu->delete();

        return redirect()->route('dashboard.daftartunggu.index');
    }
}
