<div>

    @if ($ServiceSaved)
        <div class="alert alert-info">تم حفظ البيانات بنجاح.</div>
    @endif
    @if ($serviceUpdated)
        <div class="alert alert-info">تم تعديل البيانات بنجاح.</div>
    @endif
    @if ($showTable)
        @include('livewire.service-packages.index')
    @else
        <form wire:submit.prevent="savePackage" autocomplete="off">
            @csrf
            <div class="form-group">
                <label>اسم الباكدج</label>
                <input wire:model="name" type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>ملاحظات</label>
                <textarea wire:model="notes" name="notes" class="form-control" rows="5"></textarea>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <div class="col-md-12">
                        <button class="btn btn-outline-primary" wire:click.prevent="chooseService">اضافة خدمة فرعية
                        </button>
                    </div>
                </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="table-primary">
                                    <th>اسم الخدمة</th>
                                    <th width="200">العدد</th>
                                    <th width="200">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($packageItems as $index => $packageItem)
                                    <tr>
                                        <td>
                                            @if ($packageItem['is_saved'])
                                                <input type="hidden"
                                                    name="packageItems[{{ $index }}][service_id]"
                                                    wire:model="packageItems.{{ $index }}.service_id" />
                                                @if ($packageItem['service_name'] && $packageItem['service_price'])
                                                    {{ $packageItem['service_name'] }}
                                                    ({{ number_format($packageItem['service_price'], 2) }})
                                                @endif
                                            @else
                                                <select name="packageItems[{{ $index }}][service_id]"
                                                    class="form-control{{ $errors->has('packageItems.' . $index) ? ' is-invalid' : '' }}"
                                                    wire:model="packageItems.{{ $index }}.service_id">
                                                    <option value="">-- choose product --</option>
                                                    @foreach ($allServices as $service)
                                                        <option value="{{ $service->id }}">
                                                            {{ \App\Models\ServiceTranslation::where(['service_id' => $service->id])->pluck('name')->first() }}
                                                            ({{ number_format($service->price, 2) }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('packageItems.' . $index))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('packageItems.' . $index) }}
                                                    </em>
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            @if ($packageItem['is_saved'])
                                                <input type="hidden"
                                                    name="packageItems[{{ $index }}][quantity]"
                                                    wire:model="packageItems.{{ $index }}.quantity" />
                                                {{ $packageItem['quantity'] }}
                                            @else
                                                <input type="number"
                                                    name="packageItems[{{ $index }}][quantity]"
                                                    class="form-control"
                                                    wire:model="packageItems.{{ $index }}.quantity" />
                                            @endif
                                        </td>
                                        <td>
                                            @if ($packageItem['is_saved'])
                                                <button class="btn btn-sm btn-primary"
                                                    wire:click.prevent="editService({{ $index }})">
                                                    تعديل
                                                </button>
                                            @elseif($packageItem['service_id'])
                                                <button class="btn btn-sm btn-success mr-1"
                                                    wire:click.prevent="saveService({{ $index }})">
                                                    تاكيد
                                                </button>
                                            @endif
                                            <button class="btn btn-sm btn-danger"
                                                wire:click.prevent="removeService({{ $index }})">حذف
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                    <div class="col-lg-4 ml-auto text-right">
                        <table class="table pull-right">
                            <tr>
                                <td style="color: red">الاجمالي قبل الخصم</td>
                                <td>{{ number_format($totalBeforeDiscount, 2) }}</td>
                            </tr>

                            <tr>
                                <td style="color: red">قيمة الخصم</td>
                                <td width="125">
                                    <input type="number" name="discount_value" class="form-control w-75 d-inline"
                                        wire:model="discount_value">
                                </td>
                            </tr>

                            <tr>
                                <td style="color: red">نسبة الضريبة</td>
                                <td>
                                    <input type="number" name="taxes" class="form-control w-75 d-inline"
                                        min="0" max="100" wire:model="taxes"> %
                                </td>
                            </tr>
                            <tr>
                                <td style="color: red">الاجمالي مع الضريبة</td>
                                <td>{{ number_format($total, 2) }}</td>
                            </tr>
                        </table>
                    </div> <br />
                    <div>
                        <input class="btn btn-outline-success" type="submit" value="تاكيد البيانات">
                    </div>
                </div>
            </div>

        </form>

    @endif
</div>
