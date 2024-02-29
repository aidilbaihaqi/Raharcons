<?php

namespace App\Http\Controllers;

use App\Models\FormReq;
use Illuminate\Http\Request;

class FormReqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.formReq', [
            'title'=>'Form Request',
        ]);
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
     * @param  \App\Models\FormReq  $formReq
     * @return \Illuminate\Http\Response
     */
    public function show(FormReq $formReq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormReq  $formReq
     * @return \Illuminate\Http\Response
     */
    public function edit(FormReq $formReq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FormReq  $formReq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormReq $formReq)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormReq  $formReq
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormReq $formReq)
    {
        //
    }
}
