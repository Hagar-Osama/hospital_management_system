<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('doctors')->delete();
        DB::table('doctor_translations')->delete();
        Doctor::factory(10)->create();
    }
}
