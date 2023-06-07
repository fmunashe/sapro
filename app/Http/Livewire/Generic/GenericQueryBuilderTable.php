<?php

namespace App\Http\Livewire\Generic;

use App\Enums\UserAvailability;
use App\Enums\UserTypeEnum;
use App\Models\Achievement;
use App\Models\ContractStatus;
use App\Models\Country;
use App\Models\QualificationCategory;
use App\Models\SeniorityLevel;
use App\Models\SoftwareCategory;
use App\Models\Specialisation;
use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class GenericQueryBuilderTable extends LivewireDatatable
{
    public $hideable = "select";
    public $exportable = true;
    public $complex = true;
    public $seniorityLevels;
    public $specialisations;
    public $contractStatus;

    public function builder()
    {
        $this->seniorityLevels = SeniorityLevel::all();
        $this->specialisations = Specialisation::all();
        $this->contractStatus = ContractStatus::all();
        return User::query()->with(['specialisation', 'seniorityLevel', 'contractStatus', 'scheduling', 'certificationsAndEducation', 'achievements', 'seniorityLevel',
            'firmExperiences', 'professionalExperience', 'internationalExperiences', 'softwareExperiences', 'additionalExperiences',
            'hostFirms', 'firstTimeAuditClients', 'clientRevenues', 'industries', 'listedClients', 'sectors'])
            ->leftJoin('specialisations', 'specialisations.specialisationId', '=', 'users.specialisationId')
            ->leftJoin('seniority_levels', 'seniority_levels.seniorityLevelId', '=', 'users.seniorityLevelId')
            ->leftJoin('contract_statuses', 'contract_statuses.contractStatusId', '=', 'users.contractStatusId')
            ->leftJoin('certifications_and_education', 'users.saproId', '=', 'certifications_and_education.saproId')
            ->leftJoin('qualification_categories', 'qualification_categories.id', '=', 'certifications_and_education.qualification_category_id')
            ->leftJoin('software_experiences', 'software_experiences.saproId', '=', 'users.saproId')
            ->leftJoin('software_categories', 'software_categories.id', '=', 'software_experiences.software_category_id');
//            ->leftJoin('achievements','achievements.saproId','=','users.saproId');
    }

    public function columns()
    {
        ini_set('memory_limit', '-1');
        return [
            Column::name('saproId')
                ->searchable()
                ->filterable()
                ->label(trans('Sapro ID')),
            Column::name('name')
                ->filterable()
                ->label(trans('Name')),
            Column::name('surname')
                ->filterable()
                ->label(trans('Surname')),
            Column::name('email')
                ->filterable()
                ->label(trans('Email')),

            Column::name('type')
                ->filterable($this->roles)
                ->label(trans('Role')),

            Column::name('availabilityStatus')
                ->searchable()
                ->filterable($this->availabilityStatus)
                ->label(trans('Availability Status')),

            Column::name('seniorityLevel.seniorityLevelDescription')
                ->filterable($this->levels)
                ->label(trans('Seniority Level')),

            Column::name('contractStatus.contractStatusDescription')
                ->filterable($this->ContractStatuses)
                ->label(trans('Contract Status')),

            Column::name('specialisation.specialisationDescription')
                ->filterable($this->specialisation)
                ->label(trans('Specialisation')),

            Column::name('location')
                ->filterable()
                ->label(trans('Location')),

            Column::name('nationality')
                ->filterable($this->nationality)
                ->label(trans('Nationality')),

            Column::name('highestQualification')
                ->filterable($this->qualification)
                ->label(trans('Highest Qualification')),

            Column::name('articleFirm')
                ->filterable()
                ->label(trans('Article Firm')),

            NumberColumn::name('yearsOfAudit')
                ->searchable()
                ->filterable($this->yearsOfAudit)
                ->label(trans('Years Of Audit Experience')),

            Column::name('travel')
                ->filterable(["Yes", "No"])
                ->label(trans('Travel')),

            Column::name('achievements.achievement')
                ->filterable()
                ->view('achievements.display')
                ->label(trans('Achievements')),
            Column::name('qualification_categories.qualification')
                ->filterable($this->certifications)
                ->view('certifications.display')
                ->label(trans('Certifications')),

            Column::name('software_categories.softwareCategory')
                ->filterable($this->softwares)
                ->label(trans('Software Experience')),


            Column::callback(['id'], function ($id) {
                $user = User::query()->where('id', '=', $id)->first();
                $nationality = Country::all();
                $qualifications = QualificationCategory::all();
                return view('users.user_action_buttons',
                    ['user' => $user, 'seniorityLevels' => $this->seniorityLevels, 'contractStatus' => $this->contractStatus,
                        'specialisations' => $this->specialisations, 'nationality' => $nationality, 'qualifications' => $qualifications]);
            })
                ->unsortable()
                ->excludeFromExport(),
        ];
    }


    public function getSpecialisationProperty()
    {
        return Specialisation::query()->orderBy('specialisationDescription')->pluck('specialisationDescription');
    }

    public function getLevelsProperty()
    {
        return SeniorityLevel::query()->orderBy('seniorityLevelDescription')->pluck('seniorityLevelDescription');
    }

    public function getRolesProperty()
    {
        return [UserTypeEnum::SUPER_ADMIN, UserTypeEnum::ADMIN, UserTypeEnum::USER, UserTypeEnum::CLIENT, UserTypeEnum::REPORTING];
    }

    public function getContractStatusesProperty()
    {
        return ContractStatus::query()->orderBy('contractStatusDescription')->pluck('contractStatusDescription');
    }

    public function getAvailabilityStatusProperty()
    {
        return [UserAvailability::AVAILABLE, UserAvailability::NOT_AVAILABLE, UserAvailability::PROFILE_UNDER_CONSIDERATION];
    }

    public function getQualificationProperty()
    {
        return QualificationCategory::query()->pluck('qualification');
    }

    public function getCertificationsProperty()
    {
        return QualificationCategory::query()->pluck('qualification');
    }

    public function getYearsOfAuditProperty()
    {
        $years = [];
        for ($i = 1; $i <= 20; $i++) {
            $years[] = $i;
        }
        return $years;
    }

    public function getNationalityProperty(){
        return Country::query()->pluck('nationality');
    }

    public function getSoftwaresProperty(){
        return SoftwareCategory::query()->pluck('softwareCategory');
    }
}
