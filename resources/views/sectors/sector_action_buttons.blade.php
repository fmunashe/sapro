<div class="pull-right">
    <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#show_sector_modal_{{$sector->sectorId}}">
        <i class="uil-eye"></i>&nbsp;Show
    </button>
    @include('sectors.show_sector_modal')

    <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#edit_sector_modal_{{$sector->sectorId}}">
        <i class="uil-pen"></i>&nbsp;Edit
    </button>
    @include('sectors.edit_sector_modal')


    <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#delete_sector_modal_{{$sector->sectorId}}">
        <i class="uil-trash"></i>&nbsp;Delete
    </button>
    @include('sectors.delete_sector_modal')
</div>
