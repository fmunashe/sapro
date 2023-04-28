<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                {{ __('Achievements') }}
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
                        class="mdi mdi-pencil-plus"></i> Register Achievement</a>
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
                <th>Achievement</th>
                <th>Year</th>
                <th>Action</th>
            </tr>
            @foreach($achievements as $achievement)
                <tr>
                    <td>{{$achievement->achievementId}}</td>
                    <td>{{$achievement->saproId}}</td>
                    <td>{{$achievement->achievement}}</td>
                    <td>{{$achievement->year}}</td>
                    <td class="pull-right">
                        <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
                                data-bs-target="#show_achievement_modal_{{$achievement->achievementId}}">
                            <i class="uil-eye"></i>&nbsp;Show
                        </button>
                        @include('achievements.show_achievement_modal')
                        <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
                                data-bs-target="#edit_achievement_modal_{{$achievement->achievementId}}">
                            <i class="uil-pen"></i>&nbsp;Edit
                        </button>
                        @include('achievements.edit_achievement_modal')

                        <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
                                data-bs-target="#delete_achievement_modal_{{$achievement->achievementId}}">
                            <i class="uil-trash"></i>&nbsp;Delete
                        </button>
                        @include('achievements.delete_achievement_modal')
                    </td>
                </tr>
            @endforeach
        </table>
        {{$achievements->links()}}
    </div>
</div>
