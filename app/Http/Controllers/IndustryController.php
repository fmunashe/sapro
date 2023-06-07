<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIndustryRequest;
use App\Http\Requests\UpdateIndustryRequest;
use App\Models\Industry;
use App\Models\IndustryCategory;
use RealRashid\SweetAlert\Facades\Alert;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Industry::class);
        $industries = Industry::query()->paginate(10);
        $industryCategories = IndustryCategory::all();
        return view('industries.index', compact('industries', 'industryCategories'));
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
    public function store(StoreIndustryRequest $request)
    {
        $this->authorize('create', Industry::class);
        $data = $request->all();
        Industry::query()->create($data);
        Alert::success('', 'Industry Successfully Created');
        return to_route('industries.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Industry $industry)
    {
        return $industry;
    }

    public function approveIndustry(Industry $industry)
    {
        $this->authorize('approveIndustry', $industry);
        if ($industry->approved) {
            Alert::error('', 'This industry entry was previously approved by ' . $industry->approvedBy)->autoClose(false);
            return to_route('industries.index');
        }
        $industry->approved = true;
        $industry->approvedBy = auth()->user()->email;
        $industry->save();
        toast('Industry Successfully Approved', 'success');
        return to_route('industries.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Industry $industry)
    {
        return $industry;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIndustryRequest $request, Industry $industry)
    {
        $this->authorize('update', $industry);
        $data = $request->all();
        $industry->update([
            'saproId' => $data['saproId'],
            'industry_category_id' => $data['industry_category_id']
        ]);
        Alert::success('', 'Industry Successfully Updated');
        return to_route('industries.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Industry $industry)
    {
        $this->authorize('delete', $industry);
        $industry->delete();
        Alert::success('', 'Industry Successfully Removed');
        return to_route('industries.index');
    }
}
