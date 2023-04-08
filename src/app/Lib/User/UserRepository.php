<?php

namespace App\Lib\User;

class UserRepository
{
    /**
     * @param string $uuid
     * @return User
     */
    public static function getByUuid(string $uuid): User
    {
        return User::query()
            ->where('uuid', '=', $uuid)
            ->limit(1)
            ->get()
            ->first() ?? new User();
    }

    /**
     * @param string $email
     * @return User
     */
    public static function getByEmail(string $email): User
    {
        return User::query()
            ->where('email', '=', $email)
            ->limit(1)
            ->get()
            ->first() ?? new User();
    }
}