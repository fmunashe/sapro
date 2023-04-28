<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSchedulingRequest;
use App\Http\Requests\UpdateSchedulingRequest;
use App\Models\ProfessionalExperience;
use App\Models\Scheduling;
use RealRashid\SweetAlert\Facades\Alert;

class SchedulingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Scheduling::class);
        $scheduling = Scheduling::query()->paginate(10);
        return view('scheduling.index', compact('scheduling'));
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
    public function store(StoreSchedulingRequest $request)
    {
        $this->authorize('create', Scheduling::class);
        $data = $request->all();
        Scheduling::query()->create($data);

        Alert::success('', 'Scheduling Successfully Saved');
        return to_route('scheduling.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Scheduling $scheduling)
    {
        return $scheduling;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Scheduling $scheduling)
    {
        return $scheduling;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSchedulingRequest $request, Scheduling $scheduling)
    {
        $this->authorize('update', $scheduling);
        $data = $request->all();
        $scheduling->update([
            'saproId' => $data['saproId'],
            'year' => $data['year'],
            'bsHostFirmCode' => $data['bsHostFirmCode'],
            'bsStartDate' => $data['bsStartDate'],
            'bsEndDate' => $data['bsEndDate'],
            'postBsHostFirmCode' => $data['postBsHostFirmCode'],
            'postBsStartDate' => $data['postBsStartDate'],
            'postBsEndDate' => $data['postBsEndDate'],
        ]);

        Alert::success('', 'Scheduling Successfully Updated');
        return to_route('scheduling.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Scheduling $scheduling)
    {
        $this->authorize('delete', $scheduling);
        $scheduling->delete();
        Alert::success('', 'Scheduling Successfully Removed');
        return to_route('scheduling.index');
    }
}
