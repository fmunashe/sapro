<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:42
 */
?>

<div id="delete_scheduling_modal_{{$schedule->schedulingId}}" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{route('scheduling.destroy',[$schedule->schedulingId])}}" method="post" class="m-0">
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
                            <td>{{$schedule->saproId}}</td>
                            <th>Year :</th>
                            <td>{{$schedule->year}}</td>
                        </tr>
                        <tr>
                            <th>BS Host Firm Code :</th>
                            <td>{{$schedule->bsHostFirmCode}}</td>
                            <th>BS Start Date :</th>
                            <td>{{$schedule->bsStartDate}}</td>
                        </tr>
                        <tr>
                            <th>BS End Date :</th>
                            <td>{{$schedule->bsEndDate}}</td>
                            <th>Post BS Host Firm Code :</th>
                            <td>{{$schedule->postBsHostFirmCode}}</td>
                        </tr>
                        <tr>
                            <th>Post BS Start Date :</th>
                            <td>{{$schedule->postBsStartDate}}</td>
                            <th>Post BS End Date :</th>
                            <td>{{$schedule->postBsEndDate}}</td>
                        </tr>
                        <tr>
                            <th>Approved :</th>
                            <td>{{$schedule->approved?"Yes":"No"}}</td>
                            <th>Approved By :</th>
                            <td>{{$schedule->approvedBy}}</td>
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


