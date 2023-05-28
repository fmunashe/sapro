<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePriorExperienceRoleRequest;
use App\Http\Requests\UpdatePriorExperienceRoleRequest;
use App\Models\PriorExperienceRole;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;

class PriorExperienceRoleController extends Controller
{

    /**
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('viewAny', PriorExperienceRole::class);
        $priorExperiences = PriorExperienceRole::query()->paginate(10);
        return view('priorExperienceRoles.index', compact('priorExperiences'));
    }


    public function create()
    {
        //
    }


    /**
     * @throws AuthorizationException
     */
    public function store(StorePriorExperienceRoleRequest $request): RedirectResponse
    {
        $this->authorize('create', PriorExperienceRole::class);
        $data = $request->all();

        PriorExperienceRole::query()->create($data);
        toast('Prior Experience Role Successfully Created', 'success');
        return to_route('prior-experience-roles.index');
    }


    public function show(PriorExperienceRole $priorExperienceRole): PriorExperienceRole
    {
        return $priorExperienceRole;
    }


    public function edit(PriorExperienceRole $priorExperienceRole): PriorExperienceRole
    {
        return $priorExperienceRole;
    }


    /**
     * @throws AuthorizationException
     */
    public function update(UpdatePriorExperienceRoleRequest $request, PriorExperienceRole $priorExperienceRole): RedirectResponse
    {
        $this->authorize('update', $priorExperienceRole);
        $data = $request->all();
        $priorExperienceRole->update([
            'priorExperienceRole' => $data['priorExperienceRole'],
        ]);


        toast('Prior Experience Role Successfully Updated', 'success');
        return to_route('prior-experience-roles.index');
    }

    /**
     * @throws AuthorizationException
     */
    public function destroy(PriorExperienceRole $priorExperienceRole): RedirectResponse
    {
        $this->authorize('delete', $priorExperienceRole);
        $priorExperienceRole->delete();
        toast('Prior Experience Role Successfully Removed', 'success');
        return to_route('prior-experience-roles.index');
    }
}
