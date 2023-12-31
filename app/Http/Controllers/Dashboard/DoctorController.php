<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Enums\DoctorStatusEnum;
use App\Http\Repositories\SectionRepository;
use App\Http\Requests\CreateDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateStatusRequest;
use App\Http\Services\DoctorService;
use App\Http\Traits\UploadTrait;
use App\Models\Appointment;
use Exception;
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
        $appointments = $this->doctorService->getDoctorAppointments();
        return view('dashboard.doctors.create', compact('sections', 'appointments'));
    }

    public function store(CreateDoctorRequest $request)
    {
        $imageName = '';
        try {
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
        } catch (Exception $e) {
            $this->deleteFile('doctors/' . $imageName);
            return redirect()->back()->withErrors('OOPS, something went wrong, Faild to add a doctor');
        }
    }


    public function edit($doctorId)
    {
        $doctor = $this->doctorService->edit(
            $doctorId
        );
        $sections = $this->sectionRepository->index();
        $appointments = $this->doctorService->getDoctorAppointments();
        return view('dashboard.doctors.edit', compact('doctor', 'sections', 'appointments'));
    }

    public function update(UpdateDoctorRequest $request, $doctorId)
    {
        $doctor = $this->doctorService->findDoctorById($doctorId);
        $imageName = $doctor->image->file_name ?? '';
        try {
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
    } catch (Exception $e) {
        $this->deleteFile('doctors/' . $imageName);
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        if (Hash::check($request->current_password, auth()->user()->password)) {
            $this->doctorService->updatePassword($request->all());
        }

        session()->flash('success', trans("dashboard/messages.edit"));
        return redirect()->route('admin.doctors.index');
    }

    public function updateStatus($doctorId)
    {
        $this->doctorService->updateStatus($doctorId);
        session()->flash('success', trans("dashboard/messages.edit"));
        return redirect()->back();
    }

    public function destroy($doctorId)
    {
        $doctor = $this->doctorService->findDoctorById($doctorId);
        if ($doctor->image) {
            $this->deleteFile('doctors/' . $doctor->image->file_name);
        }
        $this->doctorService->destroy($doctorId);
        session()->flash('success', trans("dashboard/messages.delete"));
        return redirect()->route('admin.doctors.index');
    }

    public function findDoctorById($doctorId)
    {
        return $this->doctorService->findDoctorById($doctorId);
    }

    public function deleteAllDoctors(Request $request)
    {
        $selectedId = explode(',', $request->selectedId);
        foreach ($selectedId as $doctorId) {
            $doctor = $this->doctorService->findDoctorById($doctorId);
            if ($doctor->image) {
                $this->deleteFile('doctors/' . $doctor->image->file_name);
            }
        }
        $this->doctorService->deleteAllDoctors($selectedId);
        session()->flash('success', trans("dashboard/messages.delete"));
        return redirect()->route('admin.doctors.index');
    }
}
