<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
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
            $query = Product::with('category');

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
                                    <form class="inline-block" action="' . route('dashboard.product.gallery.index', $item->id) . '" method="GET">
                                    <button class="btn btn-primary mr-3" >
                                        Gallery
                                    </button>
                                        '  . csrf_field() . '
                                    </form>
                                    <form class="inline-block" action="' . route('dashboard.product.edit', $item->id) . '" method="GET">
                                    <button class="btn btn-warning mr-3" >
                                        Edit
                                    </button>
                                        '  . csrf_field() . '
                                    </form>
                                   
                                   
                                    <form class="inline-block" action="' . route('dashboard.product.destroy', $item->id) . '" method="POST">
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

        return view('pages.dashboard.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('pages.dashboard.product.create', [
            'category' => $category,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $noKode = rand(1111, 9999);
        $data['kode'] =  "P-" . $noKode;
        $data['slug'] = Str::slug($request->name);

        Product::create($data);

        return redirect()->route('dashboard.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Product $product)
    {
        $category = Category::all();
        return view('pages.dashboard.product.edit', [
            'item' => $product,
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);

        $product->update($data);

        return redirect()->route('dashboard.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('dashboard.product.index');
    }
}
