<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\PasienCovid;
use Maatwebsite\Excel\Concerns\Exportable;

class PasienCovidExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    public function collection()
    {
        $datas = PasienCovid::with(['kelas', 'province', 'regency','district','village'])
                            ->select(
                                'nama',
                                'kelas_id',
                                'jenkel',
                                'goldar',
                                'rhesus',
                                'province_id',
                                'regency_id',
                                'district_id',
                                'village_id',
                                'kondisi',
                                'support',
                                'emergency_number')
                            ->get();
        
        foreach($datas as $data){
            if($data->jenkel == 'L'){
                $data->jenkel = 'Laki-laki';
            }else{
                $data->jenkel = 'Perempuan';
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
            'Provinsi',
            'Kabupaten',
            'Kecamatan',
            'Desa',
            'Kondisi Saat Ini',
            'Support yang Diperlukan Saat Ini'
        ];
    }
}
