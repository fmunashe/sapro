<div class="pull-right">
    <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#show_company_modal_{{$company->id}}">
        <i class="uil-eye"></i>&nbsp;Show
    </button>
    @include('companies.show_company_modal')

    <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#edit_company_modal_{{$company->id}}">
        <i class="uil-pen"></i>&nbsp;Edit
    </button>
    @include('companies.edit_company_modal')

    <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#delete_company_modal_{{$company->id}}">
        <i class="uil-trash"></i>&nbsp;Delete
    </button>
    @include('companies.delete_company_modal')
</div>
