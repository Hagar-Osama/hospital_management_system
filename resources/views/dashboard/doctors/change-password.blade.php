<div class="modal" id="changePassword{{ $doctor->id }}">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Change Doctor Password</h6><button aria-label="Close" class="close"
                    data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.doctors.updatePassword')}}" method="POST" data-parsley-validate="">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-12 col-md-8 form-group mg-b-0">
                                <label class="form-label">Current Password: <span class="tx-danger">*</span></label>
                                <input class="form-control" name="current_password" placeholder="Enter password" required=""
                                    type="password">
                        </div>
                        <div class="col-lg-12 col-md-8 form-group mg-b-0">
                                <label class="form-label">New Password: <span class="tx-danger">*</span></label>
                                <input class="form-control" name="password" placeholder="Enter New password"
                                    required="" type="password">
                        </div>
                        <div class="col-lg-12 col-md-8 form-group mg-b-0">
                                <label class="form-label">Confirm Password: <span class="tx-danger">*</span></label>
                                <input class="form-control" name="password_confirmation" placeholder="Re-Enter password"
                                    required="" type="password">
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button class="btn ripple btn-primary" type="submit">Save changes</button>
                <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
            </div>
            </form>

        </div>
    </div>
</div>
