<?php

namespace App\Helpers;

use App\Binkap\Constant;

trait UsersHelper
{
    public function isAdmin(): bool
    {
        return $this->status == Constant::USER_STATUS_ADMIN;
    }
}
