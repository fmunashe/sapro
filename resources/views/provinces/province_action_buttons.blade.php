<div class="pull-right">
    <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#show_province_modal_{{$province->id}}">
        <i class="uil-eye"></i>&nbsp;Show
    </button>
    @include('provinces.show_province_modal')

    <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#edit_province_modal_{{$province->id}}">
        <i class="uil-pen"></i>&nbsp;Edit
    </button>
    @include('provinces.edit_province_modal')

    <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#delete_province_modal_{{$province->id}}">
        <i class="uil-trash"></i>&nbsp;Delete
    </button>
    @include('provinces.delete_province_modal')
</div>
