<?php

namespace App\Http\Livewire\Certifications;

use App\Enums\UserTypeEnum;
use App\Models\CertificationsAndEducation;
use App\Models\QualificationCategory;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class CertificationTable extends LivewireDatatable
{
    public $hideable = "select";
    public $perPage = 5;
    public $exportable = true;

    public function builder()
    {
        if (auth()->user()->type == UserTypeEnum::USER) {
            return CertificationsAndEducation::query()->with(['qualificationCategory', 'user'])
                ->where('users.saproId', '=', auth()->user()->saproId)
                ->join('qualification_categories', 'qualification_categories.id', '=', 'certifications_and_education.qualification_category_id')
                ->leftJoin('users', 'users.saproId', '=', 'certifications_and_education.saproId');
        }
        return CertificationsAndEducation::query()->with(['qualificationCategory', 'user'])
            ->join('qualification_categories', 'qualification_categories.id', '=', 'certifications_and_education.qualification_category_id')
            ->leftJoin('users', 'users.saproId', '=', 'certifications_and_education.saproId');
    }

    public function columns()
    {
        return [
            Column::name('saproId')
                ->searchable()
                ->filterable()
                ->label('Sapro ID'),
            Column::name('user.name')
                ->searchable()
                ->filterable()
                ->label('Name'),
            Column::name('user.surname')
                ->searchable()
                ->filterable()
                ->label('Surname'),
            Column::name('user.email')
                ->searchable()
                ->filterable()
                ->label('Email'),

            Column::name('institute')
                ->searchable()
                ->filterable()
                ->label('Institute'),
            Column::name('qualification_categories.qualification')
                ->searchable()
                ->filterable()
                ->label('Certification'),

            DateColumn::name('year')
                ->searchable()
                ->filterable()
                ->label('Year'),

            BooleanColumn::name('approved')
                ->searchable()
                ->filterable()
                ->label('Approved'),
            Column::name('approvedBy')
                ->searchable()
                ->filterable()
                ->label('Approved By'),
            Column::callback(['certificationsAndEducationId'], function ($id) {
                $certification = CertificationsAndEducation::query()->where('certificationsAndEducationId', '=', $id)->first();
                $qualifications = QualificationCategory::all();
                return view('certifications.certificate_action_buttons', compact('qualifications', 'certification'));
            })
                ->unsortable()
                ->excludeFromExport(),
        ];
    }
}
