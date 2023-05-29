<div class="pull-right">
    <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#show_sector_category_modal_{{$sectorCategory->id}}">
        <i class="uil-eye"></i>&nbsp;Show
    </button>
    @include('sectorCategories.show_sector_category_modal')

    <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#edit_sector_category_modal_{{$sectorCategory->id}}">
        <i class="uil-pen"></i>&nbsp;Edit
    </button>
    @include('sectorCategories.edit_sector_category_modal')

    <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#delete_sector_category_modal_{{$sectorCategory->id}}">
        <i class="uil-trash"></i>&nbsp;Delete
    </button>
    @include('sectorCategories.delete_sector_category_modal')
</div>
