<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Kelas;
class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = array(
            ['nama' => 'Maverick - Fis1'],
            ['nama' => 'Blitzkrieg - Fis2'],
            ['nama' => 'Scream - Fis3'],
            ['nama' => 'Exist - Fis4'],
            ['nama' => 'Strive - Fis5'],
            ['nama' => 'Geteks - Fis6'],
            ['nama' => 'Toelalith - Fis7'],
            ['nama' => 'Error - Fis8'],
            ['nama' => 'Boomers - Bio1'],
            ['nama' => 'Beerers - Bio2'],
            ['nama' => 'Solid - Sos'],
        );

        foreach($datas as $data)
        {
            Kelas::firstOrCreate([
                'nama' => $data['nama']
            ]);
        }
    }
}
