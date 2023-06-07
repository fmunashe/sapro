<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:43
 */
?>

<div id="show_sector_modal_{{$sector->sectorId}}" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-info">
                <h4 class="modal-title" id="danger-header-modalLabel">Sector Details</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <table class="table table-sm table-striped">
                    <tr>
                        <th>Sapro ID :</th>
                        <td>{{$sector->saproId}}</td>
                    </tr>
                    <tr>
                        <th>Sector :</th>
                        <td>{{$sector->sectorCategories->name??""}}</td>
                    </tr>
                    <tr>
                        <th>Approved :</th>
                        <td>{{$sector->approved?"Yes":"No"}}</td>
                    </tr>
                    <tr>
                        <th>Approved By :</th>
                        <td>{{$sector->approvedBy}}</td>
                    </tr>
                    @if(!$sector->approved)
                        <tr>
                            <th></th>
                            <td>
                                <form action="{{route('sectors.approveSector',[$sector->sectorId])}}" method="post">
                                    @csrf
                                    @method('patch')
                                    @if(auth()->user()->type == \App\Enums\UserTypeEnum::SUPER_ADMIN || auth()->user()->type == \App\Enums\UserTypeEnum::ADMIN)
                                        <button type="submit" class="btn btn-outline-success float-end">Approve Sector</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>


