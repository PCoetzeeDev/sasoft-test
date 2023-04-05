<?php

namespace App\BaseClasses;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

abstract class BaseFactory extends Factory
{
    /**
     * @param array $data
     * @return BaseModel
     */
    public static function emerge(array $data) : BaseModel
    {
        $factory = new static();

        parent::guessModelNamesUsing(function (self $factory) {
            return Str::replaceLast('Factory', '', get_class($factory));
        });

        return $factory->makeOne($data);
    }
}
