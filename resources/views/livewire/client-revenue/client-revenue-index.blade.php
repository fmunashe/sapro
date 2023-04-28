<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                {{ __('Client Revenue') }}
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
                        class="mdi mdi-pencil-plus"></i> Add Client Revenue</a>
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
                <th>Main Client</th>
                <th>Revenue</th>
                <th>Sector</th>
                <th>Time On Client</th>
                <th>Audit Work Performed</th>
                <th>Action</th>
            </tr>
            @foreach($revenues as $revenue)
                <tr>
                    <td>{{$revenue->clientRevenueId}}</td>
                    <td>{{$revenue->saproId}}</td>
                    <td>{{$revenue->mainClient}}</td>
                    <td>{{"$ ".number_format($revenue->revenue,2,'.',',')}}</td>
                    <td>{{$revenue->sector}}</td>
                    <td>{{$revenue->timeOnClient}}</td>
                    <td>
                        @if($revenue->auditedWork)
                            <ol>
                                @foreach($revenue->auditedWork as $work)
                                    <li>{{$work->auditWorkPerformed}}</li>
                                @endforeach
                            </ol>
                        @endif
                    </td>
                    <td class="pull-right">
                        <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
                                data-bs-target="#show_client_revenue_modal_{{$revenue->clientRevenueId}}">
                            <i class="uil-eye"></i>&nbsp;Show
                        </button>
                        @include('clientRevenue.show_client_revenue_modal')
                        <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
                                data-bs-target="#edit_client_revenue_modal_{{$revenue->clientRevenueId}}">
                            <i class="uil-pen"></i>&nbsp;Edit
                        </button>
                        @include('clientRevenue.edit_client_revenue_modal')

                        <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
                                data-bs-target="#delete_client_revenue_modal_{{$revenue->clientRevenueId}}">
                            <i class="uil-trash"></i>&nbsp;Delete
                        </button>
                        @include('clientRevenue.delete_client_revenue_modal')
                    </td>
                </tr>
            @endforeach
        </table>
        {{$revenues->links()}}
    </div>
</div>
