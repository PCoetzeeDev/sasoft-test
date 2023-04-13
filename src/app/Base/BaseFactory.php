<?php

namespace App\Base;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

abstract class BaseFactory extends Factory
{
    /**
     * @param array $data
     * @return BaseEntity
     */
    public static function emerge(array $data = []) : BaseEntity
    {
        $factory = new static();

        parent::guessModelNamesUsing(function (self $factory) {
            return Str::replaceLast('Factory', '', get_class($factory));
        });

        // Populate entity with fake data if in testing and nothing passed in:
        if (app()->environment() === 'testing' && empty($data)) {
            $data = $factory->makeOne()->toArray();
        }

        return $factory->makeOne($data);
    }
}
