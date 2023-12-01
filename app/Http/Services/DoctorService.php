<?php

namespace App\Http\Services;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Http\Repositories\DoctorRepository;

class DoctorService
{
    private DoctorRepository $doctorRepository;
    public function __construct(DoctorRepository $doctorRepository)
    {
        $this->doctorRepository = $doctorRepository;
    }

    public function index()
    {
        return $this->doctorRepository->index();
    }

    public function store(array $request, string $imageName)
    {
        try {
            DB::beginTransaction();
            $doctor = $this->doctorRepository->store(
                $request,
                $imageName
            );
            DB::commit();
            return $doctor;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function edit(int $doctorId)
    {
        return $this->doctorRepository->edit($doctorId);
    }

    public function update(array $request, int $doctorId, string $imageName)
    {
        try {
            DB::beginTransaction();
            $doctor = $this->doctorRepository->update(
                $request,
                $doctorId,
                $imageName
            );
            DB::commit();
            return $doctor;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function destroy(int $doctorId)
    {
        try {
            DB::beginTransaction();
            $doctor = $this->doctorRepository->destroy($doctorId);
            DB::commit();
            return $doctor;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function findDoctorById($doctorId)
    {
        return $this->doctorRepository->findDoctorById($doctorId);
    }

    public function deleteAllDoctors(array $selectedDoctors)
    {
        try {
            DB::beginTransaction();
            $doctors = $this->doctorRepository->deleteAllDoctors($selectedDoctors);
            DB::commit();
            return $doctors;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
