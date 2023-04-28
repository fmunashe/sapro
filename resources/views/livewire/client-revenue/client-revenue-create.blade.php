<div>
    <form action="{{route('client-revenue.store')}}" method="post">
        @csrf
        <div class="modal-header modal-colored-header bg-success">
            <h4 class="modal-title" id="standard-modalLabel">Create Client Revenue</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
        </div>
        <div class="modal-body">

            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Sapro ID') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </div>
                <input id="saproId" type="text" wire:model="saproId"
                       class="form-control @error('saproId') is-invalid @enderror"
                       name="saproId" value="{{ auth()->user()->saproId }}" autocomplete="saproId">

                @error('saproId')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Main Client') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </div>
                <input id="mainClient" type="text" wire:model="mainClient"
                       class="form-control @error('mainClient') is-invalid @enderror"
                       name="mainClient" value="{{ old('mainClient') }}" autocomplete="mainClient" autofocus required>

                @error('mainClient')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Revenue') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </div>
                <input id="revenue" type="text" wire:model="revenue"
                       class="form-control @error('revenue') is-invalid @enderror"
                       name="revenue" value="{{ old('revenue') }}" autocomplete="revenue" autofocus required>

                @error('revenue')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Sector') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </div>
                <input id="sector" type="text" wire:model="sector"
                       class="form-control @error('sector') is-invalid @enderror"
                       name="sector" value="{{ old('sector') }}" autocomplete="sector" autofocus required>

                @error('sector')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Time On Client') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </div>
                <input id="timeOnClient" type="text" wire:model="timeOnClient"
                       class="form-control @error('timeOnClient') is-invalid @enderror"
                       name="timeOnClient" value="{{ old('timeOnClient') }}" autocomplete="timeOnClient" required>

                @error('timeOnClient')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>



            <div class="row mb-3">
                <div class="col-md-6">
                    <span class="text-center">Audit Work Performed</span>
                </div>
                <div class="col-md-6">

                    <button class="btn btn-success btn-sm ml-5 float-end" wire:click.prevent="add({{$i}})"><i class="uil-plus"></i>Add Work Performed
                    </button>
                </div>
            </div>
            <div class="input-group input-group-sm mb-3">
                <input id="auditWorkPerformed" type="text" wire:model="auditWorkPerformed.0"
                       class="form-control border-success @error('auditWorkPerformed.0') is-invalid @enderror"
                       name="auditWorkPerformed" value="{{ old('auditWorkPerformed.0') }}"
                       autocomplete="auditWorkPerformed" required>

                @error('auditWorkPerformed.0')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>


            @foreach($inputs as $key => $value)
                <div class="input-group input-group-sm mb-3">
                    <input type="text" class="form-control border-success" wire:model="auditWorkPerformed.{{ $value }}" required>
                    @error('auditWorkPerformed.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                        <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">Remove</button>
                </div>
            @endforeach


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-success" wire:click.prevent="store()"><i
                    class="mdi mdi-content-save"></i> Add Client Revenue
            </button>
        </div>
    </form>
</div>
