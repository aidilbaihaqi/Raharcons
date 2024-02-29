<?php

namespace App\Http\Controllers;

use App\Models\monitoring;
use App\Models\Project;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('pages.monitoring-create',[
            'title'=>'Create Monitoring Data',
            'id' => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_project' => 'required',
            'item' => 'required',
            'kuantitas' => 'required',
            'unit'=> 'required',
            'harga' => 'required', 
            'jenis' => 'required', 
            'source' => 'image|file|max:1024',
        ]);

        $validated['source'] = $request->file('image')->store('images');

        monitoring::create($validated);
        return redirect()->route('project.show', ['project' => $request->id_project])->with(['monitoring' => 'Data berhasil dimasukkan']); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function show(monitoring $monitoring)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function edit(monitoring $monitoring)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, monitoring $monitoring)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function destroy(monitoring $monitoring)
    {
        //
    }
}
