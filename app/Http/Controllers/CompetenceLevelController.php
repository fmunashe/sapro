<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompetenceLevelRequest;
use App\Http\Requests\UpdateCompetenceLevelRequest;
use App\Models\CompetenceLevel;
use App\Models\SectorCategory;
use App\Models\SeniorityLevel;
use Illuminate\Auth\Access\AuthorizationException;

class CompetenceLevelController extends Controller
{

    /**
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('viewAny', CompetenceLevel::class);
        $competences = CompetenceLevel::query()->paginate(10);
        $seniorityLevels = SeniorityLevel::all();
        return view('competenceLevel.index', compact('competences', 'seniorityLevels'));
    }


    public function create()
    {

    }


    /**
     * @throws AuthorizationException
     */
    public function store(StoreCompetenceLevelRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('create', CompetenceLevel::class);
        $data = $request->all();
        CompetenceLevel::query()->create($data);
        toast('Competence Level Successfully Created', 'success');
        return to_route('competence-levels.index');
    }


    public function show(CompetenceLevel $competenceLevel): CompetenceLevel
    {
        return $competenceLevel;
    }


    public function edit(CompetenceLevel $competenceLevel): CompetenceLevel
    {
        return $competenceLevel;
    }


    /**
     * @throws AuthorizationException
     */
    public function update(UpdateCompetenceLevelRequest $request, CompetenceLevel $competenceLevel): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('update', $competenceLevel);
        $data = $request->all();
        $competenceLevel->update([
            'competenceLevel' => $data['competenceLevel'],
            'seniorityLevelId' => $data['seniorityLevelId']
        ]);
        toast('Competence Level Successfully Updated', 'success');
        return to_route('competence-levels.index');
    }


    /**
     * @throws AuthorizationException
     */
    public function destroy(CompetenceLevel $competenceLevel)
    {
        $this->authorize('delete', $competenceLevel);
        $competenceLevel->delete();
        toast('Competency Level Successfully Removed', 'success');
        return to_route('competence-levels.index');
    }
}
