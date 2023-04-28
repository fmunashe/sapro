<div>
    <form action="{{route('client-revenue.update',[$revenue->clientRevenueId])}}" method="post">
        @csrf
        @method('put')
        <div class="modal-header modal-colored-header bg-success">
            <h4 class="modal-title" id="standard-modalLabel">{{ __('Update Client Revenue Details') }}</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
        </div>
        <div class="modal-body">

            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Sapro ID') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </div>
                <input id="saproId" type="text" wire:model="revenue.saproId"
                       class="form-control @error('revenue.saproId') is-invalid @enderror"
                       name="saproId" autocomplete="saproId">

                @error('revenue.saproId')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Main Client') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </div>
                <input id="mainClient" type="text" wire:model="revenue.mainClient"
                       class="form-control @error('revenue.mainClient') is-invalid @enderror"
                       name="mainClient" autocomplete="mainClient" autofocus required>

                @error('revenue.mainClient')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Revenue') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </div>
                <input id="revenue" type="text" wire:model="revenue.revenue"
                       class="form-control @error('revenue.revenue') is-invalid @enderror"
                       name="revenue" autocomplete="revenue" autofocus required>

                @error('revenue.revenue')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Sector') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </div>
                <input id="sector" type="text" wire:model="revenue.sector"
                       class="form-control @error('revenue.sector') is-invalid @enderror"
                       name="sector" autocomplete="sector" autofocus required>

                @error('revenue.sector')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Time On Client') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </div>
                <input id="timeOnClient" wire:model="revenue.timeOnClient" type="text"
                       class="form-control @error('revenue.timeOnClient') is-invalid @enderror"
                       name="timeOnClient" autocomplete="timeOnClient" required>
                @error('revenue.timeOnClient')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <table class="table table-sm table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Work Performed</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($revenue->auditedWork as $auditedWork)
                    <livewire:audited-work.audited-work-index :auditedWork="$auditedWork" :wire:key="$auditedWork->id"/>
                @endforeach
                </tbody>
            </table>

            <div class="row mb-3">
                <div class="col-md-6">

                </div>
                <div class="col-md-6">

                    <button class="btn btn-success btn-sm ml-5 float-end" wire:click.prevent="add({{$i}})"><i
                            class="uil-plus"></i>Add Work Performed
                    </button>
                </div>
            </div>

            <div class="input-group input-group-sm mb-3">
                <input id="auditWorkPerformed" type="text" wire:model="auditWorkPerformed.0"
                       class="form-control border-success @error('auditWorkPerformed.0') is-invalid @enderror"
                       name="auditWorkPerformed" value="{{ old('auditWorkPerformed.0') }}"
                       autocomplete="auditWorkPerformed">

                @error('auditWorkPerformed.0')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>


            @foreach($inputs as $key => $value)
                <div class="input-group input-group-sm mb-3">
                    <input type="text" class="form-control border-success" wire:model="auditWorkPerformed.{{ $value }}">
                    @error('auditWorkPerformed.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                    <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">Remove</button>
                </div>
            @endforeach

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success" wire:click.prevent="updateData()"><i
                    class="mdi mdi-content-save"></i> Update Client Revenue
                Details
            </button>
        </div>
    </form>
</div>
