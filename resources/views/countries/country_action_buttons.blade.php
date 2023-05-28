<div class="pull-right">
    <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#show_country_modal_{{$country->id}}">
        <i class="uil-eye"></i>&nbsp;Show
    </button>
    @include('countries.show_country_modal')

    <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#edit_country_modal_{{$country->id}}">
        <i class="uil-pen"></i>&nbsp;Edit
    </button>
    @include('countries.edit_country_modal')

    <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#delete_country_modal_{{$country->id}}">
        <i class="uil-trash"></i>&nbsp;Delete
    </button>
    @include('countries.delete_country_modal')
</div>
