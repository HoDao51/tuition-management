<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\hocKy;
use App\Models\Admin\namHoc;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorehocKyRequest;
use App\Http\Requests\UpdatehocKyRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class HocKyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
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
    public function store(StorehocKyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(hocKy $hocKy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(hocKy $hocKy)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatehocKyRequest $request, hocKy $hocKy)
    {
       //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(hocKy $hocKy)
    {
        //
    }
}
