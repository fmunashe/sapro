<div class="pull-right">
    <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#show_user_modal_{{$user->id}}">
        <i class="uil-eye"></i>&nbsp;Show
    </button>
    @include('users.show_user_modal')

    <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#edit_user_modal_{{$user->id}}">
        <i class="uil-pen"></i>&nbsp;Edit
    </button>
    @include('users.edit_user_modal')


    <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#delete_user_modal_{{$user->id}}">
        <i class="uil-trash"></i>&nbsp;Delete
    </button>
    @include('users.delete_user_modal')

{{--        @include('datatables::delete', ['value' => $id])--}}
</div>
