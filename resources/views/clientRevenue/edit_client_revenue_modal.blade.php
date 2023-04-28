<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:42
 */
?>
<div id="edit_client_revenue_modal_{{$revenue->clientRevenueId}}" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
         <livewire:client-revenue.client-revenue-edit :revenue="$revenue" :wire:key="$revenue->clientRevenueId"/>
        </div>
    </div>
</div>
