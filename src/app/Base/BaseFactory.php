<?php

namespace App\Base;

use App\Exceptions\InstantiateAttemptInWrongEnvException;
use App\Exceptions\UnknownEnvironmentException;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

abstract class BaseFactory extends Factory
{
    /**
     * @param array $data
     * @return BaseEntity
     * @throws InstantiateAttemptInWrongEnvException
     * @throws UnknownEnvironmentException
     */
    public static function instantiate(array $data = []) : BaseEntity
    {
        $factory = new static();
        $modelName = Str::replaceLast('Factory', '', get_class($factory));
        parent::guessModelNamesUsing(function () use ($modelName) {
            return $modelName;
        });

        switch (app()->environment()) {
            case 'testing':
                $data = empty($data) ? $factory->makeOne()->toArray() : $data;
                return $factory->makeOne($data);

            case 'production':
            case 'local':
                if (empty($data)) {
                    throw new InstantiateAttemptInWrongEnvException();
                }
                return new $modelName; // non-testing models should always start out empty

            default:
                throw new UnknownEnvironmentException(); // this default means this function can only return something or throw and exception
        }
    }
}
