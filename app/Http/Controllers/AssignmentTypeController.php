<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAssignmentTypeRequest;
use App\Http\Requests\UpdateAssignmentTypeRequest;
use App\Models\AssignmentType;
use App\Models\SeniorityLevel;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;

class AssignmentTypeController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', AssignmentType::class);
        $assignmentTypes = AssignmentType::query()->paginate(10);
        return view('assignmentTypes.index', compact('assignmentTypes'));
    }


    public function create()
    {
        //
    }

    public function store(StoreAssignmentTypeRequest $request)
    {
        $this->authorize('create', AssignmentType::class);
        $data = $request->all();

        AssignmentType::query()->create($data);
        toast('Assignment Type Successfully Created', 'success');
        return to_route('assignment-types.index');
    }


    public function show(AssignmentType $assignmentType)
    {
        return $assignmentType;
    }

    public function edit(AssignmentType $assignmentType)
    {
        return $assignmentType;
    }

    public function update(UpdateAssignmentTypeRequest $request, AssignmentType $assignmentType)
    {
        $this->authorize('update', $assignmentType);
        $data = $request->all();
        $assignmentType->update([
            'assignmentType' => $data['assignmentType'],
        ]);


        toast('Assignment Type Successfully Updated', 'success');
        return to_route('assignment-types.index');
    }


    /**
     * @throws AuthorizationException
     */
    public function destroy(AssignmentType $assignmentType): RedirectResponse
    {
        $this->authorize('delete', $assignmentType);
        $assignmentType->delete();
        toast('Assignment Type Successfully Removed', 'success');
        return to_route('assignment-types.index');
    }
}
