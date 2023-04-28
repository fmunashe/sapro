@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-1">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"></div>

                    <div class="card-body text-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if(auth()->user()->type ==\App\Enums\UserTypeEnum::ADMIN || auth()->user()->type ==\App\Enums\UserTypeEnum::SUPER_ADMIN || auth()->user()->type ==\App\Enums\UserTypeEnum::REPORTING)
                            <livewire:home.home-index/>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
