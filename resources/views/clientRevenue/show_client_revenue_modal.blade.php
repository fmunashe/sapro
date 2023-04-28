<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:43
 */
?>

<div id="show_client_revenue_modal_{{$revenue->clientRevenueId}}" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-info">
                <h4 class="modal-title" id="danger-header-modalLabel">Client Revenue Details</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <table class="table table-sm table-striped">
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
                        <td>{{$revenue->timeOnClient}}</td>
                    </tr>
                    <tr>
                        <th colspan="2">Audit Work Performed</th>
                    </tr>
                    @if($revenue->auditedWork)
                        @foreach($revenue->auditedWork as $work)
                            <tr>
                                <td colspan="2">
                                    {{$work->auditWorkPerformed}}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    <tr>
                        <th>Approved</th>
                        <td>{{$revenue->approved?"Yes":"No"}}</td>
                    </tr>
                    <tr>
                        <th>Approved By</th>
                        <td>{{$revenue->approvedBy}}</td>
                    </tr>
                    @if(!$revenue->approved)
                        <tr>
                            <th></th>
                            <td>
                                <form action="{{route('client-revenue.approveClientRevenue',[$revenue->clientRevenueId])}}" method="post">
                                    @csrf
                                    @method('patch')
                                    @if(auth()->user()->type == \App\Enums\UserTypeEnum::SUPER_ADMIN || auth()->user()->type == \App\Enums\UserTypeEnum::ADMIN)
                                        <button type="submit" class="btn btn-outline-success float-end">Approve Client Revenue</button>
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


