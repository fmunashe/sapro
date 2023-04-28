<form action="{{route('client-requests.update',[$clientRequest->id])}}" method="post">
    @csrf
    @method('put')
    <div class="modal-header modal-colored-header bg-success">
        <h4 class="modal-title" id="standard-modalLabel">{{ __('Update Client Request Details') }}</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
    </div>
    <div class="modal-body" style="text-align: left">
        <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Search Client') }}</span>
            </div>
            <select class="form-control @error('clientRequest.client_id') is-invalid @enderror"
                    wire:model.defer="clientRequest.client_id">
                <option>Select</option>
                @foreach($clients as $client)
                    <option value="{{$client->id}}">{{$client->name." | ".$client->surname." | ".$client->email}}</option>
                @endforeach
            </select>

            @error('clientRequest.client_id')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Status') }}</span>
            </div>
            <select class="form-control @error('clientRequest.status') is-invalid @enderror"
                    wire:model.defer="clientRequest.status">
                @foreach($statuses as $status)
                    <option value="{{$status}}" {{$clientRequest->status == $status?"selected":""}}>{{$status}}</option>
                @endforeach
            </select>

            @error('clientRequest.status')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <span class="">{{ __('Request Description') }}</span>
        <div class="input-group input-group-sm mb-3">
                <textarea wire:model.defer="clientRequest.description"
                          class="form-control @error('clientRequest.description') is-invalid @enderror" rows="3"></textarea>

            @error('clientRequest.description')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        @if(auth()->user()->type ==\App\Enums\UserTypeEnum::SUPER_ADMIN || auth()->user()->type ==\App\Enums\UserTypeEnum::ADMIN)
        <table class="table table-sm table-hover">
            <thead>
            <tr>
                <th colspan="8"><h2>Attached Profiles</h2></th>
            </tr>
            <tr>
                <th>#</th>
                <th>SaproId</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Status</th>
                <th colspan="3"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($clientRequest->profiles as $profile)
                <livewire:profiles.profile-index :profile="$profile" :wire:key="$profile->id"/>
            @endforeach
            </tbody>
        </table>

        <div class="row mb-3">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">

                <button class="btn btn-success btn-sm ml-5 float-end" wire:click.prevent="add({{$i}})"><i
                        class="uil-plus"></i>Attach Profile
                </button>
            </div>
        </div>

        <div class="input-group input-group-sm mb-3">

            <select class="form-control border-success @error('attachedProfiles.0') is-invalid @enderror" wire:model="attachedProfiles.0">
                <option>Select</option>
                @foreach($auditors as $auditor)
                    <option value="{{$auditor->id}}">{{$auditor->saproId." | ".$auditor->name." | ".$auditor->surname." | ".$auditor->email}}</option>
                @endforeach
            </select>
        </div>

        @foreach($inputs as $key => $value)
            <div class="input-group input-group-sm mb-3">
                <select class="form-control border-success @error('attachedProfiles.'.$value) is-invalid @enderror" wire:model="attachedProfiles.{{$value}}">
                    <option>Select</option>
                    @foreach($auditors as $auditor)
                        <option value="{{$auditor->id}}">{{$auditor->saproId." | ".$auditor->name." | ".$auditor->surname." | ".$auditor->email}}</option>
                    @endforeach
                </select>


                <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">Remove</button>
            </div>
        @endforeach
        @endif

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success" wire:click.prevent="updateData()"><i
                class="mdi mdi-content-save"></i> Update Client Request
            Details
        </button>
    </div>
</form>

