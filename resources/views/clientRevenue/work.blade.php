@if(!empty($value))
<table class="table table-sm table-striped table-bordered">
    @foreach(explode(',',$value) as $val)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$val}}</td>
        </tr>
    @endforeach
</table>
@endif
