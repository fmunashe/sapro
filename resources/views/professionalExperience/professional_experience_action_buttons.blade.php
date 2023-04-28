<div class="pull-right">
    <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#show_professional_experience_modal_{{$experience->professionalExperienceId}}">
        <i class="uil-eye"></i>&nbsp;Show
    </button>
    @include('professionalExperience.show_professional_experience_modal')

    <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#edit_professional_experience_modal_{{$experience->professionalExperienceId}}">
        <i class="uil-pen"></i>&nbsp;Edit
    </button>
    @include('professionalExperience.edit_professional_experience_modal')


    <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#delete_professional_experience_modal_{{$experience->professionalExperienceId}}">
        <i class="uil-trash"></i>&nbsp;Delete
    </button>
    @include('professionalExperience.delete_professional_experience_modal')
</div>
