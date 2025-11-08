<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\lop;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorelopRequest;
use App\Http\Requests\UpdatelopRequest;
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
        return view('admins.layouts.main');
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
    public function store(StorelopRequest $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatelopRequest $request, lop $lop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(lop $lop)
    {
        //
    }
}
