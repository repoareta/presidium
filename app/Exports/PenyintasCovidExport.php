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
        $datas = PenyintasCovid::select(
            'nama',
            'kelas',
            'jenkel',
            'goldar',
            'rhesus',
            'sembuh',
            'kota',
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
        }

        return $datas;
    }

    public function headings() : array
    {
        return ['Nama','Kelas','Jenkel','Goldar','Rhesus','Tanggal Sembuh','Kota Domisili','Donor Plasma'];
    }
}
