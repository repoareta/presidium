<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\TenagaKesehatan;
use Maatwebsite\Excel\Concerns\Exportable;

class TenagaKesehatanExport implements FromCollection, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $datas = TenagaKesehatan::with(['kelas','province', 'regency','village','district'])
                                ->select('nama','kelas_id','profesi','ket_profesi', 'province_id','regency_id', 'district_id','village_id')->get();

        foreach($datas as $data){

                $data->kelas_id = $data->kelas->nama;
                $data->province_id = $data->province->name;
                $data->regency_id = $data->regency->name;
                $data->district_id = $data->district->name;
                $data->village_id = $data->village->name;
        }

        return $datas->setAutoSize(true);
    }
    
    public function headings() : array
    {
        return [
            'Nama',
            'Kelas',
            'Profesi',
            'Keterangan',
            'Tempat Bekerja - Provinsi',
            'Tempat Bekerja - Kabupaten',
            'Tempat Bekerja - Kecamatan',
            'Tempat Bekerja - Desa',
            'Tempat Bekerja - Instansi'
        ];
    }
}
