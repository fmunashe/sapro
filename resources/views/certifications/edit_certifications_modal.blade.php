<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:42
 */
?>
<div id="edit_certifications_modal_{{$certification->certificationsAndEducationId}}" class="modal fade" tabindex="-1"
     role="dialog"
     aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{route('certifications.update',[$certification->certificationsAndEducationId])}}"
                  method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-header modal-colored-header bg-success">
                    <h4 class="modal-title" id="standard-modalLabel">{{ __('Update Certification Details') }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Sapro ID') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </div>
                        <input id="saproId" type="text" class="form-control @error('saproId') is-invalid @enderror"
                               name="saproId" value="{{ $certification->saproId }}" autocomplete="saproId">

                        @error('saproId')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Institute') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </div>
                        <input id="institute" type="text" class="form-control @error('institute') is-invalid @enderror"
                               name="institute" value="{{ $certification->institute }}" autocomplete="institute"
                               autofocus required>

                        @error('institute')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Year') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </div>
                        <input id="year" type="date" class="form-control @error('year') is-invalid @enderror"
                               name="year" value="{{ $certification->year }}" autocomplete="year">

                        @error('year')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Certification Or Education') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <select id="qualification_category_id" type="text"
                                class="form-control @error('qualification_category_id') is-invalid @enderror"
                                name="qualification_category_id" value="{{ old('qualification_category_id') }}"
                                autocomplete="qualification_category_id" required>
                            <option value="">Select</option>
                            @foreach($qualifications as $qualification)
                                <option value="{{$qualification->id}}"
                                        @if($qualification->id == $certification->qualification_category_id) selected @endif>{{$qualification->qualification}}</option>
                            @endforeach
                        </select>

                        @error('certificationsAndEducation')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text mr-5"
                              id="inputGroup-sizing-sm">{{ __('Upload Certificate') }}</span>
                        <input id="certificate" type="file"
                               class="form-control @error('certificate') is-invalid @enderror"
                               name="certificate" value="{{ old('certificate') }}" autocomplete="certificate">

                        @error('certificate')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="mdi mdi-content-save"></i> Update
                        Certification
                        Details
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
