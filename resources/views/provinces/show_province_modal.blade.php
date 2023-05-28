<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:43
 */
?>

<div id="show_province_modal_{{$province->id}}" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-info">
                <h4 class="modal-title" id="danger-header-modalLabel">Province Details</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <table class="table table-sm table-striped">
                    <tr>
                        <th>Country :</th>
                        <td>{{$province->country->country??""}}</td>
                    </tr>
                    <tr>
                        <th>Province :</th>
                        <td>{{$province->province}}</td>
                    </tr>
                </table>

                @if(count($province->cities))
                    <table class="table table-sm table-striped">
                        <thead>
                        <tr>
                            <th colspan="2">Cities</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>City</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($province->cities as $city)
                            <tr>
                                <td>{{$city->id}}</td>
                                <td>{{$city->city}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>


