<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSectorCategoryRequest;
use App\Http\Requests\UpdateSectorCategoryRequest;
use App\Models\IndustryCategory;
use App\Models\SectorCategory;
use Illuminate\Auth\Access\AuthorizationException;
use RealRashid\SweetAlert\Facades\Alert;

class SectorCategoryController extends Controller
{

    public function index()
    {
        $this->authorize('viewAny', SectorCategory::class);
        $sectorCategories = SectorCategory::query()->paginate(10);
        $industryCategories = IndustryCategory::all();
        return view('sectorCategories.index', compact('sectorCategories', 'industryCategories'));
    }


    public function create()
    {
        //
    }


    /**
     * @throws AuthorizationException
     */
    public function store(StoreSectorCategoryRequest $request)
    {
        $this->authorize('create', SectorCategory::class);
        $data = $request->all();
        SectorCategory::query()->create($data);
        toast('Sector Category Successfully Created', 'success');
        return to_route('sector-categories.index');
    }


    public function show(SectorCategory $sectorCategory): SectorCategory
    {
        return $sectorCategory;
    }


    public function edit(SectorCategory $sectorCategory): SectorCategory
    {
        return $sectorCategory;
    }


    /**
     * @throws AuthorizationException
     */
    public function update(UpdateSectorCategoryRequest $request, SectorCategory $sectorCategory)
    {
        $this->authorize('update', $sectorCategory);
        $data = $request->all();
        $sectorCategory->update([
            'name' => $data['name'],
            'industry_category_id' => $data['industry_category_id']
        ]);
        toast('Sector Category Successfully Updated', 'success');
        return to_route('sector-categories.index');
    }


    /**
     * @throws AuthorizationException
     */
    public function destroy(SectorCategory $sectorCategory): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('delete', $sectorCategory);
        $sectorCategory->delete();
        toast('Sector Category Successfully Removed', 'success');
        return to_route('sector-categories.index');
    }
}
