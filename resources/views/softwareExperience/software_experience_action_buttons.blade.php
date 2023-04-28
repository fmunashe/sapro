<div class="pull-right">
    <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#show_software_experience_modal_{{$experience->softwareExperienceId}}">
        <i class="uil-eye"></i>&nbsp;Show
    </button>
    @include('softwareExperience.show_software_experience_modal')

    <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#edit_software_experience_modal_{{$experience->softwareExperienceId}}">
        <i class="uil-pen"></i>&nbsp;Edit
    </button>
    @include('softwareExperience.edit_software_experience_modal')

    <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#delete_software_experience_modal_{{$experience->softwareExperienceId}}">
        <i class="uil-trash"></i>&nbsp;Delete
    </button>
    @include('softwareExperience.delete_software_experience_modal')
</div>
