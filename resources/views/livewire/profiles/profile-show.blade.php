<tr>
    <td>{{$profile->id}}</td>
    <td>{{$profile->auditor->saproId??""}}</td>
    <td>{{$profile->auditor->name??""}}</td>
    <td>{{$profile->auditor->surname??""}}</td>
    <td>{{$profile->status}}</td>
    <td> @if($profile->status==\App\Enums\RequestStatus::APPROVED)
        <i class="uil-check alert-success"></i>
    @elseif($profile->status ==\App\Enums\RequestStatus::REJECTED)
        <i class="uil-times alert-danger"></i>
    @else <i class="uil-comment-question alert-info"></i>
    @endif </td>
    <td>
        @if(auth()->user()->id ==$clientRequest->client_id)
        <button @if($profile->status==\App\Enums\RequestStatus::REJECTED) disabled @endif class="btn btn-outline-danger btn-sm float-end m-1" wire:click.prevent="rejectProfile">Reject</button>
        <button @if($profile->status==\App\Enums\RequestStatus::APPROVED) disabled @endif class="btn btn-outline-success btn-sm float-end m-1" wire:click.prevent="approveProfile">Approve</button>
        @endif
            <a href="{{route('users.show',[$profile->auditor->id])}}}" target="_blank" class="btn btn-outline-primary btn-sm float-end m-1">View Profile</a>
{{--        <button class="btn btn-outline-primary btn-sm float-end m-1" data-bs-toggle="modal" data-bs-target="#show_user_profile_modal_{{$profile->id}}">View Profile</button>--}}
{{--        @include('profile.show_user_profile_modal')--}}
    </td>
</tr>
