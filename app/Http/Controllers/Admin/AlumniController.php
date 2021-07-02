<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

// use Request
use Illuminate\Http\Request;

// use Model
use App\Models\Alumni;

// use Plugin
use Yajra\DataTables\Facades\DataTables;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Query = Alumni::all();
        if(request()->ajax()){
            return DataTables::of($Query)
                ->addIndexColumn()
                ->addColumn('nama', function($data){
                    return $data->nama;
                })
                ->addColumn('kelas', function($data){
                    return $data->kelas->nama;
                })
                ->addColumn('ttl', function($data){
                    return $data->ttl;
                })
                ->addColumn('email', function($data){
                    return $data->email;
                })
                ->addColumn('alamat', function($data){
                    return $data->alamat;
                })
                ->addColumn('no_hp', function($data){
                    return $data->no_hp;
                })
                ->addColumn('pekerjaan', function($data){
                    return $data->pekerjaan;
                })
                ->addColumn('perusahaan', function($data){
                    return $data->perusahaan;
                })
                ->make();
        }

        return view('admin.master-data.alumni.index');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
