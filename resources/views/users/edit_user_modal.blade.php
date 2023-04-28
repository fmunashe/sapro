<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:42
 */
?>
<div id="edit_user_modal_{{$user->id}}" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{route('users.update',[$user->id])}}" method="post">
                @csrf
                @method('put')
                <div class="modal-header modal-colored-header bg-success">
                    <h4 class="modal-title" id="standard-modalLabel">{{ __('Update User Details') }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6">
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Name') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </div>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ $user->name }}" autocomplete="name" autofocus required>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Surname') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </div>
                        <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror"
                               name="surname" value="{{ $user->name }}" autocomplete="name" autofocus required>

                        @error('surname')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>


                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Sapro Email Address') }}</span>
                        </div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ $user->email }}" autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Personal Email Address') }}</span>
                        </div>
                        <input id="saproEmail" type="email" class="form-control @error('saproEmail') is-invalid @enderror"
                               name="saproEmail" value="{{ $user->saproEmail }}" autocomplete="saproEmail">

                        @error('saproEmail')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Sapro ID') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </div>
                        <input id="saproId" type="text" class="form-control @error('saproId') is-invalid @enderror"
                               name="saproId" value="{{ $user->saproId }}" autocomplete="saproId">

                        @error('saproId')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('User Role') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </div>
                        <select id="user_type" type="text"
                                class="form-control @error('type') is-invalid @enderror" name="type"
                                value="{{ old('type') }}" autocomplete="user_type" autofocus

                                @if(auth()->user()->type !=\App\Enums\UserTypeEnum::SUPER_ADMIN && auth()->user()->type !=\App\Enums\UserTypeEnum::ADMIN )
                                required disabled
                                @endif

                        >
                            @foreach(\App\Enums\UserTypeEnum::getUserTypes() as $type)
                                <option
                                    value="{{$type}}"
                                    @if($user->type==$type) selected @endif >{{$type}}</option>
                            @endforeach

                        </select>
                        @error('type')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Location') }}</span>
                        </div>
                        <input id="location" type="text"
                               class="form-control @error('location') is-invalid @enderror"
                               name="location" value="{{ $user->location }}" autocomplete="location"
                               required>

                        @error('location')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="input-group input-group-sm input-group-merge mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Password') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </div>
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password"
                               autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                                    <span class="input-group-text"
                                          id="inputGroup-sizing-sm">{{ __('Confirm Password') }}</span>
                        </div>
                        <input id="password-confirm" type="password" class="form-control"
                               name="password_confirmation" autocomplete="new-password">
                    </div>
                </div>

                        <div class="col-md-6">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Seniority Level') }}&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                </div>
                                <select id="seniorityLevelId" type="text"
                                        class="form-control @error('seniorityLevelId') is-invalid @enderror"
                                        name="seniorityLevelId"
                                        value="{{ $user->seniorityLevelId }}" autocomplete="seniorityLevelId" autofocus
                                        required>
                                    @foreach($seniorityLevels as $level)
                                        <option
                                            value="{{$level->seniorityLevelId}}" {{($user->seniorityLevelId == $level->seniorityLevelId)?"selected":"" }}>{{$level->seniorityLevelDescription}}</option>
                                    @endforeach

                                </select>
                                @error('seniorityLevelId')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Contract Status') }}&nbsp;&nbsp;</span>
                                </div>
                                <select id="contractStatusId" type="text"
                                        class="form-control @error('contractStatusId') is-invalid @enderror"
                                        name="contractStatusId"
                                        value="{{ $user->contractStatusId }}" autocomplete="contractStatusId" autofocus
                                        required>
                                    @foreach($contractStatus as $status)
                                        <option
                                            value="{{$status->contractStatusId}}" {{($user->contractStatusId == $status->contractStatusId)?"selected":"" }}>{{$status->contractStatusDescription}}</option>
                                    @endforeach

                                </select>
                                @error('contractStatusId')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Specialisation') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                </div>
                                <select id="specialisationId" type="text"
                                        class="form-control @error('specialisationId') is-invalid @enderror"
                                        name="specialisationId"
                                        value="{{ $user->specialisationId }}" autocomplete="specialisationId" autofocus
                                        required>
                                    @foreach($specialisations as $specialisation)
                                        <option value="{{$specialisation->specialisationId}}" {{($user->specialisationId == $specialisation->specialisationId)?"selected":"" }}>{{$specialisation->specialisationDescription}}</option>
                                    @endforeach

                                </select>
                                @error('specialisationId')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Sapro Contract Start Date') }} &nbsp;&nbsp;</span>
                                </div>
                                <input id="saproContractStartDate" type="date"
                                       class="form-control @error('saproContractStartDate') is-invalid @enderror"
                                       name="saproContractStartDate" value="{{ $user->saproContractStartDate }}"
                                       autocomplete="saproContractStartDate"
                                       required>

                                @error('saproContractStartDate')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Sapro Contract End Date') }} &nbsp;&nbsp;&nbsp;&nbsp;</span>
                                </div>
                                <input id="saproContractEndDate" type="date"
                                       class="form-control @error('saproContractEndDate') is-invalid @enderror"
                                       name="saproContractEndDate" value="{{ $user->saproContractEndDate }}"
                                       autocomplete="saproContractEndDate"
                                       required>

                                @error('saproContractEndDate')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Nationality') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                </div>
                                <input id="nationality" type="text"
                                       class="form-control @error('nationality') is-invalid @enderror"
                                       name="nationality" value="{{ $user->nationality }}" autocomplete="nationality"
                                       required>

                                @error('nationality')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Article Firm') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                </div>
                                <input id="articleFirm" type="text"
                                       class="form-control @error('articleFirm') is-invalid @enderror"
                                       name="articleFirm" value="{{ $user->articleFirm }}" autocomplete="articleFirm"
                                       required>

                                @error('articleFirm')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Highest Qualification') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                </div>
                                <input id="highestQualification" type="text"
                                       class="form-control @error('highestQualification') is-invalid @enderror"
                                       name="highestQualification" value="{{ $user->highestQualification }}"
                                       autocomplete="highestQualification"
                                       required>

                                @error('highestQualification')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Travel') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                </div>
                                <input id="travel" type="text"
                                       class="form-control @error('travel') is-invalid @enderror"
                                       name="travel" value="{{ $user->travel }}" autocomplete="travel"
                                       required>

                                @error('travel')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="mdi mdi-content-save"></i> Update User
                        Details
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
