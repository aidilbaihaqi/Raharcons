<?php

namespace App\Http\Controllers;

use App\Models\Req;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;

use DB;

class ReqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $req = Req::all();
        // $mandor = DB::table('users')->where('level', '=', 1)->get();
        $mandor = User::where('level', '=', 1)->get();
        return view('pages.request', [
            'title'=>'Request',
            'request'=>$req,
            'mandor' => $mandor,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.formReq', [
            'title'=>'Form Request',
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
            'nama_project' => 'required|unique:reqs|max:255',
            'categories' => 'required',
            'lokasi' => 'required',
            'luas_area' => 'required',
            'dana' => 'required',
            'time_plan' => 'required',
            'image' => 'image|file|max:1024',
            'more_desc' => 'max:225',
        ]);

        $validated['image'] = $request->file('image')->store('images');

        Req::create($validated);
        return redirect()->route('login')->with(['formReq' => 'Data berhasil dimasukkan']); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Req  $req
     * @return \Illuminate\Http\Response
     */
    public function show(Req $req)
    {
        return view('pages.request-detail', [
            'title'=>'Request-Detail',
            'req'=>$req,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Req  $req
     * @return \Illuminate\Http\Response
     */
    public function edit(Req $req)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Req  $req
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Req $req)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Req  $req
     * @return \Illuminate\Http\Response
     */
    public function destroy(Req $id)
    {
        $id->delete();
        return redirect()
                ->route('request.index')
                ->with('destroySuccess', 'Data berhasil dihapus!');        
    }

    //mandor = user id si mandor
    public function approveProject(Request $request, Req $req)
    {   
        Project::create([
            'nama_project' => $req->nama_project,
            'categories' => $req->categories,
            'lokasi' => $req->lokasi,
            'luas_area' => $req->luas_area,
            'nama_mandor' => $request->mandor,
            'dana' => $req->dana,
            'time_plan' => $req->time_plan,
            'image' => $req->image,
            'more_desc' => $req->more_desc,
        ]);

        $req->delete();
        return redirect()
                ->route('project.index')
                ->with('approveSuccess', 'Data berhasil disetujui');
    }
}
