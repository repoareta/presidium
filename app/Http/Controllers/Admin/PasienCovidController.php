<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

// use Request
use Illuminate\Http\Request;

// use Model
use App\Models\PasienCovid;

// use Export 
use App\Exports\PasienCovidExport;

// use Plugin
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel;

class PasienCovidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $Query = PasienCovid::all();
            return DataTables::of($Query)
                ->addIndexColumn()
                ->addColumn('nama', function($data){
                    return $data->nama;
                })
                ->addColumn('kelas', function($data){
                    return $data->kelas;
                })
                ->addColumn('jenkel', function($data){
                    return $data->jenkel == 'L' ? 'Laki-laki' : 'Perempuan';
                })
                ->addColumn('goldar', function($data){
                    return $data->goldar;
                })
                ->addColumn('rhesus', function($data){
                    return $data->rhesus;
                })
                ->addColumn('kota', function($data){
                    return $data->kota;
                })
                ->addColumn('kondisi', function($data){
                    return $data->kondisi;
                })
                ->addColumn('support', function($data){
                    return $data->support;
                })
                ->make();
        }

        return view('admin.report.pasien-covid');
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
        return Excel::download(new PasienCovidExport, 'pasien-covid.xlsx');
    }
}
