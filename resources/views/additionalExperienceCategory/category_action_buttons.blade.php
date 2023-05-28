<div class="pull-right">
    <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#show_additional_experience_category_modal_{{$category->id}}">
        <i class="uil-eye"></i>&nbsp;Show
    </button>
    @include('additionalExperienceCategory.show_additional_experience_category_modal')

    <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#edit_additional_experience_category_modal_{{$category->id}}">
        <i class="uil-pen"></i>&nbsp;Edit
    </button>
    @include('additionalExperienceCategory.edit_additional_experience_category_modal')

    <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#delete_additional_experience_category_modal_{{$category->id}}">
        <i class="uil-trash"></i>&nbsp;Delete
    </button>
    @include('additionalExperienceCategory.delete_additional_experience_category_modal')
</div>
