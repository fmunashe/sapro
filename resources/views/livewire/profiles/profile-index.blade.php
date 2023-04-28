<tr>
    <td>{{$profile->id}}</td>
    <td>{{$profile->auditor->saproId??""}}</td>
    <td>{{$profile->auditor->name??""}}</td>
    <td>{{$profile->auditor->surname??""}}</td>
    <td>{{$profile->status}}</td>
    <td>@if($profile->status==\App\Enums\RequestStatus::APPROVED)<i class="uil-check alert-success"></i> @elseif($profile->status ==\App\Enums\RequestStatus::REJECTED)<i class="uil-times alert-danger"></i>@else <i class="uil-comment-question alert-info"></i> @endif </td>
    <td>
        @if($profile->status==\App\Enums\RequestStatus::IN_REVIEW)
            <button class="btn btn-outline-danger btn-sm float-end m-1" wire:click.prevent="removeProfile">Remove
            </button>
        @endif
    </td>
</tr>
