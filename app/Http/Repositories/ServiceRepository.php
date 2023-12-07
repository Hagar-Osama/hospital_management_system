<?php

namespace App\Http\Repositories;

use App\Models\Service;

class ServiceRepository
{

    public function index()
    {
        return Service::all();
    }

    public function store(array $services)
    {
        return Service::create($services);
    }

    public function findServiceById(int $serviceId)
    {
        return Service::findOrFail($serviceId);
    }

    public function edit(int $serviceId)
    {
        return $this->findServiceById($serviceId);

    }

    public function update(array $services, int $serviceId)
    {
       $section = Service::findOrFail($serviceId);
        return $section->update($services);
    }

    public function destroy(int $serviceId)
    {
       return Service::findOrFail($serviceId)->delete();
    }

}
