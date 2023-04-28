<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:42
 */
?>

<div id="delete_client_revenue_modal_{{$revenue->clientRevenueId}}" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{route('client-revenue.destroy',[$revenue->clientRevenueId])}}" method="post" class="m-0">
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
                            <td>{{$revenue->saproId}}</td>
                        </tr>
                        <tr>
                            <th>Main Client :</th>
                            <td>{{$revenue->mainClient}}</td>
                        </tr>
                        <tr>
                            <th>Revenue :</th>
                            <td>{{"$ ".number_format($revenue->revenue,2,'.',',')}}</td>
                        </tr>
                        <tr>
                            <th>Sector :</th>
                            <td>{{$revenue->sector}}</td>
                        </tr>
                        <tr>
                            <th>Time On Client :</th>
                            <td>{{$revenue->timeOnClient ." Yrs"}}</td>
                        </tr>
                        <tr>
                            <th colspan="2">Audit Work Performed</th>
                        </tr>
                        @if($revenue->auditedWork)
                            @foreach($revenue->auditedWork as $work)
                                <tr>
                                    <td colspan="2">{{$work->auditWorkPerformed}}</td>
                                </tr>
                            @endforeach
                        @endif
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


