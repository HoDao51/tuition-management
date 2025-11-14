<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\lop;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorelopRequest;
use App\Http\Requests\UpdatelopRequest;
use App\Models\Admin\khoa;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class LopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = lop::with('khoa')->orderBy('id', 'desc')->where('deleted', 0)->get();
        return view('admins.class.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $khoa = khoa::where('deleted', false)->get();
        return view('admins.class.create', compact('khoa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorelopRequest $request)
    {
        $tenLop = $request->tenLop;
        $id_khoa = $request->id_khoa;
        $Lop = lop::create([
            'tenLop' => $tenLop,
            'id_khoa' => $id_khoa,
        ]);

        return redirect::route('lop.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(lop $lop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(lop $lop)
    {
        $khoa = khoa::where('deleted', false)->get();
        return view('admins.class.edit', compact('lop', 'khoa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatelopRequest $request, lop $lop)
    {
        $tenLop = $request->tenLop;
        $id_khoa = $request->id_khoa;

        $lop->update([
            'tenLop' => $tenLop,
            'id_khoa' => $id_khoa,
        ]);

        return redirect::route('lop.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(lop $lop)
    {
        $lop->deleted = true;
        $lop->save(); 
        return redirect::route('khoa.index');
    }
}
