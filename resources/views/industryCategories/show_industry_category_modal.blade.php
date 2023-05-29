<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:43
 */
?>

<div id="show_industry_category_modal_{{$industryCategory->id}}" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-info">
                <h4 class="modal-title" id="danger-header-modalLabel">Industry Category Details</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <table class="table table-sm">
                    <tr>
                        <th>Industry Category:</th>
                        <td>{{$industryCategory->name}}</td>
                    </tr>
                </table>

                @if(count($industryCategory->sectorCategories))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card table-responsive">
                                <div class="card-header modal-colored-header bg-info">
                                    <p class="modal-title">Sectors <span
                                            class="float-end">Total:  {{count($industryCategory->sectorCategories)}}</span>
                                    </p>
                                </div>
                                <div class="card-body">


                                    <table class="table table-sm table-striped">
                                        <tr>
                                            <th>#</th>
                                            <th>Sector</th>
                                        </tr>
                                        @foreach($industryCategory->sectorCategories as $sector)
                                            <tr>
                                                <td>{{$sector->id}}</td>
                                                <td>{{$sector->name}}</td>
                                            </tr>
                                        @endforeach
                                    </table>


                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>


