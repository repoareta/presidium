<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\PenyintasCovid;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;

class PenyintasCovidExport implements FromCollection, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $datas = PenyintasCovid::with(['kelas', 'province', 'regency', 'district', 'village'])
            ->select(
            'nama',
            'kelas_id',
            'jenkel',
            'goldar',
            'rhesus',
            'sembuh',
            'province_id',
            'regency_id',
            'district_id',
            'village_id',
            'donor_plasma')
            ->get();
        
        foreach($datas as $data){
            $data->sembuh = Carbon::parse($data->sembuh)->locale('id')->isoFormat('LL');
            if($data->jenkel == 'L'){
                $data->jenkel = 'Laki-laki';
            }else{
                $data->jenkel = 'Perempuan';
            }
            if($data->donor_plasma == 1){
                $data->donor_plasma = 'Iya';
            }else{
                $data->donor_plasma = 'Tidak';
            }
            $data->kelas_id = $data->kelas->nama;
            $data->province_id = $data->province->name;
            $data->regency_id = $data->regency->name;
            $data->district_id = $data->district ? $data->district->name : '';
            $data->village_id = $data->village ? $data->village->name : '';
        }

        return $datas;
    }

    public function headings() : array
    {
        return [
            'Nama',
            'Kelas',
            'Jenkel',
            'Goldar',
            'Rhesus',
            'Tanggal Sembuh',
            'Provinsi',
            'Kabupaten',
            'Kecamatan',
            'Desa',
            'Donor Plasma'
        ];
    }
}
