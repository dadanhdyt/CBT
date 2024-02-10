<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;

class ServiceMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'argan:make:service';

    protected $type = 'service';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Membuat Argan Services';
    protected function getDefaultNamespace($rootNamespace){
        return $rootNamespace.'\Services';
    }
    protected function getStub(){
        return base_path('stubs/Service.stub');
    }

}
