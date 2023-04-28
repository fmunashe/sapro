<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                {{ __('International Experience') }}
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
                <a href="" class="btn btn-success float-end" data-bs-toggle="modal"
                   data-bs-target="#standard-modal"><i class="mdi mdi-pencil-plus"></i> Add International Experience</a>
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
                <th>Country</th>
                <th>City</th>
                <th>Sector</th>
                <th>Start Period</th>
                <th>End Period</th>
                <th>Action</th>
            </tr>
            @foreach($internationalExperiences as $experience)
                <tr>
                    <td>{{$experience->internationalExperienceId}}</td>
                    <td>{{$experience->saproId}}</td>
                    <td>{{$experience->country}}</td>
                    <td>{{$experience->city}}</td>
                    <td>{{$experience->sector}}</td>
                    <td>{{$experience->startPeriod}}</td>
                    <td>{{$experience->endPeriod}}</td>
                    <td class="pull-right">
                        <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
                                data-bs-target="#show_international_experience_modal_{{$experience->internationalExperienceId}}">
                            <i class="uil-eye"></i>&nbsp;Show
                        </button>
                        @include('internationalExperience.show_international_experience_modal')
                        <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
                                data-bs-target="#edit_international_experience_modal_{{$experience->internationalExperienceId}}">
                            <i class="uil-pen"></i>&nbsp;Edit
                        </button>
                        @include('internationalExperience.edit_international_experience_modal')

                        <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
                                data-bs-target="#delete_international_experience_modal_{{$experience->internationalExperienceId}}">
                            <i class="uil-trash"></i>&nbsp;Delete
                        </button>
                        @include('internationalExperience.delete_international_experience_modal')
                    </td>
                </tr>
            @endforeach
        </table>
        {{$internationalExperiences->links()}}
    </div>
</div>
