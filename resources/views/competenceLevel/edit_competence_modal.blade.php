<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:42
 */
?>
<div id="edit_competence_modal_{{$competence->id}}" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{route('competence-levels.update',[$competence->id])}}" method="post">
                @csrf
                @method('put')
                <div class="modal-header modal-colored-header bg-success">
                    <h4 class="modal-title" id="standard-modalLabel">{{ __('Update Competence Details') }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">

                    <div class="input-group input-group-sm mb-3">

                        <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Competences') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>

                        <textarea id="competenceLevel" type="text"
                                  class="form-control @error('competenceLevel') is-invalid @enderror"
                                  name="competenceLevel"
                                  autocomplete="competenceLevel" autofocus
                                  required>{{ $competence->competenceLevel }}</textarea>

                        @error('competenceLevel')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="input-group input-group-sm mb-3">

                            <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Seniority Level') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>

                        <select id="seniorityLevelId" type="text"
                                class="form-control @error('seniorityLevelId') is-invalid @enderror"
                                name="seniorityLevelId" autocomplete="seniorityLevelId" autofocus required>
                            <option value="">Select</option>

                            @foreach($seniorityLevels as $seniorityLevel)
                                <option value="{{$seniorityLevel->seniorityLevelId}}"
                                        @if($seniorityLevel->seniorityLevelId == $competence->seniorityLevelId) selected @endif>{{$seniorityLevel->seniorityLevelDescription}}</option>
                            @endforeach
                        </select>

                        @error('seniorityLevelId')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="mdi mdi-content-save"></i> Update Competence
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
