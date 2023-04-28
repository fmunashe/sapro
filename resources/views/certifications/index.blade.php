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
                        <div class="row">
                            <div class="col-md-9">
                                {{ __('Certifications And Education') }}
                            </div>
                            <div class="col-md-3">
                                <a href="" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#standard-modal"><i class="mdi mdi-pencil-plus"></i> Register Certification</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body text-center">
                        <livewire:certifications.certification-table name="certifications"/>
                    </div>
                </div>

{{--                <livewire:certifications.certifications-index/>--}}
            </div>
        </div>
    </div>

    @include('certifications.create_certifications_modal')

@endsection
