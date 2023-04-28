<?php

namespace App\Http\Livewire\Home;

use App\Enums\UserTypeEnum;
use App\Http\Traits\Analytics;
use App\Models\User;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Livewire\Component;

class HomeIndex extends Component
{
    use Analytics;

    public $totalClients;
    public $totalUsers;
    public $totalAdmins;
    public $showAnimation = true;
    public $showDataLabels = true;
    public $showLegend = true;

    public $colors = [
        '#665191',
        '#a05195',
        '#d45087',
        '#f95d6a',
        '#a05195',
        '#d45087',
        '#f95d6a',
        '#ff7c43',
        '#73b641',
        '#1a151a',
        '#003438',
        '#d3004d',
        '#003f5c',
        '#2f4b7c',
        '#ffa600',
        '#f6ad55',
        '#fc8181',
        '#90cdf4',
        '#66DA26',
        '#cbd5e0',
        '#003f5c',
        '#2f4b7c',
        '#665191',
        '#a05195',
        '#d45087',
        '#f95d6a',
        '#a05195',
        '#d45087',
        '#f95d6a',
        '#ff7c43',
        '#73b641',
        '#1a151a',
        '#003438',
        '#d3004d',
        '#003f5c',
        '#2f4b7c',
        '#665191',
        '#ffa600',
        '#f6ad55',
        '#fc8181',
        '#90cdf4',
        '#66DA26',
        '#cbd5e0',
        '#73b641',
        '#1a151a',
        '#003438',
        '#d3004d',
        '#ffa600',
        '#f6ad55',
        '#fc8181',
        '#90cdf4',
        '#66DA26',
        '#cbd5e0',
        '#003f5c',
        '#2f4b7c',
        '#665191',
        '#a05195',
        '#d45087',
        '#f95d6a',
        '#ff7c43',
        '#73b641',
        '#1a151a',
        '#003438',
        '#d3004d',
        '#003f5c',
        '#2f4b7c',
        '#665191',
        '#a05195',
        '#d45087',
        '#f95d6a',
        '#ff7c43'
    ];

    public function mount()
    {
        $this->totalClients = User::query()->where('type', '=', UserTypeEnum::CLIENT)->count();
        $this->totalUsers = User::query()->where('type', '=', UserTypeEnum::USER)->count();
        $this->totalAdmins = User::query()->where('type', '=', UserTypeEnum::ADMIN)->orWhere('type', '=', UserTypeEnum::SUPER_ADMIN)->count();
    }

    public function render()
    {
        $userTypes = $this->usersByType()
            ->reduce(
                function ($chart, $item, $key) {
                    return $chart->addSlice($item->userType, $item->Total, $this->colors[$key]);
                },
                LivewireCharts::pieChartModel()
                    ->setAnimated($this->showAnimation)
                    ->setOpacity(1)
                    ->setTitle('Total Users By Role')
                    ->withOnSliceClickEvent('onSliceClick')
                    ->setLegendVisibility($this->showLegend)
                    ->setDataLabelsEnabled($this->showDataLabels)
                    ->withGrid()
            );

        $requestStatus = $this->requestsByStatus()
            ->reduce(
                function ($chart, $item, $key) {
                    return $chart->addColumn($item->requestStatus, $item->Total, $this->colors[$key]);
                },
                LivewireCharts::columnChartModel()
                    ->setAnimated($this->showAnimation)
                    ->setOpacity(1)
                    ->setTitle('Total Client Requests By Status')
                    ->withOnColumnClickEventName('onColumnClick')
                    ->setLegendVisibility($this->showLegend)
                    ->setDataLabelsEnabled($this->showDataLabels)
                    ->withGrid()
            );

        $usersBySeniorityLevel = $this->usersBySeniorityLevel()
            ->reduce(
                function ($chart, $item, $key) {
                    return $chart->addColumn($item->level, $item->Total, $this->colors[$key]);
                },
                LivewireCharts::columnChartModel()
                    ->setAnimated($this->showAnimation)
                    ->setOpacity(1)
                    ->setTitle('Auditors By Seniority Level')
                    ->withOnColumnClickEventName('onColumnClick')
                    ->setLegendVisibility($this->showLegend)
                    ->setDataLabelsEnabled($this->showDataLabels)
                    ->withGrid()
            );

        $specialisation = $this->usersBySpecialisation()
            ->reduce(
                function ($chart, $item, $key) {
                    return $chart->addColumn($item->specialisation, $item->Total, $this->colors[$key]);
                },
                LivewireCharts::columnChartModel()
                    ->setAnimated($this->showAnimation)
                    ->setOpacity(1)
                    ->setTitle('Auditors By Specialisation')
                    ->withOnColumnClickEventName('onColumnClick')
                    ->setLegendVisibility($this->showLegend)
                    ->setDataLabelsEnabled($this->showDataLabels)
                    ->withGrid()
            );

        $contractStatus = $this->usersByContractStatus()
            ->reduce(
                function ($chart, $item, $key) {
                    return $chart->addColumn($item->contractStatus, $item->Total, $this->colors[$key]);
                },
                LivewireCharts::columnChartModel()
                    ->setAnimated($this->showAnimation)
                    ->setOpacity(1)
                    ->setTitle('Auditors By Contract Status')
                    ->withOnColumnClickEventName('onColumnClick')
                    ->setLegendVisibility($this->showLegend)
                    ->setDataLabelsEnabled($this->showDataLabels)
                    ->withGrid()
            );
        return view('livewire.home.home-index')->with([
            'userTypes' => $userTypes,
            'requestStatus' => $requestStatus,
            'usersBySeniorityLevel' => $usersBySeniorityLevel,
            'specialisation' => $specialisation,
            'contractStatus' => $contractStatus,
        ]);
    }
}
