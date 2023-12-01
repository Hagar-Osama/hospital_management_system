<?php

namespace App\Http\Repositories;

use App\Models\Section;

class SectionRepository
{

    public function index()
    {
        return Section::all();
    }

    public function store(array $sections)
    {
        return Section::create($sections);
    }

    public function update(array $sections, int $sectionId)
    {
       $section = Section::findOrFail($sectionId);
        return $section->update($sections);
    }

    public function destroy(int $sectionId)
    {
       return Section::findOrFail($sectionId)->delete();
    }

}
