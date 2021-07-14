<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

// use Request
use Illuminate\Http\Request;

// use Model
use App\Models\PasienCovid;
use App\Models\PenyintasCovid;

// use Export 
use App\Exports\PasienCovidExport;

// use Plugin
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
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
                    return $data->kelas->nama;
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
                ->addColumn('kondisi', function($data){
                    return $data->kondisi;
                })
                ->addColumn('support', function($data){
                    return $data->support;
                })
                ->addColumn('action', function($data){
                    return '
                        <button class="btn btn-success btn-shadow-hover" data-id="'.$data->id.'" id="toPenyintas">Menjadi Penyintas</button>
                    ';
                })
                ->rawColumns(['action'])
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

    public function toPenyintas(Request $request)
    {
        $pasien = PasienCovid::find($request->id);

        $validator = Validator::make($request->all(), [
            'sembuh' => 'required|date',
            'donor_plasma' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Error', 'Isi semua input')->persistent(true)->autoClose(4000);
            return redirect()->back();
        }

        $penyintas = new PenyintasCovid();
        $penyintas->nama = $pasien->nama;
        $penyintas->kelas_id = $pasien->kelas_id;
        $penyintas->jenkel = $pasien->jenkel;
        $penyintas->goldar = $pasien->goldar;
        $penyintas->rhesus = $pasien->rhesus;
        $penyintas->sembuh = Carbon::parse($request->sembuh)->format('Y-m-d');
        $penyintas->province_id = $pasien->province_id;
        $penyintas->village_id = $pasien->village_id;
        $penyintas->regency_id = $pasien->regency_id;
        $penyintas->district_id = $pasien->district_id;
        $penyintas->donor_plasma = $request->donor_plasma == 'T' ? true : false;
        $penyintas->save();

        $pasien->delete();
        
        Alert::success('Success', 'Data sudah menjadi penyintas')->persistent(true)->autoClose(4000);
        return redirect()->back();
    }
}
