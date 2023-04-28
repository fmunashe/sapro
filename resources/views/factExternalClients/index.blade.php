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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Fact External Clients') }}
                        <a href="" class="btn btn-success float-end" data-bs-toggle="modal"
                           data-bs-target="#standard-modal"><i class="mdi mdi-pencil-plus"></i> Create Fact External Client</a>
                    </div>

                    <div class="card-body text-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-striped table-sm table-responsive">
                            <tr>
                                <th>#</th>
                                <th>Seniority Level</th>
                                <th>Contract Status</th>
                                <th>Specialisation</th>
                                <th>Sapro ID</th>
                                <th>Name</th>
                                <th>Surname</th>
{{--                                <th>Personal Email</th>--}}
{{--                                <th>Sapro Email</th>--}}
{{--                                <th>Sapro Contract Start Date</th>--}}
{{--                                <th>Sapro Contract End Date</th>--}}
{{--                                <th>Location</th>--}}
{{--                                <th>Nationality</th>--}}
{{--                                <th>Article Firm</th>--}}
{{--                                <th>Highest Qualification</th>--}}
{{--                                <th>Travel</th>--}}
                                <th>Action</th>
                            </tr>
                            @foreach($externalClients as $client)
                                <tr>
                                    <td>{{$client->externalClientId}}</td>
                                    <td>{{$client->seniorityLevels->seniorityLevelDescription}}</td>
                                    <td>{{$client->contractStatus->contractStatusDescription}}</td>
                                    <td>{{$client->specialisation->specialisationDescription}}</td>
                                    <td>{{$client->saproId}}</td>
                                    <td>{{$client->name}}</td>
                                    <td>{{$client->surname}}</td>
{{--                                    <td>{{$client->personalEmail}}</td>--}}
{{--                                    <td>{{$client->saproEmail}}</td>--}}
{{--                                    <td>{{$client->saproContractStartDate}}</td>--}}
{{--                                    <td>{{$client->saproContractEndDate}}</td>--}}
{{--                                    <td>{{$client->location}}</td>--}}
{{--                                    <td>{{$client->nationality}}</td>--}}
{{--                                    <td>{{$client->articleFirm}}</td>--}}
{{--                                    <td>{{$client->highestQualificaion}}</td>--}}
{{--                                    <td>{{$client->travel}}</td>--}}
                                    <td class="pull-right">
                                        <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
                                                data-bs-target="#show_fact_external_client_modal_{{$client->externalClientId}}">
                                            <i class="uil-eye"></i>&nbsp;Show
                                        </button>
                                        @include('factExternalClients.show_fact_external_client_modal')
                                        <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
                                                data-bs-target="#edit_fact_external_client_modal_{{$client->externalClientId}}">
                                            <i class="uil-pen"></i>&nbsp;Edit
                                        </button>
                                        @include('factExternalClients.edit_fact_external_client_modal')

                                        <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
                                                data-bs-target="#delete_fact_external_client_modal_{{$client->externalClientId}}">
                                            <i class="uil-trash"></i>&nbsp;Delete
                                        </button>
                                        @include('factExternalClients.delete_fact_external_client_modal')
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{$externalClients->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('factExternalClients.create_fact_external_client_modal')



@endsection
