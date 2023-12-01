<div class="modal" id="addSection">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Add Section</h6><button aria-label="Close" class="close" data-bs-dismiss="modal"
                    type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.sections.store') }}" method="POST" data-parsley-validate="">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-md-8 form-group mg-b-0">
                            <label class="form-label">Section Name: <span class="tx-danger">*</span></label>
                            <input class="form-control" name="name" placeholder="Enter section name" required=""
                                type="text">
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
