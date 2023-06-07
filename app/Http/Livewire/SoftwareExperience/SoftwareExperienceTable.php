<?php

namespace App\Http\Livewire\SoftwareExperience;

use App\Enums\SoftwareExperienceLevels;
use App\Enums\UserTypeEnum;
use App\Models\SoftwareCategory;
use App\Models\SoftwareExperience;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SoftwareExperienceTable extends LivewireDatatable
{
    public $hideable = "select";
    public $exportable = true;

    public function builder()
    {
        if (auth()->user()->type == UserTypeEnum::USER) {
            return SoftwareExperience::query()
                ->with(['softwareCategory', 'user'])
                ->where('users.saproId', '=', auth()->user()->saproId)
                ->join('software_categories', 'software_categories.id', '=', 'software_experiences.software_category_id')
                ->leftJoin('users', 'users.saproId', '=', 'software_experiences.saproId');
        }
        return SoftwareExperience::query()->with(['softwareCategory', 'user'])
            ->join('software_categories', 'software_categories.id', '=', 'software_experiences.software_category_id')
            ->leftJoin('users', 'users.saproId', '=', 'software_experiences.saproId');

    }

    public function columns()
    {
        return [
            Column::name('software_experiences.saproId')
                ->searchable()
                ->filterable()
                ->label(trans('Sapro ID')),

            Column::name('users.name')
                ->searchable()
                ->filterable()
                ->label(trans('Name')),

            Column::name('users.surname')
                ->searchable()
                ->filterable()
                ->label(trans('Surname')),

            Column::name('users.email')
                ->searchable()
                ->filterable()
                ->label(trans('Email')),

            Column::name('software_categories.softwareCategory')
                ->searchable()
                ->filterable($this->softwareCategories)
                ->label(trans('Software Experience')),

            Column::name('level')
                ->searchable()
                ->filterable($this->levels)
                ->label(trans('Level')),

            BooleanColumn::name('approved')
                ->searchable()
                ->filterable()
                ->label(trans('Approved')),

            Column::name('approvedBy')
                ->searchable()
                ->filterable()
                ->label(trans('Approved By')),

            Column::callback(['softwareExperienceId'], function ($id) {
                $experience = SoftwareExperience::query()->where('softwareExperienceId', '=', $id)->first();
                $softwareCategories = SoftwareCategory::all();
                return view('softwareExperience.software_experience_action_buttons',compact('experience','softwareCategories'));
            })
                ->unsortable()
                ->excludeFromExport(),
        ];
    }

    public function getSoftwareCategoriesProperty(): \Illuminate\Support\Collection
    {
        return SoftwareCategory::query()->pluck('softwareCategory');
    }

    public function getLevelsProperty(): array
    {
        return [
            'Beginner',
            'Intermediate',
            'Advanced',
            'Expert',
        ];

    }
}
