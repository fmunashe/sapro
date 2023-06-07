<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:42
 */
?>
<div id="edit_software_experience_modal_{{$experience->softwareExperienceId}}" class="modal fade" tabindex="-1"
     role="dialog"
     aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{route('software-experience.update',[$experience->softwareExperienceId])}}" method="post">
                @csrf
                @method('put')
                <div class="modal-header modal-colored-header bg-success">
                    <h4 class="modal-title" id="standard-modalLabel">{{ __('Update Software Experience Details') }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">

                    <div class="input-group input-group-sm mb-3">

                            <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Sapro ID') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>

                        <input id="saproId" type="text" class="form-control @error('saproId') is-invalid @enderror"
                               name="saproId" value="{{ $experience->saproId }}" autocomplete="saproId">

                        @error('saproId')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="input-group input-group-sm mb-3">

                            <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Level') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <select id="level" type="text" class="form-control @error('level') is-invalid @enderror"
                                name="level" value="{{ $experience->level }}" autocomplete="level">
                            <option value="">Select</option>
                            @foreach(\App\Enums\SoftwareExperienceLevels::getSoftwareExperienceLevels() as $level)
                                <option value="{{$level}}"
                                        @if($level== $experience->level) selected @endif>{{$level}}</option>
                            @endforeach
                        </select>

                        @error('level')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="input-group input-group-sm mb-3">

                            <span class="input-group-text"
                                  id="inputGroup-sizing-sm">{{ __('Software Experience') }}</span>

                        <select id="software_category_id" type="text"
                                class="form-control @error('softwareExperience') is-invalid @enderror"
                                name="software_category_id" value="{{ $experience->softwareExperience }}"
                                autocomplete="software_category_id" autofocus required>
                            <option value="">Select</option>
                            @foreach($softwareCategories as $category)
                                <option value="{{$category->id}}"
                                        @if($category->id == $experience->software_category_id) selected @endif>{{$category->softwareCategory}}</option>
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
                    <button type="submit" class="btn btn-success"><i class="mdi mdi-content-save"></i> Update Software
                        Experience
                        Details
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
