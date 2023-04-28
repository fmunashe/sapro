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
                <livewire:client-requests.client-requests-index/>
            </div>
        </div>
    </div>

    @include('clientRequests.create_client_request_modal')
@endsection
