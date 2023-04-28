<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfessionalExperienceRequest;
use App\Http\Requests\UpdateProfessionalExperienceRequest;
use App\Models\FirmExperience;
use App\Models\ProfessionalExperience;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class ProfessionalExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', ProfessionalExperience::class);
        $professionalExperience = ProfessionalExperience::query()->paginate(10);
        return view('professionalExperience.index', compact('professionalExperience'));
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
    public function store(StoreProfessionalExperienceRequest $request): RedirectResponse
    {
        $this->authorize('create', ProfessionalExperience::class);
        $data = $request->all();
        ProfessionalExperience::query()->create($data);

        Alert::success('', 'Professional Experience Successfully Saved');
        return to_route('professional-experience.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProfessionalExperience $professionalExperience)
    {
        return $professionalExperience;
    }
    public function approveProfessionalExperience(ProfessionalExperience $professionalExperience)
    {
        $this->authorize('approveProfessionalExperience', $professionalExperience);
        if ($professionalExperience->approved) {
            Alert::error('', 'This professional experience entry was previously approved by ' . $professionalExperience->approvedBy)->autoClose(false);
            return to_route('professional-experience.index');
        }
        $professionalExperience->approved = true;
        $professionalExperience->approvedBy = auth()->user()->email;
        $professionalExperience->save();
        toast('Professional Experience Successfully Approved', 'success');
        return to_route('professional-experience.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfessionalExperience $professionalExperience)
    {
        return $professionalExperience;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfessionalExperienceRequest $request, ProfessionalExperience $professionalExperience)
    {
        $this->authorize('update', $professionalExperience);
        $data = $request->all();
        $professionalExperience->update([
            'saproId' => $data['saproId'],
            'professionalExperience' => $data['professionalExperience']
        ]);

        Alert::success('', 'Professional Experience Successfully Updated');
        return to_route('professional-experience.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfessionalExperience $professionalExperience)
    {
        $this->authorize('delete', $professionalExperience);
        $professionalExperience->delete();
        Alert::success('', 'Professional Experience Successfully Removed');
        return to_route('professional-experience.index');
    }
}
