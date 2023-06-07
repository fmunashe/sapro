<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSoftwareCategoryRequest;
use App\Http\Requests\UpdateSoftwareCategoryRequest;
use App\Models\SoftwareCategory;
use Illuminate\Auth\Access\AuthorizationException;

class SoftwareCategoryController extends Controller
{

    public function index()
    {
        $this->authorize('viewAny', SoftwareCategory::class);
        $softwareCategories = SoftwareCategory::query()->paginate(10);
        return view('softwareCategories.index', compact('softwareCategories'));
    }


    public function create()
    {
        //
    }


    /**
     * @throws AuthorizationException
     */
    public function store(StoreSoftwareCategoryRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('create', SoftwareCategory::class);
        $data = $request->all();

        SoftwareCategory::query()->create($data);
        toast('Software Category Successfully Created', 'success');
        return to_route('software-categories.index');
    }


    public function show(SoftwareCategory $softwareCategory): SoftwareCategory
    {
        return $softwareCategory;
    }


    public function edit(SoftwareCategory $softwareCategory): SoftwareCategory
    {
        return $softwareCategory;
    }


    /**
     * @throws AuthorizationException
     */
    public function update(UpdateSoftwareCategoryRequest $request, SoftwareCategory $softwareCategory): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('update', $softwareCategory);
        $data = $request->all();
        $softwareCategory->update([
            'softwareCategory' => $data['softwareCategory'],
        ]);

        toast('Software Category Successfully Updated', 'success');
        return to_route('software-categories.index');
    }


    /**
     * @throws AuthorizationException
     */
    public function destroy(SoftwareCategory $softwareCategory): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('delete', $softwareCategory);
        $softwareCategory->delete();
        toast('Software Category Successfully Removed', 'success');
        return to_route('software-categories.index');
    }
}
