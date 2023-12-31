<?php

namespace App\Http\Repositories;

use App\Http\Enums\DoctorStatusEnum;
use App\Http\Traits\UpdateStatusTrait;
use App\Http\Traits\UploadTrait;
use App\Models\Appointment;
use App\Models\AppointmentDoctor;
use App\Models\Doctor;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorRepository
{
    use UploadTrait;

    public function index()
    {
        return Doctor::with('image')->get();
    }

    public function store(array $request, string $imageName)
    {

        $doctor = Doctor::create($request);
        $doctor->appointments()->attach($request['appoints']);
        Image::create([
            'file_name' => $imageName ?? null,
            'imageable_id' => $doctor->id,
            'imageable_type' => Doctor::class
        ]);

        return $doctor;
    }

    public function edit(int $doctorId)
    {
        return $this->findDoctorById($doctorId);
    }

    public function update(array $doctors, int $doctorId, string $imageName)
    {
        $doctor = $this->findDoctorById($doctorId);
        $doctor->update($doctors);
        $doctor->appointments()->sync($doctors['appoints']);
        Image::updateOrCreate([
            'imageable_id' => $doctorId,
            'imageable_type' => Doctor::class
        ], [

            'file_name' => $imageName ?? $doctor->image->file_name
        ]);
        return $doctor;
    }

    public function updatePassword(array $password)
    {
        $doctor = $this->findDoctorById(auth()->user()->id);
        $doctor->update($password);
        return $doctor;

    }

    public function updateStatus(int $doctorId)
    {
        $doctor = $this->findDoctorById($doctorId);
        if($doctor->status == DoctorStatusEnum::ACTIVE) {
            $doctor->update([
                'status' => DoctorStatusEnum::INACTIVE
            ]);
        }else {
            $doctor->update([
                'status' => DoctorStatusEnum::ACTIVE
            ]);

        }
        return $doctor;

    }

    public function destroy(int $doctorId)
    {
        $doctor = $this->findDoctorById($doctorId);
        $doctor->delete();
        Image::where('imageable_id', $doctorId)->delete();
        return $doctor;
    }

    public function findDoctorById(int $doctorId)
    {
        return Doctor::findOrFail($doctorId);
    }

    public function deleteAllDoctors(array $selectedDoctors)
    {
        // dd($selectedDoctors);
        $doctors = Doctor::whereIn('id', $selectedDoctors)->delete();

        Image::whereIn('imageable_id', $selectedDoctors)->delete();
        return $doctors;
    }

    public function getDoctorAppointments()
    {
        return Appointment::all();
    }


}
