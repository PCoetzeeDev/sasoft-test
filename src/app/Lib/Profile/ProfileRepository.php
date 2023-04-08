<?php

namespace App\Lib\Profile;

class ProfileRepository
{
    /**
     * @param string $uuid
     * @return Profile
     */
    public static function getByUuid(string $uuid): Profile
    {
        return Profile::query()
            ->where('uuid', '=', $uuid)
            ->limit(1)
            ->get()
            ->first() ?? new Profile();
    }
}