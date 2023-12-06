<div class="modal" id="delete_select">
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
                        <div class="col-lg-12 col-md-8 form-group mg-b-0">
                          <P> Are you sure you want to delete this Doctor</P>
                            <input type="hidden" id="selected-id" name="selectedId" value=''>


                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button class="btn ripple btn-danger" type="submit">Delete</button>
                <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
            </div>
            </form>

        </div>
    </div>
</div>


