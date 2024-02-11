<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;

class RepositoryMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'argan:make:repository
    ';

    protected $type = 'service';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Membuat Argan Repository';
    protected function getDefaultNamespace($rootNamespace){
        return $rootNamespace.'\Repositories';
    }
    protected function getStub(){
        return base_path('stubs/Repository.stub');
    }

}
