<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

// use Request
use Illuminate\Http\Request;

// use Model
use App\Models\TenagaKesehatan;

// use Export 
use App\Exports\TenagaKesehatanExport;

// use Plugin
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel;

class TenagaKesehatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $Query = TenagaKesehatan::all();
            return DataTables::of($Query)
                ->addIndexColumn()
                ->addColumn('nama', function($data){
                    return $data->nama;
                })
                ->addColumn('kelas', function($data){
                    return $data->kelas->nama;
                })
                ->addColumn('profesi', function($data){
                    return $data->profesi;
                })
                ->addColumn('ket_profesi', function($data){
                    return $data->ket_profesi;
                })
                ->addColumn('province', function($data){
                    return $data->province->name;
                })
                ->addColumn('regency', function($data){
                    return $data->regency->name;
                })
                ->addColumn('district', function($data){
                    if($data->district){
                        return $data->district->name;
                    }
                })
                ->addColumn('village', function($data){
                    if($data->village){
                        return $data->village->name;
                    }
                })
                ->addColumn('instansi', function($data){
                    return $data->instansi;
                })
                ->make();
        }

        return view('admin.report.tenaga-kesehatan');
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

    public function exportExcel()
    {
        return Excel::download(new TenagaKesehatanExport, 'tenaga-kesehatan.xlsx');
    }
}
