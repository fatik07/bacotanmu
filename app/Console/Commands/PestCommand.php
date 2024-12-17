<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pest {arguments?*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'run test with pest';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Ambil semua argumen yang diterima
        $arguments = $this->argument('arguments');

        // Format perintah untuk dijalankan
        $command = './vendor/bin/pest ' . implode(' ', $arguments);

        // Jalankan perintah di terminal
        passthru($command);

        return Command::SUCCESS;
    }
}
