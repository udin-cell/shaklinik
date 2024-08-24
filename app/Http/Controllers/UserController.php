<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Requests\UserRequest;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = User::where('roles', "USER");

            return DataTables::of($query)
                ->addColumn('DT_RowIndex', function ($item) use (&$counter) {
                    $counter++; // Inkremenkan counter setiap kali fungsi dipanggil
                    return $counter;
                })
                ->addColumn('action', function ($item) {
                    return '
                    <span class="center">
                    <div class="btn-group mb-2 btn-group-sm">
                                   
                                    <form class="inline-block" action="' . route('dashboard.user.edit', $item->id) . '" method="GET">
                                    <button class="btn btn-warning mr-3" >
                                        Edit
                                    </button>
                                        '  . csrf_field() . '
                                    </form>
                                   
                                   
                                    <form class="inline-block" action="' . route('dashboard.user.destroy', $item->id) . '" method="POST">
                                    <button class="btn btn-danger" >
                                        Hapus
                                    </button>
                                        ' . method_field('delete') . csrf_field() . '
                                    </form>
                             </div>
                    </span>    
                    
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.dashboard.user.index');
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
    public function store(UserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('pages.dashboard.user.edit', [
            'item' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->all();

        $user->update($data);

        return redirect()->route('dashboard.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('dashboard.user.index');
    }
}
