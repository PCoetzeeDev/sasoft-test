<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Artisan;

trait CreatesApplication
{
    /**
     * Creates the application.
     */
    public function createApplication(): Application
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        try {
            $app->make(Kernel::class)->bootstrap();
        } catch (\Exception $exception) {
            dd($exception->getTraceAsString());
        }

        return $app;
    }
}
