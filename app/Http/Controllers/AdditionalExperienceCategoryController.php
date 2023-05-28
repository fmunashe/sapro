<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdditionalExperienceCategoryRequest;
use App\Http\Requests\UpdateAdditionalExperienceCategoryRequest;
use App\Models\AdditionalExperience;
use App\Models\AdditionalExperienceCategory;

class AdditionalExperienceCategoryController extends Controller
{

    public function index()
    {
        $this->authorize('viewAny', AdditionalExperienceCategory::class);
        $additionalExperienceCategories = AdditionalExperienceCategory::query()->paginate(10);
        return view('additionalExperienceCategory.index', compact('additionalExperienceCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(StoreAdditionalExperienceCategoryRequest $request)
    {
        $this->authorize('create', AdditionalExperienceCategory::class);
        $data = $request->all();

        AdditionalExperienceCategory::query()->create($data);
        toast('Additional Experience Category Successfully Saved', 'success');
        return to_route('additional-experience-categories.index');
    }


    public function show(AdditionalExperienceCategory $additionalExperienceCategory)
    {
        return $additionalExperienceCategory;
    }


    public function edit(AdditionalExperienceCategory $additionalExperienceCategory)
    {
        return $additionalExperienceCategory;
    }


    public function update(UpdateAdditionalExperienceCategoryRequest $request, AdditionalExperienceCategory $additionalExperienceCategory)
    {
        $this->authorize('update', $additionalExperienceCategory);
        $data = $request->all();
        $additionalExperienceCategory->update([
            'additionalExperienceCategory' => $data['additionalExperienceCategory'],
        ]);
        toast('Additional Experience Category Successfully Updated', 'success');
        return to_route('additional-experience-categories.index');
    }


    public function destroy(AdditionalExperienceCategory $additionalExperienceCategory)
    {
        $this->authorize('delete', $additionalExperienceCategory);
        $additionalExperienceCategory->delete();
        toast('Additional Experience Category Successfully Removed', 'success');
        return to_route('additional-experience-categories.index');
    }
}
