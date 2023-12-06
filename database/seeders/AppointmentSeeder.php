<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('appointments')->delete();
        $Appointments = [
            ['day' => 'saturday'],
            ['day' => 'sunday'],
            ['day' => 'monday'],
            ['day' => 'tuesday'],
            ['day' => 'wednesday'],
            ['day' => 'thursday'],
            ['day' => 'friday'],
        ];
        foreach ($Appointments as $Appointment) {
            Appointment::create($Appointment);
        }


    }
}
