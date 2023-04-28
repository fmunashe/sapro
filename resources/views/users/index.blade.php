<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:40
 */
?>
@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-1">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        @if(auth()->user()->type ==\App\Enums\UserTypeEnum::SUPER_ADMIN ||auth()->user()->type ==\App\Enums\UserTypeEnum::ADMIN )
                            <div class="row">
                                <div class="col">
                                    @if(auth()->user()->type ==\App\Enums\UserTypeEnum::ADMIN || auth()->user()->type ==\App\Enums\UserTypeEnum::SUPER_ADMIN) {{ __('Registered Users') }} @else{{ __('My Profile') }} @endif
                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-3">
                                    <a href="{{route('generate-pdf')}}" target="_blank" class="btn btn-success float-start"><i class="uil-cloud-download"></i> Download Users Report</a>

                                    <a href="" class="btn btn-success float-end" data-bs-toggle="modal"
                                       data-bs-target="#standard-modal"><i class="mdi mdi-pencil-plus"></i> Create User</a>
                                </div>
                            </div>
                        @endif

                    </div>

                    <div class="card-body text-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
{{--                            <livewire:users.users-index/>--}}
                            <livewire:users.user-datatables/>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('users.create_user_modal')
@endsection
