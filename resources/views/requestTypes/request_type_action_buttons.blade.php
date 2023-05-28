<div class="pull-right">
    <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#show_request_type_modal_{{$requestType->id}}">
        <i class="uil-eye"></i>&nbsp;Show
    </button>
    @include('requestTypes.show_request_type_modal')

    <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#edit_request_type_modal_{{$requestType->id}}">
        <i class="uil-pen"></i>&nbsp;Edit
    </button>
    @include('requestTypes.edit_request_type_modal')

    <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#delete_request_type_modal_{{$requestType->id}}">
        <i class="uil-trash"></i>&nbsp;Delete
    </button>
    @include('requestTypes.delete_request_type_modal')
</div>
