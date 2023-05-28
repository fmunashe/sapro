<div class="pull-right">
    <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#show_prior_modal_{{$priorExperience->id}}">
        <i class="uil-eye"></i>&nbsp;Show
    </button>
    @include('priorExperienceRoles.show_prior_modal')

    <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#edit_prior_modal_{{$priorExperience->id}}">
        <i class="uil-pen"></i>&nbsp;Edit
    </button>
    @include('priorExperienceRoles.edit_prior_modal')

    <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#delete_prior_modal_{{$priorExperience->id}}">
        <i class="uil-trash"></i>&nbsp;Delete
    </button>
    @include('priorExperienceRoles.delete_prior_modal')
</div>
