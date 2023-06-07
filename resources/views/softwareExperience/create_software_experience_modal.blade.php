<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:42
 */
?>
<div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{route('software-experience.store')}}" method="post">
                @csrf
                <div class="modal-header modal-colored-header bg-success">
                    <h4 class="modal-title" id="standard-modalLabel">New Software Experience</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Sapro ID') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </div>
                        <input id="saproId" type="text" class="form-control @error('saproId') is-invalid @enderror"
                               name="saproId" value="{{ auth()->user()->saproId }}" autocomplete="saproId">

                        @error('saproId')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Level') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </div>
                        <select id="level" type="text" class="form-control @error('level') is-invalid @enderror"
                                name="level" autocomplete="level">
                            <option value="">Select</option>
                            @foreach(\App\Enums\SoftwareExperienceLevels::getSoftwareExperienceLevels() as $level)
                                <option value="{{$level}}">{{$level}}</option>
                            @endforeach
                        </select>

                        @error('level')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"
                                  id="inputGroup-sizing-sm">{{ __('Software Experience') }}</span>
                        </div>
                        <select id="software_category_id" type="text"
                                class="form-control @error('software_category_id') is-invalid @enderror"
                                name="software_category_id" autocomplete="software_category_id" autofocus required>
                            <option value="">Select</option>
                            @foreach($softwareCategories as $softwareCategory)
                                <option
                                    value="{{$softwareCategory->id}}">{{$softwareCategory->softwareCategory}}</option>
                            @endforeach
                        </select>

                        @error('software_category_id')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="mdi mdi-content-save"></i> Add Software Experience
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
