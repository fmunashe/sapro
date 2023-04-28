<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                {{ __('Certifications And Education') }}
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
                <a href="" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#standard-modal"><i class="mdi mdi-pencil-plus"></i> Register Certification</a>
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
                <th>Institute</th>
                <th>Certifications And Education</th>
                <th>Year</th>
                <th>Approved</th>
                <th>Approved By</th>
                <th>Action</th>
            </tr>
            @foreach($certifications as $certification)
                <tr>
                    <td>{{$certification->certificationsAndEducationId}}</td>
                    <td>{{$certification->saproId}}</td>
                    <td>{{$certification->institute}}</td>
                    <td>{{$certification->certificationsAndEducation}}</td>
                    <td>{{$certification->year}}</td>
                    <td>{{$certification->approved?"Yes":"No"}}</td>
                    <td>{{$certification->approvedBy}}</td>
                    <td class="pull-right">
                        <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
                                data-bs-target="#show_certifications_modal_{{$certification->certificationsAndEducationId}}">
                            <i class="uil-eye"></i>&nbsp;Show
                        </button>
                        @include('certifications.show_certifications_modal')
                        <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
                                data-bs-target="#edit_certifications_modal_{{$certification->certificationsAndEducationId}}">
                            <i class="uil-pen"></i>&nbsp;Edit
                        </button>
                        @include('certifications.edit_certifications_modal')

                        <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
                                data-bs-target="#delete_certifications_modal_{{$certification->certificationsAndEducationId}}">
                            <i class="uil-trash"></i>&nbsp;Delete
                        </button>
                        @include('certifications.delete_certifications_modal')
                    </td>
                </tr>
            @endforeach
        </table>
        {{$certifications->links()}}
    </div>
</div>
