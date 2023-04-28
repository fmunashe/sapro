<?php


namespace app\Http\Traits;

use App\Models\ClientRequest;
use App\Models\User;

/**
 * Author: Farai Zihove
 * Mobile: +263778234258
 * Email: farai@flickerleap.com
 * Date: 14/4/2023
 * Time: 01:12
 */
trait Analytics
{
    public function usersByType()
    {
        return User::query()
            ->selectRaw('COUNT(users.id) as Total, users.type as userType')
            ->groupBy('userType')
            ->get();
    }

    public function requestsByStatus()
    {
        return ClientRequest::query()
            ->selectRaw('COUNT(id) as Total, status as requestStatus')
            ->groupBy('requestStatus')
            ->get();
    }

    public function usersBySeniorityLevel()
    {
        return User::query()
            ->join('seniority_levels', 'users.seniorityLevelId', '=', 'seniority_levels.seniorityLevelId')
            ->selectRaw('COUNT(users.id) as Total, seniority_levels.seniorityLevelDescription as level')
            ->groupBy('level')
            ->get();
    }

    public function usersBySpecialisation()
    {
        return User::query()
            ->join('specialisations', 'users.specialisationId', '=', 'specialisations.specialisationId')
            ->selectRaw('COUNT(users.id) as Total, specialisations.specialisationDescription as specialisation')
            ->groupBy('specialisation')
            ->get();
    }

    public function usersByContractStatus()
    {
        return User::query()
            ->join('contract_statuses', 'users.contractStatusId', '=', 'contract_statuses.contractStatusId')
            ->selectRaw('COUNT(users.id) as Total, contract_statuses.contractStatusDescription as contractStatus')
            ->groupBy('contractStatus')
            ->get();
    }
}
