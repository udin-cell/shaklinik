<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Dokter::query();

            return DataTables::of($query)
                ->addColumn('DT_RowIndex', function ($item) use (&$counter) {
                    $counter++; // Inkremenkan counter setiap kali fungsi dipanggil
                    return $counter;
                })
                ->addColumn('action', function ($item) {
                    return '
                    <span class="center">
                    <div class="btn-group mb-2 btn-group-sm">
                                   
                                    <form class="inline-block" action="' . route('dashboard.dokter.edit', $item->id) . '" method="GET">
                                    <button class="btn btn-warning mr-3" >
                                        Edit
                                    </button>
                                        '  . csrf_field() . '
                                    </form>
                                   
                                    <form class="inline-block" action="' . route('dashboard.dokter.destroy', $item->id) . '" method="POST">
                                    <button class="btn btn-danger" >
                                        Hapus
                                    </button>
                                        ' . method_field('delete') . csrf_field() . '
                                    </form>
                             </div>
                    </span>    
                    
                    ';
                })
                ->editColumn('foto_dokter', function ($item) {
                    return '<img style="max-width: 150px;" src="' . ($item->foto_dokter) . '"/>';
                })
                ->editColumn('alamat', function ($item) {
                    return "$item->alamat";
                })
                ->rawColumns(['action', 'foto_dokter', 'alamat'])
                ->make();
        }

        return view('pages.dashboard.dokter.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.dokter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $foto = $request->file('foto_dokter');
        $noKode = rand(1111, 9999);

        if ($request->hasFile('foto_dokter')) {

            $path_foto = $foto->store('public/gallery/foto/dokter');
            Dokter::create([
                'foto_dokter'             => $path_foto,
                'kode_dokter'             =>  "KDT-" . $noKode,
                'nama_dokter'             => $request->nama_dokter,
                'no_tlpn'                 => $request->no_tlpn,
                'alamat'                  => $request->alamat,

            ]);
        } else {
            Dokter::create([

                'kode_dokter'             =>  "KDT-" . $noKode,
                'nama_dokter'             => $request->nama_dokter,
                'no_tlpn'                 => $request->no_tlpn,
                'alamat'                  => $request->alamat,


            ]);
        }

        return redirect()->route('dashboard.dokter.index');
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
    public function edit(Dokter $dokter)
    {
        return view('pages.dashboard.dokter.edit', [
            'item' => $dokter
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dokter $dokter)
    {
        $foto = $request->file('foto_dokter');
        $noKode = rand(1111, 9999);

        if ($request->hasFile('foto_dokter')) {

            $path_foto = $foto->store('public/gallery/foto/dokter');
            $dokter->update([
                'foto_dokter'             => $path_foto,
                'kode_dokter'             =>  "KDT-" . $noKode,
                'nama_dokter'             => $request->nama_dokter,
                'no_tlpn'                 => $request->no_tlpn,
                'alamat'                  => $request->alamat,

            ]);
        } else {
            $dokter->update([

                'kode_dokter'             =>  "KDT-" . $noKode,
                'nama_dokter'             => $request->nama_dokter,
                'no_tlpn'                 => $request->no_tlpn,
                'alamat'                  => $request->alamat,


            ]);
        }

        return redirect()->route('dashboard.dokter.index')->with('success', 'Dokter Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dokter $dokter)
    {
        $dokter->delete();

        return redirect()->route('dashboard.dokter.index');
    }
}
