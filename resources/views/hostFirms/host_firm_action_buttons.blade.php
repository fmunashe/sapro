<div class="pull-right">
    <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#show_host_firm_modal_{{$hostFirm->hostFirmId}}">
        <i class="uil-eye"></i>&nbsp;Show
    </button>
    @include('hostFirms.show_host_firm_modal')

    <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#edit_host_firm_modal_{{$hostFirm->hostFirmId}}">
        <i class="uil-pen"></i>&nbsp;Edit
    </button>
    @include('hostFirms.edit_host_firm_modal')


    <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#delete_host_firm_modal_{{$hostFirm->hostFirmId}}">
        <i class="uil-trash"></i>&nbsp;Delete
    </button>
    @include('hostFirms.delete_host_firm_modal')
</div>
