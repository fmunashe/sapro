<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFactExternalClientRequest;
use App\Http\Requests\UpdateFactExternalClientRequest;
use App\Models\ContractStatus;
use App\Models\FactExternalClient;
use App\Models\SeniorityLevel;
use App\Models\Specialisation;
use RealRashid\SweetAlert\Facades\Alert;

class FactExternalClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $externalClients = FactExternalClient::query()->with(['seniorityLevels','contractStatus','specialisation'])->paginate(10);
        $seniorityLevels = SeniorityLevel::all();
        $specialisations = Specialisation::all();
        $contractStatus = ContractStatus::all();
        return view('factExternalClients.index', compact('externalClients', 'seniorityLevels', 'specialisations', 'contractStatus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFactExternalClientRequest $request)
    {
        $data = $request->all();

        FactExternalClient::query()->create($data);
        toast('External Client Successfully Created', 'success');
        return to_route('fact-external-clients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(FactExternalClient $factExternalClient)
    {
        return $factExternalClient;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FactExternalClient $factExternalClient)
    {
        return $factExternalClient;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFactExternalClientRequest $request, FactExternalClient $factExternalClient)
    {
        $data = $request->all();
        $factExternalClient->update([
            'seniorityLevelId' => $data['seniorityLevelId'],
            'specialisationId' => $data['specialisationId'],
            'contractStatusId' => $data['contractStatusId'],
            'saproId' => $data['saproId'],
            'name' => $data['name'],
            'surname' => $data['surname'],
            'personalEmail' => $data['personalEmail'],
            'saproEmail' => $data['saproEmail'],
            'saproContractStartDate' => $data['saproContractStartDate'],
            'saproContractEndDate' => $data['saproContractEndDate'],
            'location' => $data['location'],
            'nationality' => $data['nationality'],
            'articleFirm' => $data['articleFirm'],
            'highestQualification' => $data['highestQualification'],
            'travel' => $data['travel'],
        ]);

        toast('External Client Successfully Updated', 'success');
        return to_route('fact-external-clients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FactExternalClient $factExternalClient)
    {
        $factExternalClient->delete();
        toast('External Client Successfully Removed', 'success');
        return to_route('fact-external-clients.index');
    }
}
