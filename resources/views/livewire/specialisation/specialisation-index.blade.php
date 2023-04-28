<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                {{ __('Specialisation') }}
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
                <a href="" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#standard-modal"><i class="mdi mdi-pencil-plus"></i> Create Specialisation</a>
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
                <th>Specialisation ID</th>
                <th>Specialisation Code</th>
                <th>Specialisation Description</th>
                <th>Action</th>
            </tr>
            @foreach($specialisations as $specialisation)
                <tr>
                    <td>{{$specialisation->specialisationId}}</td>
                    <td>{{$specialisation->specialisationCode}}</td>
                    <td>{{$specialisation->specialisationDescription}}</td>
                    <td class="pull-right">
                        <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
                                data-bs-target="#show_specialisation_modal_{{$specialisation->specialisationId}}">
                            <i class="uil-eye"></i>&nbsp;Show
                        </button>
                        @include('specialisation.show_specialisation_modal')
                        <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
                                data-bs-target="#edit_specialisation_modal_{{$specialisation->specialisationId}}">
                            <i class="uil-pen"></i>&nbsp;Edit
                        </button>
                        @include('specialisation.edit_specialisation_modal')

                        <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
                                data-bs-target="#delete_specialisation_modal_{{$specialisation->specialisationId}}">
                            <i class="uil-trash"></i>&nbsp;Delete
                        </button>
                        @include('specialisation.delete_specialisation_modal')
                    </td>
                </tr>
            @endforeach
        </table>
        {{$specialisations->links()}}
    </div>
</div>
