<?php

namespace App\Http\Livewire\FirstTimeAuditClients;

use App\Enums\UserTypeEnum;
use App\Models\FirstTimeAuditClient;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class FirstTimeAuditClientsTable extends LivewireDatatable
{
    public $hideable = "select";
    public $exportable = true;

    public function builder()
    {
        if (auth()->user()->type == UserTypeEnum::USER) {
            return FirstTimeAuditClient::query()
                ->with('user')
                ->where('users.saproId', '=', auth()->user()->saproId)
                ->leftJoin('users', 'users.saproId', '=', 'first_time_audit_clients.saproId');
        }
        return FirstTimeAuditClient::query()->with('user')
            ->leftJoin('users', 'users.saproId', '=', 'first_time_audit_clients.saproId');

    }

    public function columns()
    {
        return [
            Column::name('first_time_audit_clients.saproId')
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

            Column::name('firstTimeAuditClient')
                ->searchable()
                ->filterable()
                ->label(trans('Client')),

            Column::name('sector')
                ->searchable()
                ->filterable()
                ->label(trans('Sector')),

            BooleanColumn::name('approved')
                ->searchable()
                ->filterable()
                ->label(trans('Approved')),

            Column::name('approvedBy')
                ->searchable()
                ->filterable()
                ->label(trans('Approved By')),

            Column::callback(['firstTimeAuditClientId'], function ($id) {
                $auditClient = FirstTimeAuditClient::query()->where('firstTimeAuditClientId', '=', $id)->first();
                return view('firstTimeAuditClients.audit_clients_action_buttons',
                    ['auditClient' => $auditClient]);
            })
                ->unsortable()
                ->excludeFromExport(),
        ];
    }
}
