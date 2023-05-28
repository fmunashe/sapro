<?php

namespace App\Http\Livewire\Company;

use App\Models\Company;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class CompanyIndex extends LivewireDatatable
{
    public $hideable = "select";
    public $exportable = true;

    public function builder()
    {
        return Company::query();
    }

    public function columns()
    {
        return [
            Column::name('id')
                ->searchable()
                ->filterable()
                ->label(trans('ID')),

            Column::name('company')
                ->searchable()
                ->filterable()
                ->label(trans('Company')),

            Column::callback(['id'], function ($id) {
                $company = Company::query()->where('id', '=', $id)->first();
                return view('companies.company_action_buttons',
                    ['company' => $company]);
            })
                ->unsortable()
                ->excludeFromExport(),
        ];
    }
}
