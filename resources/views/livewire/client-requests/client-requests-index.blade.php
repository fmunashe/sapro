<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                {{ __('Clients Requests') }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <input type="text" wire:model="search" placeholder="search ..."class="form-control mr-0">
            </div>
            <div class="col-md-2">
                <button class="btn btn-danger float-start ml-0" wire:click="clearSearch">Clear Search</button>
            </div>
            <div class="col-md-6">
                <a href="" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#standard-modal"><i class="mdi mdi-pencil-plus"></i> Add Request</a>
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
                <th class="text-wrap">Description</th>
                <th class="text-nowrap">Status</th>
                <th class="text-nowrap">Client</th>
                <th class="text-nowrap">Created By</th>
                <th class="text-nowrap"></th>
            </tr>
            @foreach($clientRequests as $clientRequest)
                @if(auth()->user()->type == \App\Enums\UserTypeEnum::ADMIN || auth()->user()->type == \App\Enums\UserTypeEnum::SUPER_ADMIN || auth()->user()->id == $clientRequest->client_id  )
                <tr>
                    <td>{{$clientRequest->id}}</td>
                    <td>{{$clientRequest->description}}</td>
                    <td>{{$clientRequest->status}}</td>
                    <td class="text-nowrap">{{$clientRequest->client->name??""}} {{$clientRequest->client->surname??""}}</td>
                    <td>{{$clientRequest->createdBy->name??""}}</td>
                    <td class="text-nowrap" style="text-align: right">
                        <a href="{{route('client-requests.show',$clientRequest->id)}}" class="btn btn-success btn-sm py-0 px-1">Show</a>
                        <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
                                data-bs-target="#edit_client_request_modal_{{$clientRequest->id}}">
                            <i class="uil-pen"></i>&nbsp;Edit
                        </button>
                        @include('clientRequests.edit_client_request_modal')

                        <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
                                data-bs-target="#delete_client_request_modal_{{$clientRequest->id}}">
                            <i class="uil-trash"></i>&nbsp;Delete
                        </button>
                        @include('clientRequests.delete_client_request_modal')
                    </td>
                </tr>
                @endif
            @endforeach
        </table>
        {{$clientRequests->links()}}
    </div>
</div>
