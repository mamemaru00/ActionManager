<?php

namespace App\Services;

class ProjectService {
    public function projectDestroy($projectDestroy) {
        $projectDestroy->delete();
    }
}
