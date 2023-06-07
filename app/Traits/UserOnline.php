<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait UserOnline
{
    public function is_online()
    {
        if (Cache::has('user_is_online_'.$this->id)) {
            return true;
        }

        return false;
    }
}