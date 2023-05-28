<div class="pull-right">
    <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#show_city_modal_{{$city->id}}">
        <i class="uil-eye"></i>&nbsp;Show
    </button>
    @include('cities.show_city_modal')

    <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#edit_city_modal_{{$city->id}}">
        <i class="uil-pen"></i>&nbsp;Edit
    </button>
    @include('cities.edit_city_modal')

    <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#delete_city_modal_{{$city->id}}">
        <i class="uil-trash"></i>&nbsp;Delete
    </button>
    @include('cities.delete_city_modal')
</div>
