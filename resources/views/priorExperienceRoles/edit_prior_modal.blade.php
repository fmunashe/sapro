<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:42
 */
?>
<div id="edit_prior_modal_{{$priorExperience->id}}" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{route('prior-experience-roles.update',[$priorExperience->id])}}" method="post">
                @csrf
                @method('put')
                <div class="modal-header modal-colored-header bg-success">
                    <h4 class="modal-title" id="standard-modalLabel">{{ __('Update Prior Experience Role') }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Prior Experience Role') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <textarea id="priorExperienceRole" type="text" class="form-control @error('priorExperienceRole') is-invalid @enderror"
                                  name="priorExperienceRole" autocomplete="priorExperienceRole" autofocus required>{{ $priorExperience->priorExperienceRole }}</textarea>

                        @error('priorExperienceRole')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="mdi mdi-content-save"></i> Update Prior Experience Role
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
