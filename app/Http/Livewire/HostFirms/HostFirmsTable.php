<?php

namespace App\Http\Livewire\HostFirms;

use App\Enums\UserTypeEnum;
use App\Models\HostFirm;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class HostFirmsTable extends LivewireDatatable
{
    public $hideable = "select";
    public $exportable = true;

    public function builder()
    {
        if (auth()->user()->type == UserTypeEnum::USER) {
            return HostFirm::query()
                ->with('user')
                ->where('users.saproId', '=', auth()->user()->saproId)
                ->leftJoin('users', 'users.saproId', '=', 'host_firms.saproId');
        }
        return HostFirm::query()->with('user')
            ->leftJoin('users', 'users.saproId', '=', 'host_firms.saproId');

    }

    public function columns()
    {
        return [
            Column::name('host_firms.saproId')
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

            Column::name('hostFirmCode')
                ->searchable()
                ->filterable()
                ->label(trans('Host Firm Code')),

            Column::name('hostFirmName')
                ->searchable()
                ->filterable()
                ->label(trans('Host Firm Name')),

            BooleanColumn::name('approved')
                ->searchable()
                ->filterable()
                ->label(trans('Approved')),

            Column::name('approvedBy')
                ->searchable()
                ->filterable()
                ->label(trans('Approved By')),

            Column::callback(['hostFirmId'], function ($id) {
                $hostFirm = HostFirm::query()->where('hostFirmId', '=', $id)->first();
                return view('hostFirms.host_firm_action_buttons',
                    ['hostFirm' => $hostFirm]);
            })
                ->unsortable()
                ->excludeFromExport(),
        ];
    }
}
