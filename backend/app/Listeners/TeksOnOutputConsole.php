<?php

namespace App\Listeners;

use Illuminate\Console\Events\CommandFinished;
use Illuminate\Console\Events\CommandStarting;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TeksOnOutputConsole
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CommandFinished $commandFinished): void
    {
        $commandFinished->output->writeln("");
        $commandFinished->output->writeln("Terimakasih telah mengunakan aplikasi kami!");
    }
}
