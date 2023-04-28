<div class="pull-right">
    <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#show_firm_experience_modal_{{$experience->firmExperienceId}}">
        <i class="uil-eye"></i>&nbsp;Show
    </button>
    @include('firmExperience.show_firm_experience_modal')

    <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#edit_firm_experience_modal_{{$experience->firmExperienceId}}">
        <i class="uil-pen"></i>&nbsp;Edit
    </button>
    @include('firmExperience.edit_firm_experience_modal')


    <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#delete_firm_experience_modal_{{$experience->firmExperienceId}}">
        <i class="uil-trash"></i>&nbsp;Delete
    </button>
    @include('firmExperience.delete_firm_experience_modal')
</div>
