<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                {{ __('Scheduling') }}
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
                <a href="" class="btn btn-success float-end" data-bs-toggle="modal"
                   data-bs-target="#standard-modal"><i class="mdi mdi-pencil-plus"></i> Add Scheduling</a>
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
                <th>Year</th>
                <th>BS Host Firm Code</th>
                <th>BS Start Date</th>
                <th>BS End Date</th>
                <th>Post BS Firm Code</th>
                <th>Post BS Start Date</th>
                <th>Post BS End Date</th>
                <th>Action</th>
            </tr>
            @foreach($scheduling as $schedule)
                <tr>
                    <td>{{$schedule->schedulingId}}</td>
                    <td>{{$schedule->saproId}}</td>
                    <td>{{$schedule->year}}</td>
                    <td>{{$schedule->bsHostFirmCode}}</td>
                    <td>{{$schedule->bsStartDate}}</td>
                    <td>{{$schedule->bsEndDate}}</td>
                    <td>{{$schedule->postBsHostFirmCode}}</td>
                    <td>{{$schedule->postBsStartDate}}</td>
                    <td>{{$schedule->postBsEndDate}}</td>
                    <td class="pull-right">
                        <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
                                data-bs-target="#show_scheduling_modal_{{$schedule->schedulingId}}">
                            <i class="uil-eye"></i>&nbsp;Show
                        </button>
                        @include('scheduling.show_scheduling_modal')
                        <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
                                data-bs-target="#edit_scheduling_modal_{{$schedule->schedulingId}}">
                            <i class="uil-pen"></i>&nbsp;Edit
                        </button>
                        @include('scheduling.edit_scheduling_modal')

                        <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
                                data-bs-target="#delete_scheduling_modal_{{$schedule->schedulingId}}">
                            <i class="uil-trash"></i>&nbsp;Delete
                        </button>
                        @include('scheduling.delete_scheduling_modal')
                    </td>
                </tr>
            @endforeach
        </table>
        {{$scheduling->links()}}
    </div>
</div>
