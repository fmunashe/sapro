<div class="pull-right">
    <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#show_additional_experience_modal_{{$experience->additionalExperienceId}}">
        <i class="uil-eye"></i>&nbsp;Show
    </button>
    @include('additionalExperience.show_additional_experience_modal')

    <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#edit_additional_experience_modal_{{$experience->additionalExperienceId}}">
        <i class="uil-pen"></i>&nbsp;Edit
    </button>
    @include('additionalExperience.edit_additional_experience_modal')

    <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#delete_additional_experience_modal_{{$experience->additionalExperienceId}}">
        <i class="uil-trash"></i>&nbsp;Delete
    </button>
    @include('additionalExperience.delete_additional_experience_modal')
</div>
