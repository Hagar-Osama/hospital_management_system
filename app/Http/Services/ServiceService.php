<?php

namespace App\Http\Services;

use App\Http\Repositories\ServiceRepository;
use App\Models\Section;

class ServiceService
{
    private ServiceRepository $serviceRepository;
    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function index()
    {
        return $this->serviceRepository->index();
    }

    public function store(array $request)
    {
        return $this->serviceRepository->store($request);

    }

    public function edit(int $serviceId)
    {
        return $this->serviceRepository->edit($serviceId);
    }

    public function update(array $request, int $serviceId)
    {
        return $this->serviceRepository->update($request, $serviceId);

    }


    public function destroy(int $serviceId)
    {
        return $this->serviceRepository->destroy($serviceId);

    }
}
