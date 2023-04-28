<?php

namespace App\Http\Livewire\Users;

use App\Enums\UserAvailability;
use App\Enums\UserTypeEnum;
use App\Models\ContractStatus;
use App\Models\SeniorityLevel;
use App\Models\Specialisation;
use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class UserDatatables extends LivewireDatatable
{

    public $hideable = "select";
    public $seniorityLevels;
    public $specialisations;
    public $contractStatus;
    public $exportable =true;

    public function builder()
    {
        $this->seniorityLevels = SeniorityLevel::all();
        $this->specialisations = Specialisation::all();
        $this->contractStatus = ContractStatus::all();
        if (auth()->user()->type == UserTypeEnum::USER) {
            return User::query()
                ->where('id', '=', auth()->user()->id)
                ->with(['specialisation', 'seniorityLevel', 'contractStatus', 'scheduling', 'certificationsAndEducation', 'achievements', 'seniorityLevel',
                    'firmExperiences', 'professionalExperience', 'internationalExperiences', 'softwareExperiences', 'additionalExperiences',
                    'hostFirms', 'firstTimeAuditClients', 'clientRevenues', 'industries', 'listedClients', 'sectors'])
                ->leftJoin('specialisations', 'specialisations.specialisationId', '=', 'users.specialisationId')
                ->leftJoin('seniority_levels', 'seniority_levels.seniorityLevelId', '=', 'users.seniorityLevelId')
                ->leftJoin('contract_statuses', 'contract_statuses.contractStatusId', '=', 'users.contractStatusId');
//                ->join('certifications_and_education', 'certifications_and_education.saproId', '=', 'users.saproId');

        }
        return User::query()
            ->with(['specialisation', 'seniorityLevel', 'contractStatus', 'scheduling', 'certificationsAndEducation', 'achievements', 'seniorityLevel',
                'firmExperiences', 'professionalExperience', 'internationalExperiences', 'softwareExperiences', 'additionalExperiences',
                'hostFirms', 'firstTimeAuditClients', 'clientRevenues', 'industries', 'listedClients', 'sectors'])
            ->leftJoin('specialisations', 'specialisations.specialisationId', '=', 'users.specialisationId')
            ->leftJoin('seniority_levels', 'seniority_levels.seniorityLevelId', '=', 'users.seniorityLevelId')
            ->leftJoin('contract_statuses', 'contract_statuses.contractStatusId', '=', 'users.contractStatusId');
//            ->leftJoin('schedulings', 'schedulings.saproId', '=', 'users.saproId');
    }

    public function columns()
    {
        ini_set('memory_limit', '-1');
        return [
            NumberColumn::name('id')
                ->label(trans('ID')),

            Column::name('saproId')
                ->searchable()
                ->filterable()
                ->label(trans('Sapro ID')),

            Column::name('name')
                ->searchable()
                ->filterable()
                ->label(trans('Name')),

            Column::name('surname')
                ->searchable()
                ->filterable()
                ->label(trans('Surname')),
            Column::name('email')
                ->searchable()
                ->filterable()
                ->label(trans('Email')),

            Column::name('type')
                ->searchable()
                ->filterable($this->roles)
                ->label(trans('Role')),

            Column::name('availabilityStatus')
                ->searchable()
                ->filterable($this->availabilityStatus)
                ->label(trans('Availability Status')),

            Column::name('seniorityLevel.seniorityLevelDescription')
                ->searchable()
                ->filterable($this->levels)
                ->label(trans('Seniority Level')),

            Column::name('contractStatus.contractStatusDescription')
                ->searchable()
                ->filterable($this->contractStatus)
                ->label(trans('Contract Status')),

            Column::name('specialisation.specialisationDescription')
                ->searchable()
                ->filterable($this->specialisation)
                ->label(trans('Specialisation')),

            Column::name('location')
                ->searchable()
                ->filterable()
                ->label(trans('Location')),
            Column::name('nationality')
                ->searchable()
                ->filterable()
                ->label(trans('Nationality')),
            Column::name('highestQualification')
                ->searchable()
                ->filterable()
                ->label(trans('Highest Qualification')),

            Column::name('articleFirm')
                ->searchable()
                ->filterable()
                ->label(trans('Article Firm')),
            DateColumn::name('saproContractStartDate')
                ->searchable()
                ->filterable()
                ->label(trans('Sapro Contract Start Date')),

            DateColumn::name('saproContractEndDate')
                ->searchable()
                ->filterable()
                ->label(trans('Sapro Contract End Date')),

//            Column::name('certificationsAndEducation.certificationsAndEducation')
//                ->searchable()
//                ->filterable()
//                ->label(trans('Certificate')),

//            DateColumn::name('schedulings.year')
//                ->searchable()
//                ->filterable()
//                ->label(trans('Scheduling Year')),
//
//            DateColumn::name('schedulings.bsStartDate')
//                ->searchable()
//                ->filterable()
//                ->label(trans('BS Start Date')),
//
//            DateColumn::name('schedulings.bsEndDate')
//                ->searchable()
//                ->filterable()
//                ->label(trans('BS End Date')),
//
//            DateColumn::name('schedulings.postBsStartDate')
//                ->searchable()
//                ->filterable()
//                ->label(trans('Post BS Start Date')),
//
//            DateColumn::name('schedulings.postBsEndDate')
//                ->searchable()
//                ->filterable()
//                ->label(trans('Post BS End Date')),


//            Column::name('provinces.name')
//                ->searchable()
//                ->filterable($this->provinces)
//                ->label(trans('cruds.agent.fields.province')),

            Column::callback(['id'], function ($id) {
                $user = User::query()->where('id', '=', $id)->first();
                return view('users.user_action_buttons',
                    ['user' => $user, 'seniorityLevels' => $this->seniorityLevels, 'contractStatus' => $this->contractStatus,
                        'specialisations' => $this->specialisations]);
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
    public function getContractStatusProperty()
    {
        return ContractStatus::query()->orderBy('contractStatusDescription')->pluck('contractStatusDescription');
    }

    public function getRolesProperty()
    {
        return [UserTypeEnum::SUPER_ADMIN, UserTypeEnum::ADMIN, UserTypeEnum::USER, UserTypeEnum::CLIENT, UserTypeEnum::REPORTING];
    }

    public function getAvailabilityStatusProperty()
    {
        return [UserAvailability::AVAILABLE,UserAvailability::NOT_AVAILABLE,UserAvailability::PROFILE_UNDER_CONSIDERATION];
    }
}
