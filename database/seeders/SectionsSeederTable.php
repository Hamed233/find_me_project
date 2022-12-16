<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionsSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->delete();

        // $sections = [
        //     ['en' => 'a', 'ar' => 'ا'],
        //     ['en' => 'b', 'ar' => 'ب'],
        //     ['en' => 'c', 'ar' => 'ت'],
        // ];

        // foreach ($sections as $section) {
        //     Section::create([
        //         'section_name' => $section,
        //         'status' => 1,
        //     ]);
        // }
    }
}
