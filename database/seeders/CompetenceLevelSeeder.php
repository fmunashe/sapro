<?php

namespace Database\Seeders;

use App\Models\CompetenceLevel;
use Illuminate\Database\Seeder;

class CompetenceLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $competences = [
            ['seniorityLevelId' => 1, 'competenceLevel' => 'Provides timely, high-quality deliverables and client service'],
            ['seniorityLevelId' => 1, 'competenceLevel' => 'Effectively communicates general knowledge of the business, industry, and systems to engagement teams and client for efficient information flow'],
            ['seniorityLevelId' => 1, 'competenceLevel' => 'Responds to and proactively acts on clients requests'],
            ['seniorityLevelId' => 1, 'competenceLevel' => 'Demonstrates knowledge of methodology, relevant standards, and systems and can guide junior team members'],
            ['seniorityLevelId' => 2, 'competenceLevel' => 'Planning the budget and resources for an engagement'],
            ['seniorityLevelId' => 2, 'competenceLevel' => 'Collaborates with managers and assists with coaching junior team members, manages deliverables and deadlines'],
            ['seniorityLevelId' => 2, 'competenceLevel' => 'Takes ownership of more complex assigned tasks, provides recommendations and proactively reports findings and seeks feedback'],
            ['seniorityLevelId' => 3, 'competenceLevel' => 'Planning the budget and resources for an engagement'],
            ['seniorityLevelId' => 3, 'competenceLevel' => 'Collaborates with managers and assists with coaching junior team members, manages deliverables and deadlines'],
            ['seniorityLevelId' => 3, 'competenceLevel' => 'Takes ownership of more complex assigned tasks, provides recommendations and proactively reports findings and seeks feedback'],
            ['seniorityLevelId' => 3, 'competenceLevel' => 'Leading an engagement end-to-end (from planning, execution, finalisation, team and client relations)'],
            ['seniorityLevelId' => 3, 'competenceLevel' => 'Delegating and coaching junior team members; able to review, complete and finalize the client file'],
            ['seniorityLevelId' => 3, 'competenceLevel' => 'Reviewing and signing off on work papers'],
            ['seniorityLevelId' => 3, 'competenceLevel' => 'Supervising the engagement team and tasks per budget'],
            ['seniorityLevelId' => 4, 'competenceLevel' => 'Planning the budget and resources for an engagement'],
            ['seniorityLevelId' => 4, 'competenceLevel' => 'Leading an engagement end-to-end (from planning, execution, finalisation, team, and client relations)'],
            ['seniorityLevelId' => 4, 'competenceLevel' => 'Delegating and coaching junior team members; able to review, complete and finalise the client file'],
            ['seniorityLevelId' => 4, 'competenceLevel' => 'Reviewing and signing off on work papers'],
            ['seniorityLevelId' => 4, 'competenceLevel' => 'Supervising the engagement team, and tasks per budget'],
        ];

        foreach ($competences as $competence) {
            CompetenceLevel::query()->create($competence);
        }
    }
}
