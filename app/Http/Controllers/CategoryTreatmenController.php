<?php

namespace App\Http\Controllers;

use App\Models\Categorytreatmen;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryTreatmenController extends Controller
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
            $query = Categorytreatmen::query();

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
                                  
                                    <form class="inline-block" action="' . route('dashboard.categorytreatmen.edit', $item->id) . '" method="GET">
                                    <button class="btn btn-warning mr-3" >
                                        Edit
                                    </button>
                                        '  . csrf_field() . '
                                    </form>
                                   
                                   
                                    <form class="inline-block" action="' . route('dashboard.categorytreatmen.destroy', $item->id) . '" method="POST">
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
                ->editColumn('price', function ($item) {
                    return number_format($item->price);
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.dashboard.kategoritreatmen.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.kategoritreatmen.create');
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
        $data['kode'] =  "CT-" . $noKode;
        Categorytreatmen::create($data);
        return redirect()->route('dashboard.categorytreatmen.index');
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
    public function edit(Categorytreatmen $categorytreatman)
    {
        return view('pages.dashboard.kategoritreatmen.edit', [
            'item' => $categorytreatman
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorytreatmen $categorytreatman)
    {
        $data = $request->all();

        $categorytreatman->update($data);

        return redirect()->route('dashboard.categorytreatmen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorytreatmen $categorytreatman)
    {
        $categorytreatman->delete();

        return redirect()->route('dashboard.categorytreatmen.index');
    }
}
