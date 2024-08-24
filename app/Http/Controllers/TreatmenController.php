<?php

namespace App\Http\Controllers;

use App\Models\Categorytreatmen;
use App\Models\Treatmen;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TreatmenController extends Controller
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
            $query = Treatmen::with('bagian');

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
                                  
                                    <form class="inline-block" action="' . route('dashboard.treatmen.edit', $item->id) . '" method="GET">
                                    <button class="btn btn-warning mr-3" >
                                        Edit
                                    </button>
                                        '  . csrf_field() . '
                                    </form>
                                   
                                   
                                    <form class="inline-block" action="' . route('dashboard.treatmen.destroy', $item->id) . '" method="POST">
                                    <button class="btn btn-danger" >
                                        Hapus
                                    </button>
                                        ' . method_field('delete') . csrf_field() . '
                                    </form>
                             </div>
                    </span>
                    </td>
                    
                      ';
                })
                ->editColumn('tarif', function ($item) {
                    return "Rp." . number_format($item->tarif);
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.dashboard.treatmen.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Categorytreatmen::all();
        return view('pages.dashboard.treatmen.create', [
            'category' => $category,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $foto = $request->file('foto');
        $noKode = rand(111, 999);

        if ($request->hasFile('foto')) {

            $path_foto = $foto->store('public/gallery/foto/treatmentfoto');
            Treatmen::create([
                'foto'                      => $path_foto,
                'bagians_id'                => $request->bagians_id,
                'kode'                      =>  "AKK-" . $noKode,
                'nama_jasa'                 => $request->nama_jasa,
                'deskripsi'                 => $request->deskripsi,
                'jenis'                     => $request->jenis,
                'tarif'                     => $request->tarif,

            ]);
        } else {
            Treatmen::create([
                'bagians_id'                => $request->bagians_id,
                'kode'                      =>  "AKK-" . $noKode,
                'nama_jasa'                 => $request->nama_jasa,
                'deskripsi'                 => $request->deskripsi,
                'jenis'                     => $request->jenis,
                'tarif'                     => $request->tarif,

            ]);
        }

        return redirect()->route('dashboard.treatmen.index');
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
    public function edit(Treatmen $treatman)
    {
        $category = Categorytreatmen::all();
        return view('pages.dashboard.treatmen.edit', [
            'item' => $treatman,
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Treatmen $treatman)
    {
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $path_foto = $foto->store('public/gallery/foto/treatmentfoto');
            $treatman->update([
                'foto'                      => $path_foto,
                'bagians_id'                => $request->bagians_id,
                'nama_jasa'                 => $request->nama_jasa,
                'deskripsi'                 => $request->deskripsi,
                'jenis'                     => $request->jenis,
                'tarif'                     => $request->tarif,

            ]);
        } else {
            $treatman->update([
                'bagians_id'                => $request->bagians_id,
                'nama_jasa'                 => $request->nama_jasa,
                'deskripsi'                 => $request->deskripsi,
                'jenis'                     => $request->jenis,
                'tarif'                     => $request->tarif,

            ]);
        }

        return redirect()->route('dashboard.treatmen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Treatmen $treatman)
    {
        $treatman->delete();

        return redirect()->route('dashboard.treatmen.index');
    }
}
