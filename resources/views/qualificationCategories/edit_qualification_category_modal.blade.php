<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:42
 */
?>
<div id="edit_qualification_category_modal_{{$category->id}}" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{route('qualification-categories.update',[$category->id])}}" method="post">
                @csrf
                @method('put')
                <div class="modal-header modal-colored-header bg-success">
                    <h4 class="modal-title" id="standard-modalLabel">{{ __('Update Qualification Category') }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Qualification') }}&nbsp;&nbsp;&nbsp;</span>
                        </div>
                        <input id="qualification" type="text" class="form-control @error('qualification') is-invalid @enderror"
                               name="qualification" value="{{ $category->qualification }}" autocomplete="qualification" autofocus required>

                        @error('qualification')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Group') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </div>
                        <input id="group" type="text" class="form-control @error('group') is-invalid @enderror"
                               name="group" value="{{ $category->group }}" autocomplete="group" autofocus required>

                        @error('group')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="input-group input-group-sm mb-3">

                            <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Comments') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>

                        <textarea id="comments" type="text" class="form-control @error('comments') is-invalid @enderror"
                                  name="comments"  autocomplete="comments" autofocus>{{$category->comments}}</textarea>

                        @error('comments')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="mdi mdi-content-save"></i> Update Assignment Type
                        Details
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
