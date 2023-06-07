<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:42
 */
?>
<div id="edit_office_modal_{{$office->id}}" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{route('offices.update',[$office->id])}}" method="post">
                @csrf
                @method('put')
                <div class="modal-header modal-colored-header bg-success">
                    <h4 class="modal-title" id="standard-modalLabel">{{ __('Update Office') }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Country') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <select id="country_id" type="text"
                                class="form-control @error('country_id') is-invalid @enderror"
                                name="country_id" autocomplete="country_id" autofocus
                                required>
                            @foreach($countries as $country)
                                <option value="{{$country->id}}" @if($office->country_id ==$country->id) selected @endif>{{$country->country}}</option>
                            @endforeach
                        </select>

                        @error('country_id')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Office') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input id="office" type="text" class="form-control @error('office') is-invalid @enderror"
                               name="office" value="{{ $office->office }}" autocomplete="office" autofocus
                               required>

                        @error('office')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="mdi mdi-content-save"></i> Update Office
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
