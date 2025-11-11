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
        return view('admins.schoolYear.index');
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
    public function store(StorenamHocRequest $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatenamHocRequest $request, namHoc $namHoc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(namHoc $namHoc)
    {
        //
    }
}
