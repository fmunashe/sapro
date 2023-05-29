<div class="pull-right">
    <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#show_competence_modal_{{$competence->id}}">
        <i class="uil-eye"></i>&nbsp;Show
    </button>
    @include('competenceLevel.show_competence_modal')

    <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#edit_competence_modal_{{$competence->id}}">
        <i class="uil-pen"></i>&nbsp;Edit
    </button>
    @include('competenceLevel.edit_competence_modal')

    <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#delete_competence_modal_{{$competence->id}}">
        <i class="uil-trash"></i>&nbsp;Delete
    </button>
    @include('competenceLevel.delete_competence_modal')
</div>
