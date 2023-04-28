<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSoftwareExperienceRequest;
use App\Http\Requests\UpdateSoftwareExperienceRequest;
use App\Models\SoftwareExperience;
use RealRashid\SweetAlert\Facades\Alert;

class SoftwareExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', SoftwareExperience::class);
        $softwareExperience = SoftwareExperience::query()->paginate(10);
        return view('softwareExperience.index', compact('softwareExperience'));
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
    public function store(StoreSoftwareExperienceRequest $request)
    {
        $this->authorize('create', SoftwareExperience::class);
        $data = $request->all();
        SoftwareExperience::query()->create($data);

        Alert::success('', 'Software Experience Successfully Saved');
        return to_route('software-experience.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SoftwareExperience $softwareExperience)
    {
        return $softwareExperience;
    }

    public function approveSoftwareExperience(SoftwareExperience $softwareExperience)
    {
        $this->authorize('approveSoftwareExperience', $softwareExperience);
        if ($softwareExperience->approved) {
            Alert::error('', 'This software experience entry was previously approved by ' . $softwareExperience->approvedBy)->autoClose(false);
            return to_route('software-experience.index');
        }
        $softwareExperience->approved = true;
        $softwareExperience->approvedBy = auth()->user()->email;
        $softwareExperience->save();
        toast('Software Experience Successfully Approved', 'success');
        return to_route('software-experience.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SoftwareExperience $softwareExperience)
    {
        return $softwareExperience;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSoftwareExperienceRequest $request, SoftwareExperience $softwareExperience)
    {
        $this->authorize('update', $softwareExperience);
        $data = $request->all();
        $softwareExperience->update([
            'saproId' => $data['saproId'],
            'level' => $data['level'],
            'softwareExperience' => $data['softwareExperience']
        ]);

        Alert::success('', 'Software Experience Successfully Updated');
        return to_route('software-experience.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SoftwareExperience $softwareExperience)
    {
        $this->authorize('delete', $softwareExperience);
        $softwareExperience->delete();
        Alert::success('', 'Software Experience Successfully Removed');
        return to_route('software-experience.index');
    }
}
