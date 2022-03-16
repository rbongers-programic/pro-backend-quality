<?php

namespace Programic\ProQuality\Commands;

use Illuminate\Console\Command;

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
        $configDir = __DIR__ . '/../../configs/examples/';
        $files = [
            'ecs.example.php',
            'phpmd.example.xml',
            'phpstan.example.neon',
        ];

        foreach ($files as $file) {
            $newFile = str_replace('.example', '', $file);

            if (file_exists(base_path() . '/' . $newFile)) {
                if ($this->confirm($newFile . ' already exists. Would you like to override this file?')) {
                    copy($configDir . $file, base_path() . '/' . $newFile);
                }
            } else {
                copy($configDir . $file, base_path() . '/' . $newFile);
            }
        }

        $this->line('<info>Quality installed</info>');
        $this->line('Add composer scripts:
"scripts": {
    "lint": [
      "@check:ecs",
      "@check:phpmd",
      "@check:phpmnd",
      "@check:phpcpd",
      "@check:phpstan"
    ],
    "check:ecs": [
      "@php vendor/bin/ecs --ansi check"
    ],
    "check:phpmd": [
      "@php -d memory_limit=-1 vendor/bin/phpmd . text phpmd.xml --exclude storage,vendor"
    ],
    "check:phpmnd": [
      "@php vendor/bin/phpmnd --ansi --exclude=vendor --exclude=storage --exclude=database --exclude=config --exclude-file=\'_ide_helper.php\' --ignore-funcs=json_decode --extensions=default_parameter,-return,argument --non-zero-exit-on-violation -- ."
    ],
    "check:phpcpd": [
      "@php vendor/bin/phpcpd --fuzzy --exclude=vendor --exclude=storage --exclude=.phpstorm.meta.php ."
    ],
    "check:phpstan": [
      "@php vendor/bin/phpstan --debug --memory-limit=-1 analyse ."
    ]
  }'
        );
    }
}
