<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeEntityCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:entity {domainName} {entityName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a model entity inside a domain';

    /**
     * @var string
     */
    protected string $domainName;

    /**
     * @var string
     */
    protected string $entityName;

    const STUB = 'entity.stub';


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     * @throws \Exception
     */
    public function handle(): void
    {
        $this->domainName = $this->argument('domainName');
        $this->entityName = $this->argument('entityName');

        $domainPath = config('app.domain_dir');
        $domainFullPath = $domainPath . '/' . $this->domainName;
        $fullEntityPath = $domainFullPath . '/' . $this->entityName . '.php';

        try {
            if (File::exists($fullEntityPath)) {
                throw new \Exception('Entity file already exists');
            }

            File::ensureDirectoryExists($domainFullPath);

            $fileContent = file_get_contents(__DIR__ . '/../../../stubs/' . self::STUB);

            foreach ($this->getStubVariables() as $variable => $replacement) {
                $fileContent = str_replace('{{ '.$variable.' }}' , $replacement, $fileContent);
            }

            if (File::put($fullEntityPath, $fileContent)) {
                $this->info('Created new entity at ' . $fullEntityPath);
            } else {
                throw new \Exception('Failed to create new entity');
            }
        } catch (\Exception $exception) {
            $this->error($exception->getMessage());

            exit(1);
        }
    }

    /**
     * @return string[]
     */
    protected function getStubVariables() : array
    {
        return [
            'namespace'         => app()->getNamespace() . 'Lib\\' . Str::studly($this->domainName),
            'class'             => Str::studly($this->entityName),
            'table'             => Str::plural(Str::lower($this->entityName))
        ];
    }
}
