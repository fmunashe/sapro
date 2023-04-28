<table class="table table-sm">
<tr>
    <th>Achievement</th>
    <th>Year</th>
    <th>Approved</th>
    <th>Approved BY</th>
</tr>
    @foreach($achievements as $achievement)
        @if(!empty($achievement))
        <tr>
            <td>{{$achievement->achievement}}</td>
            <td>{{$achievement->year}}</td>
            <td>{{$achievement->approved?"Yes":"No"}}</td>
            <td>{{$achievement->approvedBy}}</td>
        </tr>
        @endif
    @endforeach
</table>
