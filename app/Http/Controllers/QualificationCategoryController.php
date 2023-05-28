<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQualificationCategoryRequest;
use App\Http\Requests\UpdateQualificationCategoryRequest;
use App\Models\QualificationCategory;

class QualificationCategoryController extends Controller
{

    public function index()
    {
        $this->authorize('viewAny', QualificationCategory::class);
        $qualifications = QualificationCategory::query()->paginate(10);
        return view('qualificationCategories.index', compact('qualifications'));
    }


    public function create()
    {
        //
    }


    public function store(StoreQualificationCategoryRequest $request)
    {

        $this->authorize('create', QualificationCategory::class);
        $data = $request->all();

        QualificationCategory::query()->create($data);
        toast('Qualification category Successfully Created', 'success');
        return to_route('qualification-categories.index');
    }


    public function show(QualificationCategory $qualificationCategory)
    {
        return $qualificationCategory;
    }


    public function edit(QualificationCategory $qualificationCategory)
    {
        return $qualificationCategory;
    }


    public function update(UpdateQualificationCategoryRequest $request, QualificationCategory $qualificationCategory)
    {
        $this->authorize('update', $qualificationCategory);
        $data = $request->all();
        $qualificationCategory->update([
            'qualification' => $data['qualification'],
            'group' => $data['group'],
            'comments' => $data['comments'],
        ]);


        toast('Qualification Category Successfully Updated', 'success');
        return to_route('qualification-categories.index');
    }


    public function destroy(QualificationCategory $qualificationCategory)
    {
        $this->authorize('delete', $qualificationCategory);
        $qualificationCategory->delete();
        toast('Qualification category Successfully Removed', 'success');
        return to_route('qualification-categories.index');
    }
}
