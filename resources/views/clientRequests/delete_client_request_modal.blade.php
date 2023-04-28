<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:42
 */
?>

<div id="delete_client_request_modal_{{$clientRequest->id}}" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{route('client-requests.destroy',[$clientRequest->id])}}" method="post" class="m-0">
                @csrf
                @method('delete')
                <div class="modal-header modal-colored-header bg-danger">
                    <h4 class="modal-title" id="danger-header-modalLabel">Confirm Delete</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <p class="text-center">Please confirm you want to permanently delete this record:</p>
                    <hr>
                    <table class="table table-sm" style="text-align: left">
                        <tr>
                            <th>Description :</th>
                            <td class="text-wrap">{{$clientRequest->description}}</td>
                        </tr>
                        <tr>
                            <th>Status :</th>
                            <td>{{$clientRequest->status}}</td>
                        </tr>
                        <tr>
                            <th>Client :</th>
                            <td>{{$clientRequest->client->name??""}}</td>
                        </tr>
                        <tr>
                            <th>Created By :</th>
                            <td>{{$clientRequest->createdBy->name??""}}</td>
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


