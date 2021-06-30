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
        $datas = TenagaKesehatan::select(
                                    'nama',
                                    'kelas',
                                    'profesi',
                                    'ket_profesi',
                                    'kota',
                                    'provinsi',
                                    'instansi')
                                    ->get();

        return $datas;
    }
    
    public function headings() : array
    {
        return ['Nama','Kelas','Profesi','Keterangan','Tempat Bekerja - Kota','Tempat Bekerja - Provinsi','Tempat Bekerja - Instansi'];
    }
}
