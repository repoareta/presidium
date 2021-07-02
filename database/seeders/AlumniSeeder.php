<?php

namespace Database\Seeders;

use Flynsarmy\CsvSeeder\CsvSeeder;
use Illuminate\Support\Facades\DB;
class AlumniSeeder extends CsvSeeder
{

    public function __construct()
    {
        $this->table = 'alumni';
        $this->filename = base_path().'/database/data/csvs/alumni.csv';

    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        // Recommended when importing larger CSVs
		DB::disableQueryLog();

		// Uncomment the below to wipe the table clean before populating
		// DB::table($this->table)->truncate();

		parent::run();
    }
}
