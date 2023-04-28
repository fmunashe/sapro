<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:43
 */
?>

<div id="show_additional_experience_modal_{{$experience->additionalExperienceId}}" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-info">
                <h4 class="modal-title" id="danger-header-modalLabel">Additional Experience Details</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <table class="table table-sm table-striped">
                    <tr>
                        <th>Sapro ID :</th>
                        <td>{{$experience->saproId}}</td>
                    </tr>
                    <tr>
                        <th>Name :</th>
                        <td>{{$experience->user->name??""}}</td>
                    </tr> <tr>
                        <th>Surname :</th>
                        <td>{{$experience->user->surname??""}}</td>
                    </tr>
                    <tr>
                        <th>Additional Experience :</th>
                        <td>{{$experience->additionalExperience}}</td>
                    </tr>
                    <tr>
                        <th>Approved :</th>
                        <td>{{$experience->approved?"Yes":"No"}}</td>
                    </tr>
                    <tr>
                        <th>Approved By :</th>
                        <td>{{$experience->approvedBy}}</td>
                    </tr>
                    @if(!$experience->approved)
                        <tr>
                            <th></th>
                            <td>
                                <form action="{{route('additional-experience.approveAdditionalExperience',[$experience->additionalExperienceId])}}" method="post">
                                    @csrf
                                    @method('patch')
                                    @if(auth()->user()->type == \App\Enums\UserTypeEnum::SUPER_ADMIN || auth()->user()->type == \App\Enums\UserTypeEnum::ADMIN)
                                        <button type="submit" class="btn btn-outline-success float-end">Approve Additional Experience</button>
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


