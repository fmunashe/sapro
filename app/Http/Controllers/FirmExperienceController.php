<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFirmExperienceRequest;
use App\Http\Requests\UpdateFirmExperienceRequest;
use App\Models\FirmExperience;
use RealRashid\SweetAlert\Facades\Alert;

class FirmExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', FirmExperience::class);
        $firmExperiences = FirmExperience::query()->paginate(10);
        return view('firmExperience.index', compact('firmExperiences'));
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
    public function store(StoreFirmExperienceRequest $request)
    {
        $this->authorize('create', FirmExperience::class);
        $data = $request->all();
        FirmExperience::query()->create($data);

        toast('Firm Experience Successfully Saved', 'success');
        return to_route('firm-experience.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(FirmExperience $firmExperience)
    {
        return $firmExperience;
    }

    public function approveFirmExperience(FirmExperience $firmExperience)
    {
        $this->authorize('approveFirmExperience', $firmExperience);
        if ($firmExperience->approved) {
            Alert::error('', 'This firm experience entry was previously approved by ' . $firmExperience->approvedBy)->autoClose(false);
            return to_route('firm-experience.index');
        }
        $firmExperience->approved = true;
        $firmExperience->approvedBy = auth()->user()->email;
        $firmExperience->save();
        toast('Firm Experience Successfully Approved', 'success');
        return to_route('firm-experience.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FirmExperience $firmExperience)
    {
        return $firmExperience;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFirmExperienceRequest $request, FirmExperience $firmExperience)
    {
        $this->authorize('update', $firmExperience);
        $data = $request->all();
        $firmExperience->update([
            'saproId' => $data['saproId'],
            'company' => $data['company'],
            'country' => $data['country'],
            'level' => $data['level'],
            'startPeriod' => $data['startPeriod'],
            'endPeriod' => $data['endPeriod'],
        ]);

        toast('Firm Experience Successfully Updated', 'success');
        return to_route('firm-experience.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FirmExperience $firmExperience)
    {
        $this->authorize('delete', $firmExperience);
        $firmExperience->delete();
        toast('Firm Experience Successfully Removed', 'success');
        return to_route('firm-experience.index');
    }
}
