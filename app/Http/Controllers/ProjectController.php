<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\monitoring;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = Project::all();
        return view('pages.project', [
            'title'=>'Project',
            'project'=>$project,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $monitoring = monitoring::where('id_project', '=', $project->id)->get();
        return view('pages.project-detail', [
            'title'=>'Project-Detail',
            'project'=>$project,
            'monitoring'=>$monitoring,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('pages.project-edit', [
            'title'=>'Project-Edit',
            'project'=>$project,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'nama_project' => 'required',
            'categories' => 'required',
            'lokasi' => 'required',
            'luas_area' => 'required',
            'time_plan' => 'required',
            'more_desc' => 'required',
        ]);
        $project->update($request->all());
        $project->save();
        return redirect()
                ->route('project.index')
                ->with('editSuccess', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()
                ->route('project.index')
                ->with('destroySuccess', 'Data berhasil dihapus!');  
    }
}
