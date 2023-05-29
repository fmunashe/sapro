<?php

namespace App\Http\Livewire\HostFirmConfig;

use App\Models\Country;
use App\Models\HostFirmConfig;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class HostFirmConfigIndex extends LivewireDatatable
{
    public $hideable = "select";
    public $exportable = true;

    public function builder()
    {

        return HostFirmConfig::query()->with('country')
            ->leftJoin('countries', 'countries.id', '=', 'host_firm_configs.country_id');

    }

    public function columns(): array
    {
        return [
            Column::name('host_firm_configs.id')
                ->searchable()
                ->filterable()
                ->label(trans('ID')),

            Column::name('countries.country')
                ->searchable()
                ->filterable($this->countries)
                ->label(trans('Country')),

            Column::name('hostFirm')
                ->searchable()
                ->filterable()
                ->label(trans('Host Firm')),

            Column::name('code')
                ->searchable()
                ->filterable()
                ->label(trans('Host Firm Code')),

            Column::callback(['host_firm_configs.id'], function ($id) {
                $config = HostFirmConfig::query()->where('id', '=', $id)->first();
                $countries = Country::all();
                return view('hostFirmConfigs.config_action_buttons', compact('config', 'countries'));
            })
                ->unsortable()
                ->excludeFromExport(),
        ];
    }

    public function getCountriesProperty(): \Illuminate\Support\Collection
    {
        return Country::query()->pluck('country');
    }
}
