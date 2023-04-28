<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdditionalExperienceRequest;
use App\Http\Requests\UpdateAdditionalExperienceRequest;
use App\Models\AdditionalExperience;
use RealRashid\SweetAlert\Facades\Alert;

class AdditionalExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', AdditionalExperience::class);
        $additionalExperiences = AdditionalExperience::query()->paginate(10);
        return view('additionalExperience.index', compact('additionalExperiences'));
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
    public function store(StoreAdditionalExperienceRequest $request)
    {
        $this->authorize('create', AdditionalExperience::class);
        $data = $request->all();
        AdditionalExperience::query()->create($data);

        toast('Additional Experience Successfully Saved', 'success');
        return to_route('additional-experience.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(AdditionalExperience $additionalExperience)
    {
        return $additionalExperience;
    }

    public function approveAdditionalExperience(AdditionalExperience $additionalExperience)
    {
        $this->authorize('approveAdditionalExperience', $additionalExperience);
        if ($additionalExperience->approved) {
            Alert::error('', 'This additional experience was previously approved by ' . $additionalExperience->approvedBy);
            return to_route('additional-experience.index');
        }
        $additionalExperience->approved = true;
        $additionalExperience->approvedBy = auth()->user()->email;
        $additionalExperience->save();
        toast('Additional Experience Successfully Approved', 'success');
        return to_route('additional-experience.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdditionalExperience $additionalExperience)
    {
        return $additionalExperience;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdditionalExperienceRequest $request, AdditionalExperience $additionalExperience)
    {
        $this->authorize('update', $additionalExperience);
        $data = $request->all();
        $additionalExperience->update([
            'saproId' => $data['saproId'],
            'additionalExperience' => $data['additionalExperience'],
        ]);

        toast('Additional Experience Successfully Updated', 'success');
        return to_route('additional-experience.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdditionalExperience $additionalExperience)
    {
        $this->authorize('delete', $additionalExperience);
        $additionalExperience->delete();
        toast('Additional Experience Successfully Removed', 'success');
        return to_route('additional-experience.index');
    }
}
