<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:43
 */
?>

<div id="show_listed_clients_modal_{{$listedClient->listedClientId}}" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-info">
                <h4 class="modal-title" id="danger-header-modalLabel">Listed Clients Details</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <table class="table table-sm table-striped">
                    <tr>
                        <th>Sapro ID :</th>
                        <td>{{$listedClient->saproId}}</td>
                    </tr>
                    <tr>
                        <th>Listed Client :</th>
                        <td>{{$listedClient->listedClient}}</td>
                    </tr>
                    <tr>
                        <th>Sector :</th>
                        <td>{{$listedClient->sector}}</td>
                    </tr>
                    <tr>
                        <th>Approved :</th>
                        <td>{{$listedClient->approved?"Yes":"No"}}</td>
                    </tr>
                    <tr>
                        <th>Approved By :</th>
                        <td>{{$listedClient->approvedBy}}</td>
                    </tr>
                    @if(!$listedClient->approved)
                        <tr>
                            <th></th>
                            <td>
                                <form action="{{route('listed-clients.approveListedClient',[$listedClient->listedClientId])}}" method="post">
                                    @csrf
                                    @method('patch')
                                    @if(auth()->user()->type == \App\Enums\UserTypeEnum::SUPER_ADMIN || auth()->user()->type == \App\Enums\UserTypeEnum::ADMIN)
                                        <button type="submit" class="btn btn-outline-success float-end">Approve Listed Client</button>
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


