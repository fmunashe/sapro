<?php

namespace App\Http\Livewire\City;

use App\Models\City;
use App\Models\Country;
use App\Models\Province;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class CityIndex extends LivewireDatatable
{
    public $hideable = "select";
    public $exportable = true;

    public function builder()
    {
        return City::query()->with('province')
            ->join('provinces','provinces.id','=','cities.province_id')
            ->join('countries','countries.id','=','provinces.country_id');
    }

    public function columns(): array
    {
        return [
            Column::name('id')
                ->searchable()
                ->filterable()
                ->label(trans('ID')),

            Column::name('countries.country')
                ->searchable()
                ->filterable($this->countries)
                ->label(trans('Country')),

            Column::name('provinces.province')
                ->searchable()
                ->filterable($this->provinces)
                ->label(trans('Province')),
            Column::name('city')
                ->searchable()
                ->filterable()
                ->label(trans('City')),

            Column::callback(['id'], function ($id) {
                $city = City::query()->where('id', '=', $id)->first();
                $provinces = Province::all();
                return view('cities.city_action_buttons',compact('city','provinces'));
            })
                ->unsortable()
                ->excludeFromExport(),
        ];
    }

    public function getProvincesProperty(): \Illuminate\Support\Collection
    {
        return Province::query()->pluck('province');
    }

    public function getCountriesProperty(): \Illuminate\Support\Collection
    {
        return Country::query()->pluck('country');
    }
}
