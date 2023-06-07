<div class="pull-right">
    <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#show_category_modal_{{$category->id}}">
        <i class="uil-eye"></i>&nbsp;Show
    </button>
    @include('softwareCategories.show_category_modal')

    <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#edit_category_modal_{{$category->id}}">
        <i class="uil-pen"></i>&nbsp;Edit
    </button>
    @include('softwareCategories.edit_category_modal')

    <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#delete_category_modal_{{$category->id}}">
        <i class="uil-trash"></i>&nbsp;Delete
    </button>
    @include('softwareCategories.delete_category_modal')
</div>
