<?php

namespace Programic\ProQuality\Commands;

use Illuminate\Console\Command;
use Programic\Tasks\Facades\Task;

class ProQualityInstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pro:quality:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installs the pro quality package';


    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $configDir = __DIR__ . '/configs/examples/';

        copy($configDir . 'ecs.example.php', base_path() . '/ecs.php');
        copy($configDir . 'phpmd.example.xml', base_path() . '/phpmd.xml');
        copy($configDir . 'phpstan.example.neon', base_path() . '/phpstan.neon');

        $this->line('<info>Quality installed</info>');
    }
}
