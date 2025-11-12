<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\namHoc;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorenamHocRequest;
use App\Http\Requests\UpdatenamHocRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class NamHocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = namHoc::orderBy('id', 'desc')->where('deleted', false)->get();
        return view('admins.schoolYear.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.schoolYear.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorenamHocRequest $request)
    {
        $tenNamHoc = $request->tenNamHoc;
        $ngayBatDau = $request->ngayBatDau;
        $ngayKetThuc = $request->ngayKetThuc;

        $namHoc = namHoc::create([
            'tenNamHoc' => $tenNamHoc,
            'ngayBatDau' => $ngayBatDau,
            'ngayKetThuc' => $ngayKetThuc
        ]);

        return Redirect::route('namHoc.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(namHoc $namHoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(namHoc $namHoc)
    {
        return view('admins.schoolYear.edit', compact('namHoc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatenamHocRequest $request, namHoc $namHoc)
    {
        $tenNamHoc = $request->tenNamHoc;
        $ngayBatDau = $request->ngayBatDau;
        $ngayKetThuc = $request->ngayKetThuc;

        $namHoc->update([
            'tenNamHoc' => $tenNamHoc,
            'ngayBatDau' => $ngayBatDau,
            'ngayKetThuc' => $ngayKetThuc
        ]);

        return Redirect::route('namHoc.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(namHoc $namHoc)
    {
        $namHoc->deleted = true;
        $namHoc->save(); 
        return redirect::route('namHoc.index');
    }
}
