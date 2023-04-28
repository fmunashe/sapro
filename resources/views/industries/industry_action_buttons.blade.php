<div class="pull-right">
    <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#show_industry_modal_{{$industry->industryId}}">
        <i class="uil-eye"></i>&nbsp;Show
    </button>
    @include('industries.show_industry_modal')

    <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#edit_industry_modal_{{$industry->industryId}}">
        <i class="uil-pen"></i>&nbsp;Edit
    </button>
    @include('industries.edit_industry_modal')


    <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#delete_industry_modal_{{$industry->industryId}}">
        <i class="uil-trash"></i>&nbsp;Delete
    </button>
    @include('industries.delete_industry_modal')
</div>
