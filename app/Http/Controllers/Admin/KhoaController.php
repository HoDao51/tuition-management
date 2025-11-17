<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\khoa;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorekhoaRequest;
use App\Http\Requests\UpdatekhoaRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class KhoaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = khoa::orderBy('id', 'desc')->where('deleted', 0)->get();
        return view('admins.department.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorekhoaRequest $request)
    {
        $tenKhoa = $request->tenKhoa;
        $tenKhoa = khoa::create([
            'tenKhoa' => $tenKhoa,
        ]);

        return redirect::route('khoa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(khoa $khoa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(khoa $khoa)
    {
        return view('admins.department.edit', compact('khoa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatekhoaRequest $request, khoa $khoa)
    {
        $tenKhoa = $request->tenKhoa;
        $khoa->update([
            'tenKhoa' => $tenKhoa,
        ]);

        return redirect::route('khoa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(khoa $khoa)
    {
        $khoa->deleted = true;
        $khoa->save(); 
        return redirect::route('khoa.index');
    }
}
