<div class="pull-right">
    <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#show_achievement_modal_{{$achievement->achievementId}}">
        <i class="uil-eye"></i>&nbsp;Show
    </button>
    @include('achievements.show_achievement_modal')

    <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#edit_achievement_modal_{{$achievement->achievementId}}">
        <i class="uil-pen"></i>&nbsp;Edit
    </button>
    @include('achievements.edit_achievement_modal')

    <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
            data-bs-target="#delete_achievement_modal_{{$achievement->achievementId}}">
        <i class="uil-trash"></i>&nbsp;Delete
    </button>
    @include('achievements.delete_achievement_modal')
</div>
