<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\bienLai;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorebienLaiRequest;
use App\Http\Requests\UpdatebienLaiRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class BienLaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admins.Receipt.index');
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
    public function store(StorebienLaiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(bienLai $bienLai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bienLai $bienLai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatebienLaiRequest $request, bienLai $bienLai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bienLai $bienLai)
    {
        //
    }
}
