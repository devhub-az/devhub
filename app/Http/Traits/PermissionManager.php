<?php

namespace App\Http\Traits;

/**
 * Class PermissionManager.
 */
trait PermissionManager
{
    // Related attributes
    public function isAdmin()
    {
        return $this->role_level == 9;
    }

    public function isModerator()
    {
        return $this->role_level == 5;
    }

    public function isSuperModerator()
    {
        return $this->role_level == 7;
    }
}
