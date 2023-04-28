<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInternationalExperienceRequest;
use App\Http\Requests\UpdateInternationalExperienceRequest;
use App\Models\InternationalExperience;
use RealRashid\SweetAlert\Facades\Alert;

class InternationalExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', InternationalExperience::class);
        $internationalExperiences = InternationalExperience::query()->paginate(10);
        return view('internationalExperience.index', compact('internationalExperiences'));
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
    public function store(StoreInternationalExperienceRequest $request)
    {
        $this->authorize('create', InternationalExperience::class);
        $data = $request->all();
        InternationalExperience::query()->create($data);
        Alert::success('', 'International Experience Successfully Saved');
        return to_route('international-experience.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(InternationalExperience $internationalExperience)
    {
        return $internationalExperience;
    }

    public function approveInternationalExperience(InternationalExperience $internationalExperience)
    {
        $this->authorize('approveInternationalExperience', $internationalExperience);
        if ($internationalExperience->approved) {
            Alert::error('', 'This international experience entry was previously approved by ' . $internationalExperience->approvedBy)->autoClose(false);
            return to_route('international-experience.index');
        }
        $internationalExperience->approved = true;
        $internationalExperience->approvedBy = auth()->user()->email;
        $internationalExperience->save();
        toast('International Experience Successfully Approved', 'success');
        return to_route('international-experience.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InternationalExperience $internationalExperience)
    {
        return $internationalExperience;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInternationalExperienceRequest $request, InternationalExperience $internationalExperience)
    {
        $this->authorize('update', $internationalExperience);
        $data = $request->all();
        $internationalExperience->update([
            'saproId' => $data['saproId'],
            'country' => $data['country'],
            'city' => $data['city'],
            'sector' => $data['sector'],
            'startPeriod' => $data['startPeriod'],
            'endPeriod' => $data['endPeriod'],
        ]);
        toast('International Experience Successfully Updated', 'success');
        return to_route('international-experience.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InternationalExperience $internationalExperience)
    {
        $this->authorize('delete', $internationalExperience);
        $internationalExperience->delete();
        Alert::success('', 'International Experience Successfully Removed');
        return to_route('international-experience.index');
    }
}
