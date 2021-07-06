<?php

namespace App\Http\Controllers;

// load Request
use Illuminate\Http\Request;
use App\Http\Requests\PasienCovidRequest;

// load Model
use App\Models\PasienCovid;
use App\Models\Kelas;
use App\Models\Province;

// load Plugin
use RealRashid\SweetAlert\Facades\Alert;

class PasienCovidController extends Controller
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
        return view('user.forms.pasien-covid.create', compact('kelas', 'provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PasienCovidRequest $request)
    {
        $Query = new PasienCovid();

        $Query->nama = $request->nama;
        $Query->kelas_id = $request->kelas_id;
        $Query->jenkel = $request->jenkel;
        $Query->goldar = $request->goldar;
        $Query->rhesus = $request->rhesus;
        $Query->province_id = $request->province_id;
        $Query->regency_id = $request->regency_id;
        $Query->district_id = $request->district_id;
        $Query->village_id = $request->village_id;
        $Query->emergency_number = '0'.$request->emergency_number;

        if($request->kondisi == 'T'){
            if(!$request->kondisi_sendiri){
                return redirect()->back()->withErrors(['Input Kondisi Jawaban Anda harus diisi']);
            }
            $request->kondisi = $request->kondisi_sendiri;
        }

        $objSupport = (object)($request->support);
        $countArr = count($request->support) - 1;
        $dataSupport = $request->support;
        
        if(end($objSupport) == 'T'){
            if(!$request->support_sendiri){
                return redirect()->back()->withErrors(['Input Support Jawaban Anda harus diisi']);
            }
            // $objSupport->append($request->support_sendiri);
            $arrSupport = (array)$objSupport;
            $replacement = array($countArr => $request->support_sendiri);
            $dataSupport = array_replace($arrSupport, $replacement);
            
        }
        
        if($countArr == 0){
            $finSupport = $dataSupport[0];
        }
        if($countArr == 1){
            $finSupport = $dataSupport[0].', '.$dataSupport[1];
        }
        if($countArr == 2){
            $finSupport = $dataSupport[0].', '.$dataSupport[1].', '.$dataSupport[2];
        }
        if($countArr == 3){
            $finSupport = $dataSupport[0].', '.$dataSupport[1].', '.$dataSupport[2];
        }
        if($countArr == 4){
            $finSupport = $dataSupport[0].', '.$dataSupport[1].', '.$dataSupport[2].', '.$dataSupport[3].', '.$dataSupport[4];
        }

        $Query->kondisi = $request->kondisi;
        $Query->support = $finSupport;
        $Query->save();

        Alert::success('Berhasil', 'Data anda berhasil disimpan')->persistent(true)->autoClose(3000);
        return redirect()->route('pasien_covid.finish');
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
        return view('user.forms.pasien-covid.finish');
    }
}
