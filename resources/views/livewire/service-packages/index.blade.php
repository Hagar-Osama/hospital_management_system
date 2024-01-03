<button class="btn btn-primary pull-right" wire:click="showForm" type="button">اضافة مجموعة خدمات </button><br><br>
<div class="table-responsive">
        <table class="table text-md-nowrap" id="example1" data-page-length="50"style="text-align: center">
        <thead>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>اجمالي العرض شامل الضريبة</th>
                <th>الملاحظات</th>
                <th>العمليات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($packages as $package)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $package->name }}</td>
                    <td>{{ number_format($package->total_price, 2) }}</td>
                    <td>{{ $package->notes }}</td>
                    <td>
                        <button wire:click="edit({{ $package->id }})" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>

                        <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $package->id }})"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
    </table>
</div>
