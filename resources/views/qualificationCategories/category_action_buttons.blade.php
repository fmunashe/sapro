<div class="pull-right">
    <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#show_qualification_category_modal_{{$category->id}}">
        <i class="uil-eye"></i>&nbsp;Show
    </button>
    @include('qualificationCategories.show_qualification_category_modal')

    <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#edit_qualification_category_modal_{{$category->id}}">
        <i class="uil-pen"></i>&nbsp;Edit
    </button>
    @include('qualificationCategories.edit_qualification_category_modal')

    <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#delete_qualification_category_modal_{{$category->id}}">
        <i class="uil-trash"></i>&nbsp;Delete
    </button>
    @include('qualificationCategories.delete_qualification_category_modal')
</div>
