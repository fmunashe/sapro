<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:42
 */
?>

<div id="delete_sector_modal_{{$sector->sectorId}}" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{route('sectors.destroy',[$sector->sectorId])}}" method="post" class="m-0">
                @csrf
                @method('delete')
                <div class="modal-header modal-colored-header bg-danger">
                    <h4 class="modal-title" id="danger-header-modalLabel">Confirm Delete</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <p class="">Please confirm you want to permanently delete this record:</p>
                    <hr>
                    <table class="table table-sm">
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


