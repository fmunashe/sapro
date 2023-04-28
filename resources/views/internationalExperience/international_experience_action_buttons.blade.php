<div class="pull-right">
    <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#show_international_experience_modal_{{$experience->internationalExperienceId}}">
        <i class="uil-eye"></i>&nbsp;Show
    </button>
    @include('internationalExperience.show_international_experience_modal')

    <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#edit_international_experience_modal_{{$experience->internationalExperienceId}}">
        <i class="uil-pen"></i>&nbsp;Edit
    </button>
    @include('internationalExperience.edit_international_experience_modal')


    <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#delete_international_experience_modal_{{$experience->internationalExperienceId}}">
        <i class="uil-trash"></i>&nbsp;Delete
    </button>
    @include('internationalExperience.delete_international_experience_modal')
</div>
