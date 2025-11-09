<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\hocPhi;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorehocPhiRequest;
use App\Http\Requests\UpdatehocPhiRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class HocPhiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admins.Tuition.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorehocPhiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(hocPhi $hocPhi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(hocPhi $hocPhi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatehocPhiRequest $request, hocPhi $hocPhi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(hocPhi $hocPhi)
    {
        //
    }
}
