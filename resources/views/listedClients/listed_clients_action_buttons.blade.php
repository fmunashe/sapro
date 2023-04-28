<div class="pull-right">
    <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#show_listed_clients_modal_{{$listedClient->listedClientId}}">
        <i class="uil-eye"></i>&nbsp;Show
    </button>
    @include('listedClients.show_listed_clients_modal')

    <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#edit_listed_clients_modal_{{$listedClient->listedClientId}}">
        <i class="uil-pen"></i>&nbsp;Edit
    </button>
    @include('listedClients.edit_listed_clients_modal')

    <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#delete_listed_clients_modal_{{$listedClient->listedClientId}}">
        <i class="uil-trash"></i>&nbsp;Delete
    </button>
    @include('listedClients.delete_listed_clients_modal')
</div>
