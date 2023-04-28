<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:42
 */
?>

<div id="delete_fact_external_client_modal_{{$client->externalClientId}}" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{route('fact-external-clients.destroy',[$client->externalClientId])}}" method="post" class="m-0">
                @csrf
                @method('delete')
                <div class="modal-header modal-colored-header bg-danger">
                    <h4 class="modal-title" id="danger-header-modalLabel">Confirm Delete</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <p class="">Please confirm you want to permanently delete this record:</p>
                    <hr>
                    <table class="table table-sm justify-content-start">
                        <tr>
                            <th>Seniority Level :</th>
                            <td>{{$client->seniorityLevels->seniorityLevelDescription}}</td>
                            <th>Specialisation :</th>
                            <td>{{$client->specialisation->specialisationDescription}}</td>
                        </tr>
                        <tr>
                            <th>Contract Status :</th>
                            <td>{{$client->contractStatus->contractStatusDescription}}</td>
                            <th>Sapro ID :</th>
                            <td>{{$client->saproId}}</td>
                        </tr>
                        <tr>
                            <th>Name :</th>
                            <td>{{$client->name}}</td>
                            <th>Surname :</th>
                            <td>{{$client->surname}}</td>
                        </tr>
                        <tr>
                            <th>Personal Email :</th>
                            <td>{{$client->personalEmail}}</td>
                            <th>Sapro Email :</th>
                            <td>{{$client->saproEmail}}</td>
                        </tr>
                        <tr>
                            <th>Sapro Contract Start Date :</th>
                            <td>{{$client->saproContractStartDate}}</td>
                            <th>Sapro Contract End Date :</th>
                            <td>{{$client->saproContractEndDate}}</td>
                        </tr>
                        <tr>
                            <th>Nationality:</th>
                            <td>{{$client->nationality}}</td>
                            <th>Location :</th>
                            <td>{{$client->location}}</td>
                        </tr>
                        <tr>
                            <th>Article Firm:</th>
                            <td>{{$client->articleFirm}}</td>
                            <th>Highest Qualification :</th>
                            <td>{{$client->highestQualification}}</td>
                        </tr>
                        <tr>
                            <th>Travel:</th>
                            <td>{{$client->travel}}</td>
                        </tr>
                    </table>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success " data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Yes Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>


