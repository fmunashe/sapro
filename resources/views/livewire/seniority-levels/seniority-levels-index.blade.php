<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                {{ __('Seniority Levels') }}
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
                <a href="" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#standard-modal"><i class="mdi mdi-pencil-plus"></i> Create Seniority Level</a>
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
                <th>Seniority Level ID</th>
                <th>Seniority Level Code</th>
                <th>Seniority Level Description</th>
                <th>Action</th>
            </tr>
            @foreach($levels as $level)
                <tr>
                    <td>{{$level->seniorityLevelId}}</td>
                    <td>{{$level->seniorityLevelCode}}</td>
                    <td>{{$level->seniorityLevelDescription}}</td>
                    <td class="pull-right">
                        <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
                                data-bs-target="#show_seniority_modal_{{$level->seniorityLevelId}}">
                            <i class="uil-eye"></i>&nbsp;Show
                        </button>
                        @include('seniorityLevels.show_seniority_modal')
                        <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
                                data-bs-target="#edit_seniority_modal_{{$level->seniorityLevelId}}">
                            <i class="uil-pen"></i>&nbsp;Edit
                        </button>
                        @include('seniorityLevels.edit_seniority_modal')

                        <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
                                data-bs-target="#delete_seniority_modal_{{$level->seniorityLevelId}}">
                            <i class="uil-trash"></i>&nbsp;Delete
                        </button>
                        @include('seniorityLevels.delete_seniority_modal')
                    </td>
                </tr>
            @endforeach
        </table>
        {{$levels->links()}}
    </div>
</div>
