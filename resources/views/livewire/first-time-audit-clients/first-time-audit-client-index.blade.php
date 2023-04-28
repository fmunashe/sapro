<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                {{ __('First Time Audit Clients') }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <input type="text" wire:model="search" placeholder="search ..." class="form-control mr-0">
            </div>
            <div class="col-md-2">
                <button class="btn btn-danger float-start ml-0" wire:click="clearSearch">Clear Search</button>
            </div>
            <div class="col-md-6">
                <a href="" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#standard-modal"><i
                        class="mdi mdi-pencil-plus"></i> Add First Time Audit Clients</a>
            </div>
        </div>

    </div>

    <div class="card-body text-center">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <table class="table table-striped table-sm" style="text-align: left">
            <tr>
                <th>#</th>
                <th>Sapro ID</th>
                <th>First Time Audit Client</th>
                <th>Sector</th>
                <th>Action</th>
            </tr>
            @foreach($auditClients as $auditClient)
                <tr>
                    <td>{{$auditClient->firstTimeAuditClientId}}</td>
                    <td>{{$auditClient->saproId}}</td>
                    <td>{{$auditClient->firstTimeAuditClient}}</td>
                    <td>{{$auditClient->sector}}</td>
                    <td class="pull-right">
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
                    </td>
                </tr>
            @endforeach
        </table>
        {{$auditClients->links()}}
    </div>
</div>
