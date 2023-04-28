@if(!empty($value))
    <table class="table table-sm">
        @foreach(explode(',',$value) as $val)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$val}}</td>
            </tr>
        @endforeach
    </table>
@endif
