<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Http\Services\ServiceService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private ServiceService $serviceService;

    public function __construct(ServiceService $service)
    {
        $this->serviceService = $service;
    }

    public function index()
    {
       $services = $this->serviceService->index();
        return view('dashboard.services.index', compact('services'));

    }

    public function create()
    {
        return view('dashboard.services.create');

    }

    public function store(CreateServiceRequest $request)
    {
        $this->serviceService->store($request->all());
        session()->flash('success', trans("dashboard/messages.add"));
        return redirect()->route('admin.services.index');
    }

    public function edit($serviceId)
    {
        $service = $this->serviceService->edit($serviceId);
        return view('dashboard.services.edit', compact('service'));

    }

    public function update(UpdateServiceRequest $request, $serviceId)
    {
        $this->serviceService->update($request->all(), $serviceId);
        session()->flash('success', trans("dashboard/messages.edit"));
        return redirect()->route('admin.services.index');
    }

    public function destroy($serviceId)
    {
        $this->serviceService->destroy($serviceId);
        session()->flash('success', trans("dashboard/messages.delete"));
        return redirect()->route('admin.services.index');
    }
}
