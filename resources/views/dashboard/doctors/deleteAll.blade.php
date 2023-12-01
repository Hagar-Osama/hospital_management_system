<div class="modal" id="deleteDoctors">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Delete Doctor</h6><button aria-label="Close" class="close" data-bs-dismiss="modal"
                    type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.doctors.destroyAll') }}" method="POST" id="delete-form" data-parsley-validate="">
                    @csrf
                    @method('DELETE')
                    <div class="row">
                        <P> Are you sure you want to delete this Doctor</P>
                        <div class="col-lg-12 col-md-8 form-group mg-b-0">
                            @php
                            $selectedDoctors = request()->get('selectedDoctors');
                            @endphp
                              @if (empty($selectedDoctors))
                              <p>No doctor is selected.</p>
                          @else
                            @foreach ($doctors->whereIn('id', array_values($selectedDoctors)) as $doctor)
                            <input class="form-control" value="{{$doctor->name}}" readonly>
                            <input type="checkbox" class="doctor-checkbox"
                            name="selectedDoctors[]"
                            value="{{ $doctor->id }}">
                            @endforeach
                            @endif

                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-center">
                @if(!empty($selectedDoctors))
                <button class="btn ripple btn-danger" type="button" onclick="submitForm()">Delete</button>
                @endif
                <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
            </div>
            </form>

        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Select all checkboxes with the class 'doctor-checkbox'
        var checkboxes = document.querySelectorAll('.doctor-checkbox');
        var selectedDoctorsInput = document.querySelector('input[name="selectedDoctors[]"]');

        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                var selectedDoctorIds = [];
                checkboxes.forEach(function(cb) {
                    if (cb.checked) {
                        selectedDoctorIds.push(cb.value);
                    }
                });
                selectedDoctorsInput.value = selectedDoctorIds.join(',');
            });
        });
    });

    function submitForm() {
        var selectedDoctorsInput = document.querySelector('input[name="selectedDoctors[]"]');
        var selectedDoctorIds = selectedDoctorsInput.value.split(',');

        if (selectedDoctorIds.length > 0) {
            document.getElementById('delete-form').submit();
        } else {
            alert('Please select at least one doctor to delete.');
        }
    }
</script>

