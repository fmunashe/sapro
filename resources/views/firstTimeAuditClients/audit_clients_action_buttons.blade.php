<div class="pull-right">
    <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#show_audit_clients_modal_{{$auditClient->firstTimeAuditClientId}}">
        <i class="uil-eye"></i>&nbsp;Show
    </button>
    @include('firstTimeAuditClients.show_audit_clients_modal')

    <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#edit_audit_clients_modal_{{$auditClient->firstTimeAuditClientId}}">
        <i class="uil-pen"></i>&nbsp;Edit
    </button>
    @include('firstTimeAuditClients.edit_audit_clients_modal')


    <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#delete_audit_clients_modal_{{$auditClient->firstTimeAuditClientId}}">
        <i class="uil-trash"></i>&nbsp;Delete
    </button>
    @include('firstTimeAuditClients.delete_audit_clients_modal')
</div>
