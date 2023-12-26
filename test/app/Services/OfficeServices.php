<?php

namespace App\Services;

class OfficeServices
{
    public function getUserOfficeName($authUser)
    {
        return $authUser->office->office_name;
    }
}
