<table class="table table-sm table-striped" style="text-align: left">
    <tr>
        <th class="text-nowrap">Description :</th>
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

<table class="table" style="text-align: left">
    <thead>
    <tr>
        <th colspan="8">Attached Profiles</th>
    </tr>
    <tr>
        <td>#</td>
        <td>Sapro ID</td>
        <td>Name</td>
        <td>Surname</td>
        <td>Status</td>
        <td></td>
    </tr>
    </thead>
    <tbody>
    @foreach($clientRequest->profiles as $profile)
        <livewire:profiles.profile-show :clientRequest="$clientRequest" :profile="$profile" :wire:key="$profile->id"/>
    @endforeach
    </tbody>
</table>
