<?php

namespace App\Http\Controllers;

use App\Models\Lms;
use Illuminate\Http\Request;

class LmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lms');
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lms  $lms
     * @return \Illuminate\Http\Response
     */
    public function show(Lms $lms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lms  $lms
     * @return \Illuminate\Http\Response
     */
    public function edit(Lms $lms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lms  $lms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lms $lms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lms  $lms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lms $lms)
    {
        //
    }
}
