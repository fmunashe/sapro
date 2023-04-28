<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:43
 */
?>

<div id="show_certifications_modal_{{$certification->certificationsAndEducationId}}" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-info">
                <h4 class="modal-title" id="danger-header-modalLabel">Certifications And Education Details</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <table class="table table-sm table-striped">
                    <tr>
                        <th>Sapro ID :</th>
                        <td>{{$certification->saproId}}</td>
                    </tr>
                    <tr>
                        <th>Institute :</th>
                        <td>{{$certification->institute}}</td>
                    </tr>
                    <tr>
                        <th>Year :</th>
                        <td>{{$certification->year}}</td>
                    </tr>
                    <tr>
                        <th>Certifications And Education :</th>
                        <td>{{$certification->certificationsAndEducation}}</td>
                    </tr>
                    <tr>
                        <th>Approved :</th>
                        <td>{{$certification->approved?"Yes":"No"}}</td>
                    </tr>
                    <tr>
                        <th>Approved By :</th>
                        <td>{{$certification->approvedBy}}</td>
                    </tr>
                    @if(!empty($certification->certificateName))
                    <tr>
                        <th>View Certificate :</th>
                        <td>
                            <form action="{{route('certifications.approveCertificate',[$certification->certificationsAndEducationId])}}" method="post">
                                @csrf
                                @method('patch')
                                <a href="{{route('certifications.show',[$certification->certificationsAndEducationId])}}" target="_blank" class="btn btn-outline-info btn-block">View Certificate</a>
                                @if(auth()->user()->type == \App\Enums\UserTypeEnum::SUPER_ADMIN || auth()->user()->type == \App\Enums\UserTypeEnum::ADMIN)
                                <button type="submit" class="btn btn-outline-success">Approve Certificate</button>
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


