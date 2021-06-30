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
        $datas = PasienCovid::select(
                                'nama',
                                'kelas',
                                'jenkel',
                                'goldar',
                                'rhesus',
                                'kota',
                                'kondisi',
                                'support')
                                ->get();
        
        foreach($datas as $data){
            if($data->jenkel == 'L'){
                $data->jenkel = 'Laki-laki';
            }else{
                $data->jenkel = 'Perempuan';
            }
        }

        return $datas;
    }

    public function headings() : array
    {
        return ['Nama','Kelas','Jenkel','Goldar','Rhesus','Kota Domisili','Kondisi Saat Ini','Support yang Diperlukan Saat Ini'];
    }
}
