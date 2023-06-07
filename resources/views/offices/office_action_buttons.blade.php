<div class="pull-right">
    <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#show_office_modal_{{$office->id}}">
        <i class="uil-eye"></i>&nbsp;Show
    </button>
    @include('offices.show_office_modal')

    <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#edit_office_modal_{{$office->id}}">
        <i class="uil-pen"></i>&nbsp;Edit
    </button>
    @include('offices.edit_office_modal')

    <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#delete_office_modal_{{$office->id}}">
        <i class="uil-trash"></i>&nbsp;Delete
    </button>
    @include('offices.delete_office_modal')
</div>
