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
                                {{ __('Additional Experiences') }}
                            </div>
                            <div class="col-md-3">
                                <a href="" class="btn btn-success float-end" data-bs-toggle="modal"
                                   data-bs-target="#standard-modal"><i
                                        class="mdi mdi-pencil-plus"></i> Add Additional Experience</a>
                            </div>
                        </div>

                    </div>

                    <div class="card-body text-center">
                        <livewire:additional-experience.additional-experience-table/>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('additionalExperience.create_additional_experience_modal')
@endsection
