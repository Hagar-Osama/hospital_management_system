<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;
use App\Models\PackageOffer;
use Livewire\Attributes\Url;
use Livewire\Attributes\Layout;

class CreateServicePackage extends Component
{

    public $packageItems = [];
    public $allServices;
    public $discount_value = 0;
    public $taxes = 17;
    public $name;
    public $notes;
    public $ServiceSaved = false; // no confirmed service by default
    public $showTable = true;
    public $updateMode = false;
    public $packageId;
    public $serviceUpdated = false;

    public function mount()
    {
        $this->allServices = Service::all();
    }

    public function render()
    {

        $totalBeforeDiscount = 0;
        //calculate the services and quantities
        foreach ($this->packageItems as $packageItem) {
            if ($packageItem['is_saved'] && $packageItem['service_price'] && $packageItem['quantity']) {
                $totalBeforeDiscount += $packageItem['service_price'] * $packageItem['quantity'];
            }
        }

        return view('livewire.service-packages.create-service-package', [
            'packages' => PackageOffer::all(),
            'totalBeforeDiscount' => $discount_price = $totalBeforeDiscount - ((is_numeric($this->discount_value) ? $this->discount_value : 0)),
            'total' => $discount_price * ((is_numeric($this->taxes) ? $this->taxes : 0) / 100)
        ]);
    }


    public function chooseService()
    {
        foreach ($this->packageItems as $key => $packageItem) {
            if (!$packageItem['is_saved']) {
                $this->addError('packageItems.' . $key, 'يجب حفظ هذا الخدمة قبل إنشاء خدمة جديدة.');
                return;
            }
        }

        $this->packageItems[] = [
            'service_id' => '',
            'quantity' => 1,
            'is_saved' => false,
            'service_name' => '',
            'service_price' => 0
        ];


        $this->ServiceSaved = false;
    }

    public function editService($index)
    {
        foreach ($this->packageItems as $key => $packageItem) {
            if (!$packageItem['is_saved']) {
                $this->addError('packageItems.' . $key, 'This line must be saved before editing another.');
                return;
            }
        }

        $this->packageItems[$index]['is_saved'] = false;
    }


    public function saveService($index)
    {
        // dd($index);


        $this->resetErrorBag();
        $service = $this->allServices->find($this->packageItems[$index]['service_id']);
        $this->packageItems[$index]['service_name'] = $service->name;
        $this->packageItems[$index]['service_price'] = $service->price;
        $this->packageItems[$index]['is_saved'] = true;
    }

    public function removeService($index)
    {

        unset($this->packageItems[$index]);
        $this->packageItems = array_values($this->packageItems);
    }

    public function savePackage()
    {

        if ($this->updateMode) {
            $package = PackageOffer::find($this->packageId);
            $totalBeforeDiscount = 0;

            foreach ($this->packageItems as $packageItem) {
                if ($packageItem['is_saved'] && $packageItem['service_price'] && $packageItem['quantity']) {
                    // الاجمالي قبل الخصم
                    $totalBeforeDiscount += $packageItem['service_price'] * $packageItem['quantity'];
                }
            }

            //الاجمالي قبل الخصم
            $package->original_price = $totalBeforeDiscount;
            // قيمة الخصم
            $package->discount_value = $this->discount_value;
            // الاجمالي بعد الخصم
            $package->discount_price = $totalBeforeDiscount - ((is_numeric($this->discount_value) ? $this->discount_value : 0));
            //  نسبة الضريبة
            $package->tax_rate = $this->taxes;
            // الاجمالي + الضريبة
            $package->total_price = $package->discount_price * (1 + (is_numeric($this->taxes) ? $this->taxes : 0) / 100);
            $package->save();

            // حفظ الترجمة
            $package->name = $this->name;
            $package->notes = $this->notes;
            $package->save();

            // حفظ العلاقة
            foreach ($this->packageItems as $packageItem) {
                $package->services()->sync($packageItem['service_id'],);
            }
            $this->ServiceSaved = false;
            $this->serviceUpdated = true;
        } else {
            $package = new PackageOffer();
            $totalBeforeDiscount = 0;

            foreach ($this->packageItems as $packageItem) {
                if ($packageItem['is_saved'] && $packageItem['service_price'] && $packageItem['quantity']) {
                    // الاجمالي قبل الخصم
                    $totalBeforeDiscount += $packageItem['service_price'] * $packageItem['quantity'];
                }
            }

            //الاجمالي قبل الخصم
            $package->original_price = $totalBeforeDiscount;
            // قيمة الخصم
            $package->discount_value = $this->discount_value;
            // الاجمالي بعد الخصم
            $package->discount_price = $totalBeforeDiscount - ((is_numeric($this->discount_value) ? $this->discount_value : 0));
            //  نسبة الضريبة
            $package->tax_rate = $this->taxes;
            // الاجمالي + الضريبة
            $package->total_price = $package->discount_price * (1 + (is_numeric($this->taxes) ? $this->taxes : 0) / 100);
            $package->save();

            // حفظ الترجمة
            $package->name = $this->name;
            $package->notes = $this->notes;
            $package->save();

            // حفظ العلاقة
            foreach ($this->packageItems as $packageItem) {
                $package->services()->attach($packageItem['service_id'],);
            }

            $this->reset('packageItems', 'name', 'notes');
            $this->discount_value = 0;
            $this->ServiceSaved = true;
        }
    }

    public function showForm()
    {
        $this->showTable = false;
    }

    public function edit($id)
    {
        $this->showTable = false;
        $this->updateMode = true;
        $package = PackageOffer::where('id', $id)->first();
        $this->packageId = $id; //??
        $this->reset('packageItems', 'name', 'notes');
        $this->name = $package->name;
        $this->notes = $package->notes;
        $this->discount_value = intval($package->discount_value);
        $this->taxes = $package->tax_rate;
        $this->ServiceSaved = false; //we are not saving anything here we just want to edit the package items again
        foreach ($package->services as $service) {
            $quantity = $package->original_price / $service->price;

            $this->packageItems[] = [
                'service_id' => $service->id,
                'quantity' => $quantity,
                'is_saved' => true, //service already exists and saved
                'service_name' => $service->name,
                'service_price' => $service->price
            ];
        }
    }

    public function delete($id)
    {
        PackageOffer::find($id)->delete();
        return redirect()->back();
    }
}
