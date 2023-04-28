<div class="pull-right">
    <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#show_certifications_modal_{{$certification->certificationsAndEducationId}}">
        <i class="uil-eye"></i>&nbsp;Show
    </button>
    @include('certifications.show_certifications_modal')

    <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#edit_certifications_modal_{{$certification->certificationsAndEducationId}}">
        <i class="uil-pen"></i>&nbsp;Edit
    </button>
    @include('certifications.edit_certifications_modal')


    <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#delete_certifications_modal_{{$certification->certificationsAndEducationId}}">
        <i class="uil-trash"></i>&nbsp;Delete
    </button>
    @include('certifications.delete_certifications_modal')
</div>
