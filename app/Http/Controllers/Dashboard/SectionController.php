<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSectionRequest;
use App\Http\Requests\updateSectionRequest;
use App\Http\Services\SectionService;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    private SectionService $sectionService;

    public function __construct(SectionService $sectionService)
    {
        $this->sectionService = $sectionService;
    }

    public function index()
    {
       $sections = $this->sectionService->index();
        return view('dashboard.sections.index', compact('sections'));

    }

    public function store(CreateSectionRequest $request)
    {
        $this->sectionService->store($request->validated());
        session()->flash('success', trans("dashboard/messages.add"));
        return redirect()->route('admin.sections.index');
    }

    public function update(updateSectionRequest $request, $sectionId)
    {
        $this->sectionService->update($request->validated(), $sectionId);
        session()->flash('success', trans("dashboard/messages.edit"));
        return redirect()->route('admin.sections.index');
    }

    public function destroy($sectionId)
    {
        $this->sectionService->destroy($sectionId);
        session()->flash('success', trans("dashboard/messages.delete"));
        return redirect()->route('admin.sections.index');
    }
}
