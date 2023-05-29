<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:43
 */
?>

<div id="show_country_modal_{{$country->id}}" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-info">
                <h4 class="modal-title" id="danger-header-modalLabel">Country Details</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <table class="table table-sm table-striped">
                    <tr>
                        <th>Country :</th>
                        <td>{{$country->country}}</td>
                    </tr>
                    <tr>
                        <th>Nationality :</th>
                        <td>{{$country->nationality}}</td>
                    </tr>

                    <tr>
                        <th>Is International Experience :</th>
                        <td>{{$country->isInternationalExperience?"Yes":"No"}}</td>
                    </tr>
                </table>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card table-responsive">
                            <div class="card-header modal-colored-header bg-info">
                                <p class="modal-title">Provinces</p>
                            </div>
                            <div class="card-body">

                                @if(count($country->provinces))
                                    <table class="table table-sm table-striped">
                                        <tr>
                                            <th>#</th>
                                            <th>Province</th>
                                        </tr>
                                        @foreach($country->provinces as $countryProvince)
                                            <tr>
                                                <td>{{$countryProvince->id}}</td>
                                                <td>{{$countryProvince->province}}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @endif

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card table-responsive">
                            <div class="card-header modal-colored-header bg-info">
                                <p class="modal-title">Host Firms</p>
                            </div>
                            <div class="card-body">

                                @if(count($country->hostFirms))
                                <table class="table table-sm">
                                    <tr>
                                        <th>#</th>
                                        <th>Host Firm</th>
                                        <th>Host Firm Code</th>
                                    </tr>
                                    @foreach($country->hostFirms as $firm)
                                        <tr>
                                            <td>{{$firm->id}}</td>
                                            <td>{{$firm->hostFirm}}</td>
                                            <td>{{$firm->code}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>


