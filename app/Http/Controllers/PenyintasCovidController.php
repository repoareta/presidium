<?php

namespace App\Http\Controllers;

// load Request
use Illuminate\Http\Request;
use App\Http\Requests\PenyintasCovidRequest;

// load Model
use App\Models\PenyintasCovid;
use App\Models\Province;
use App\Models\Kelas;

// load Plugin
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class PenyintasCovidController extends Controller
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
    public function create()
    {
        $kelas = Kelas::all();
        $provinces = Province::all();
        return view('user.forms.penyintas-covid.create', compact('kelas', 'provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PenyintasCovidRequest $request)
    {
        $Query = New PenyintasCovid();

        $Query->nama = $request->nama;
        $Query->kelas_id = $request->kelas_id;
        $Query->jenkel = $request->jenkel;
        $Query->goldar = $request->goldar;
        $Query->rhesus = $request->rhesus;
        $Query->sembuh = Carbon::parse($request->sembuh)->format('Y-m-d');
        $Query->province_id = $request->province_id;
        $Query->village_id = $request->village_id;
        $Query->regency_id = $request->regency_id;
        $Query->district_id = $request->district_id;
        $Query->donor_plasma = $request->donor_plasma == 'T' ? true : false ;
        $Query->save();

        Alert::success('Berhasil', 'Data anda berhasil disimpan')->persistent(true)->autoClose(3000);
        return redirect()->route('penyintas_covid.finish');
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

    // Finish the form
    public function finish()
    {
        return view('user.forms.penyintas-covid.finish');
    }
}
