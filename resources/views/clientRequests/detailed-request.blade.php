@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-1">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header modal-colored-header bg-info">
                        <div class="row">
                            <div class="col">
                                {{ __('Client Request Overview') }}
                            </div>
                            <div class="col">
                                <a href="{{route('client-requests.index')}}" class="btn btn-primary btn-block float-end">Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <livewire:client-requests.client-requests-show :clientRequest="$clientRequest" :key="$clientRequest->id"/>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
