<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:42
 */
?>
<div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{route('seniority-levels.store')}}" method="post">
                @csrf
                <div class="modal-header modal-colored-header bg-success">
                    <h4 class="modal-title" id="standard-modalLabel">New Seniority Level Creation</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">

                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Seniority Level Code') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            </div>
                            <input id="seniorityLevelCode" type="text" class="form-control @error('seniorityLevelCode') is-invalid @enderror"
                                   name="seniorityLevelCode" value="{{ old('seniorityLevelCode') }}" autocomplete="seniorityLevelCode" autofocus required>

                            @error('seniorityLevelCode')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Seniority Level Description') }} &nbsp;&nbsp;</span>
                            </div>
                            <input id="seniorityLevelDescription" type="text" class="form-control @error('seniorityLevelDescription') is-invalid @enderror"
                                      name="seniorityLevelDescription" value="{{ old('seniorityLevelDescription') }}" autocomplete="seniorityLevelDescription" required>

                            @error('seniorityLevelDescription')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="mdi mdi-content-save"></i> Create Seniority Level</button>
                </div>
            </form>
        </div>
    </div>
</div>
