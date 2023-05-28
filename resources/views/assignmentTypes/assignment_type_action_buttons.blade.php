<div class="pull-right">
    <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#show_assignment_type_modal_{{$type->id}}">
        <i class="uil-eye"></i>&nbsp;Show
    </button>
    @include('assignmentTypes.show_assignment_type_modal')

    <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#edit_assignment_type_modal_{{$type->id}}">
        <i class="uil-pen"></i>&nbsp;Edit
    </button>
    @include('assignmentTypes.edit_assignment_type_modal')

    <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#delete_assignment_type_modal_{{$type->id}}">
        <i class="uil-trash"></i>&nbsp;Delete
    </button>
    @include('assignmentTypes.delete_assignment_type_modal')
</div>
