<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:43
 */
?>

<div id="show_fact_external_client_modal_{{$client->externalClientId}}" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-info">
                <h4 class="modal-title" id="danger-header-modalLabel">Fact External Client Details</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <table class="table table-sm table-striped">
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
                        <th></th>
                        <td></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>


