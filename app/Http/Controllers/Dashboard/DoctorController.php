<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Enums\DoctorStatusEnum;
use App\Http\Repositories\SectionRepository;
use App\Http\Requests\CreateDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Http\Services\DoctorService;
use App\Http\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    use UploadTrait;
    private DoctorService $doctorService;
    private SectionRepository $sectionRepository;

    public function __construct(DoctorService $doctorService, SectionRepository $sectionRepository)
    {
        $this->doctorService = $doctorService;
        $this->sectionRepository = $sectionRepository;
    }

    public function index()
    {
        $doctors = $this->doctorService->index();
        return view('dashboard.doctors.index', compact('doctors'));
    }


    public function create()
    {
        $sections = $this->sectionRepository->index();
        return view('dashboard.doctors.create', compact('sections'));
    }

    public function store(CreateDoctorRequest $request)
    {
        $imageName = '';
        if ($request->hasFile('file_name')) {
            $image = $request->file('file_name');
            $imageName = $image->hashName();
            $this->upload($image, 'doctors', $imageName);
        }

        $this->doctorService->store(
            $request->all(),
            $imageName
        );
        session()->flash('success', trans("dashboard/messages.add"));
        return redirect()->route('admin.doctors.index');
    }


    public function edit($doctorId)
    {
        $doctor = $this->doctorService->edit(
            $doctorId
        );
        $sections = $this->sectionRepository->index();
        return view('dashboard.doctors.edit', compact('doctor', 'sections'));
    }

    public function update(UpdateDoctorRequest $request, $doctorId)
    {
        $doctor = $this->doctorService->findDoctorById($doctorId);
        $imageName = $doctor->image->file_name ?? '';
        if ($request->hasFile('file_name')) {
            $image = $request->file('file_name');
            $imageName = $image->hashName();
            $oldImage = $doctor->image->file_name ?? '';
            $this->upload(
                $image,
                'doctors',
                $imageName,
                'doctors/' . $oldImage
            );
        }
        $this->doctorService->update(
            $request->all(),
            $doctorId,
            $imageName
        );
        session()->flash('success', trans("dashboard/messages.edit"));
        return redirect()->route('admin.doctors.index');
    }

    public function destroy($doctorId)
    {
        $doctor = $this->doctorService->findDoctorById($doctorId);
        if ($doctor->image) {
            $this->deleteFile('doctors/' . $doctor->image->file_name);
        }
        $this->doctorService->destroy( $doctorId);
        session()->flash('success', trans("dashboard/messages.delete"));
        return redirect()->route('admin.doctors.index');
    }

    public function findDoctorById($doctorId)
    {
        return $this->doctorService->findDoctorById($doctorId);
    }

    public function deleteAllDoctors(Request $request, $locale)
    {
        $selectedDoctors = $request->get('selectedDoctors');
        if (!$selectedDoctors) {
            session()->flash('error', trans("dashboard/messages.error"));
            return redirect()->back();
        } else {
            foreach ($request->selectedDoctors as $doctorId) {
                $doctor = $this->doctorService->findDoctorById($doctorId);
                if ($doctor->image) {
                    $this->deleteFile('doctors/' . $doctor->image->file_name);
                }
            }
            $this->doctorService->deleteAllDoctors($locale, $request->get('selectedDoctors'));
            session()->flash('success', trans("dashboard/messages.delete"));
            return redirect()->route('admin.doctors.index');
        }
    }
}
