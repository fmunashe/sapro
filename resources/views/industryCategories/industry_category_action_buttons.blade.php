<div class="pull-right">
    <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#show_industry_category_modal_{{$industryCategory->id}}">
        <i class="uil-eye"></i>&nbsp;Show
    </button>
    @include('industryCategories.show_industry_category_modal')

    <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#edit_industry_category_modal_{{$industryCategory->id}}">
        <i class="uil-pen"></i>&nbsp;Edit
    </button>
    @include('industryCategories.edit_industry_category_modal')

    <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#delete_industry_category_modal_{{$industryCategory->id}}">
        <i class="uil-trash"></i>&nbsp;Delete
    </button>
    @include('industryCategories.delete_industry_category_modal')
</div>
