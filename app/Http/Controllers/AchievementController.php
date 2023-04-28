<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAchievementRequest;
use App\Http\Requests\UpdateAchivementRequest;
use App\Models\Achievement;
use RealRashid\SweetAlert\Facades\Alert;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Achievement::class);
        $achievements = Achievement::query()->paginate(10);
        return view('achievements.index', compact('achievements'));
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
    public function store(StoreAchievementRequest $request)
    {
        $this->authorize('create', Achievement::class);
        $data = $request->all();
        Achievement::query()->create($data);

        toast('Achievement Successfully Registered', 'success');
        return to_route('achievements.index');
    }

    public function approveAchievement(Achievement $achievement)
    {
        $this->authorize('approveAchievement', $achievement);
        if ($achievement->approved) {
            Alert::error('', 'This achievement was previously approved by ' . $achievement->approvedBy);
            return to_route('achievements.index');
        }
        $achievement->approved = true;
        $achievement->approvedBy = auth()->user()->email;
        $achievement->save();
        toast('Achievement Successfully Approved', 'success');
        return to_route('achievements.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Achievement $achievement)
    {
        return $achievement;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Achievement $achievement)
    {
        return $achievement;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAchivementRequest $request, Achievement $achievement)
    {
        $this->authorize('update', $achievement);
        $data = $request->all();
        $achievement->update([
            'saproId' => $data['saproId'],
            'year' => $data['year'],
            'achievement' => $data['achievement'],
        ]);

        toast('Achievement Successfully Updated', 'success');
        return to_route('achievements.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Achievement $achievement)
    {
        $this->authorize('delete', $achievement);
        $achievement->delete();
        toast('Achievement Successfully Removed', 'success');
        return to_route('achievements.index');
    }
}
