<span class="pull-right">
    <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#show_client_revenue_modal_{{$revenue->clientRevenueId}}">
        <i class="uil-eye"></i>&nbsp;Show
    </button>
    @include('clientRevenue.show_client_revenue_modal')

    <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#edit_client_revenue_modal_{{$revenue->clientRevenueId}}">
        <i class="uil-pen"></i>&nbsp;Edit
    </button>
    @include('clientRevenue.edit_client_revenue_modal')


    <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#delete_client_revenue_modal_{{$revenue->clientRevenueId}}">
        <i class="uil-trash"></i>&nbsp;Delete
    </button>
    @include('clientRevenue.delete_client_revenue_modal')
</span>
