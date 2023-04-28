<div class="pull-right">
    <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#show_scheduling_modal_{{$schedule->schedulingId}}">
        <i class="uil-eye"></i>&nbsp;Show
    </button>
    @include('scheduling.show_scheduling_modal')

    <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#edit_scheduling_modal_{{$schedule->schedulingId}}">
        <i class="uil-pen"></i>&nbsp;Edit
    </button>
    @include('scheduling.edit_scheduling_modal')


    <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#delete_scheduling_modal_{{$schedule->schedulingId}}">
        <i class="uil-trash"></i>&nbsp;Delete
    </button>
    @include('scheduling.delete_scheduling_modal')
</div>
