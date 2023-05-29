<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIndustryCategoryRequest;
use App\Http\Requests\UpdateIndustryCategoryRequest;
use App\Models\Industry;
use App\Models\IndustryCategory;
use Illuminate\Auth\Access\AuthorizationException;
use RealRashid\SweetAlert\Facades\Alert;

class IndustryCategoryController extends Controller
{

    /**
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('viewAny', IndustryCategory::class);
        $industryCategories = IndustryCategory::query()->paginate(10);
        return view('industryCategories.index', compact('industryCategories'));
    }


    public function create()
    {
        //
    }


    /**
     * @throws AuthorizationException
     */
    public function store(StoreIndustryCategoryRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('create', IndustryCategory::class);
        $data = $request->all();
        IndustryCategory::query()->create($data);
        toast('Industry Successfully Created', 'success');
        return to_route('industry-categories.index');
    }


    public function show(IndustryCategory $industryCategory): IndustryCategory
    {
        return $industryCategory;
    }


    public function edit(IndustryCategory $industryCategory): IndustryCategory
    {
        return $industryCategory;
    }


    /**
     * @throws AuthorizationException
     */
    public function update(UpdateIndustryCategoryRequest $request, IndustryCategory $industryCategory): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('update', $industryCategory);
        $data = $request->all();
        $industryCategory->update([
            'name' => $data['name']
        ]);
        toast('Industry Category Successfully Updated', 'success');
        return to_route('industry-categories.index');
    }


    /**
     * @throws AuthorizationException
     */
    public function destroy(IndustryCategory $industryCategory): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('delete', $industryCategory);
        $industryCategory->delete();
        toast('Industry Category Successfully Removed', 'success');
        return to_route('industry-categories.index');
    }
}
