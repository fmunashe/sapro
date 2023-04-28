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
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{route('users.store')}}" method="post">
                @csrf
                <div class="modal-header modal-colored-header bg-success">
                    <h4 class="modal-title" id="standard-modalLabel">New User Registration</h4>
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
                                   name="name" value="{{ old('name') }}" autocomplete="name" autofocus required>

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
                                   name="surname" value="{{ old('surname') }}" autocomplete="surname" autofocus
                                   required>

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
                                   name="email" value="{{ old('email') }}" autocomplete="email" required>

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
                            <input id="saproEmail" type="email"
                                   class="form-control @error('saproEmail') is-invalid @enderror"
                                   name="saproEmail" value="{{ old('saproEmail') }}" autocomplete="saproEmail" required>

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
                                   name="saproId" value="{{ old('saproId') }}" autocomplete="saproId">

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
                            <select id="type" type="text"
                                    class="form-control @error('type') is-invalid @enderror" name="type"
                                    value="{{ old('type') }}" autocomplete="type" autofocus required>
                                <option value=""></option>
                                @foreach(\App\Enums\UserTypeEnum::getUserTypes() as $type)
                                    <option value="{{$type}}">{{$type}}</option>
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
                                   name="location" value="{{ old('location') }}" autocomplete="location"
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
                                   autocomplete="new-password" required>

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
                                   name="password_confirmation" autocomplete="new-password" required>
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
                                        value="{{ old('seniorityLevelId') }}" autocomplete="seniorityLevelId" autofocus
                                        required>
                                    @foreach($seniorityLevels as $level)
                                        <option
                                            value="{{$level->seniorityLevelId}}">{{$level->seniorityLevelDescription}}</option>
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
                                        value="{{ old('contractStatusId') }}" autocomplete="contractStatusId" autofocus
                                        required>
                                    @foreach($contractStatus as $status)
                                        <option
                                            value="{{$status->contractStatusId}}">{{$status->contractStatusDescription}}</option>
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
                                        value="{{ old('specialisationId') }}" autocomplete="specialisationId" autofocus
                                        required>
                                    @foreach($specialisations as $specialisation)
                                        <option
                                            value="{{$specialisation->specialisationId}}">{{$specialisation->specialisationDescription}}</option>
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
                                       name="saproContractStartDate" value="{{ old('saproContractStartDate') }}"
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
                                       name="saproContractEndDate" value="{{ old('saproContractEndDate') }}"
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
                                       name="nationality" value="{{ old('nationality') }}" autocomplete="nationality"
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
                                       name="articleFirm" value="{{ old('articleFirm') }}" autocomplete="articleFirm"
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
                                       name="highestQualification" value="{{ old('highestQualification') }}"
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
                                       name="travel" value="{{ old('travel') }}" autocomplete="travel"
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
                    <button type="submit" class="btn btn-success"><i class="mdi mdi-content-save"></i> Register Client
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
