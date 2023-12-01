<?php

namespace App\Http\Services;

use App\Http\Repositories\SectionRepository;
use App\Models\Section;

class SectionService
{
    private SectionRepository $sectionRepository;
    public function __construct(SectionRepository $sectionRepository)
    {
        $this->sectionRepository = $sectionRepository;
    }

    public function index()
    {
        return $this->sectionRepository->index();
    }

    public function store(array $request)
    {
        return $this->sectionRepository->store($request);

    }

    public function update(array $request, int $sectionId)
    {
        return $this->sectionRepository->update($request, $sectionId);

    }


    public function destroy(int $sectionId)
    {
        return $this->sectionRepository->destroy($sectionId);

    }
}
