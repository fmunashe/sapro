<div class="pull-right">
    <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#show_host_firm_config_modal_{{$config->id}}">
        <i class="uil-eye"></i>&nbsp;Show
    </button>
    @include('hostFirmConfigs.show_host_firm_config_modal')

    <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#edit_host_firm_config_modal_{{$config->id}}">
        <i class="uil-pen"></i>&nbsp;Edit
    </button>
    @include('hostFirmConfigs.edit_host_firm_config_modal')

    <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#delete_host_firm_config_modal_{{$config->id}}">
        <i class="uil-trash"></i>&nbsp;Delete
    </button>
    @include('hostFirmConfigs.delete_host_firm_config_modal')
</div>
