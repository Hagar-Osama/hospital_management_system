<div class="modal" id="deleteService{{$service->id}}">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Delete Service</h6><button aria-label="Close" class="close" data-bs-dismiss="modal"
                    type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.services.destroy', [$service->id]) }}" method="POST" data-parsley-validate="">
                    @csrf
                    @method('DELETE')
                    <div class="row">
                        <P> Are you sure you want to delete this Service</P>
                        <div class="col-lg-12 col-md-8 form-group mg-b-0">
                            <input class="form-control" value="{{$service->name}}" readonly>
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
