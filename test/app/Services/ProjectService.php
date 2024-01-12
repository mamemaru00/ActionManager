<?php

namespace App\Services;

use App\Repositories\ProjectInfoRepository;

class ProjectService {
    public function projectDestroy($projectDestroy) {
        $projectDestroy->delete();
    }

    public function projectDateConversion($projectData) {
        $projectData->sales_in_charge = date('Y-m-d', strtotime($projectData->sales_in_charge));
        $projectData->order_date = date('Y-m-d', strtotime($projectData->order_date));
        return $projectData;
    }

    public function projectUserIdConversion($request, $id) {
        $request->user_id = (int)$request->user_id;
        (new ProjectInfoRepository)->updateProjectInfo($request, $id);
        return $request;
    }
}
