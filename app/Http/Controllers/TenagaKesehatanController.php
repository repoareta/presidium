<?php

namespace App\Http\Controllers;

// load Request
use Illuminate\Http\Request;
use App\Http\Requests\TenagaKesehatanRequest;

// load Model
use App\Models\TenagaKesehatan;
use App\Models\Province;
use App\Models\Kelas;

// load Plugin
use RealRashid\SweetAlert\Facades\Alert;

class TenagaKesehatanController extends Controller
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
        return view('user.forms.tenaga-kesehatan.create', compact('kelas', 'provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TenagaKesehatanRequest $request)
    {
        $Query = new TenagaKesehatan();

        $Query->nama = $request->nama;
        $Query->kelas_id = $request->kelas_id;
        if($request->profesi == 'T'){
            if(!$request->profesi_sendiri){
                return redirect()->back()->withErrors(['Input Profesi Jawaban Anda harus diisi']);
            }
            $request->profesi = $request->profesi_sendiri;
        }
        $Query->profesi = $request->profesi;
        $Query->ket_profesi = $request->ket_profesi;
        $Query->province_id = $request->province_id;
        $Query->regency_id = $request->regency_id;
        $Query->district_id = $request->district_id;
        $Query->village_id = $request->village_id;
        $Query->instansi = $request->instansi;
        $Query->save();

        Alert::success('Berhasil', 'Data anda berhasil disimpan')->persistent(true)->autoClose(3000);
        return redirect()->route('tenaga_kesehatan.finish');

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

    // finish the form
    public function finish()
    {
        return view('user.forms.tenaga-kesehatan.finish');
    }
}
