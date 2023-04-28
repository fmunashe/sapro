<div>
    <form action="{{route('certifications.store')}}" method="post">
        @csrf
        <div class="modal-header modal-colored-header bg-success">
            <h4 class="modal-title" id="standard-modalLabel">New Request Creation</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
        </div>
        <div class="modal-body">

            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Search Client') }}</span>
                </div>
                <select class="form-control @error('clientRequest.client_id') is-invalid @enderror"
                        wire:model="clientRequest.client_id">
                    <option>Select</option>
                    @foreach($clients as $client)
                        <option
                            value="{{$client->id}}">{{$client->name." | ".$client->surname." | ".$client->email}}</option>
                    @endforeach
                </select>

                @error('clientRequest.client_id')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <span class="">{{ __('Request Description') }}</span>
            <div class="input-group input-group-sm mb-3">
                <textarea wire:model="clientRequest.description"
                          class="form-control @error('clientRequest.description') is-invalid @enderror" rows="3"></textarea>

                @error('clientRequest.description')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success" wire:click.prevent="store()"><i
                    class="mdi mdi-content-save"></i> Create Request
            </button>
        </div>
    </form>
</div>
