<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sections')->delete();
        $sections = [
            ['name' => 'ENT'],
            ['name' => 'neurology'],
            ['name' => 'maternity section'],
            ['name' => 'children section'],
        ];
        foreach ($sections as $section) {
            Section::create($section);
        }
    }
}
