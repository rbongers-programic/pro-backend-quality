<?php

declare(strict_types=1);
require_once __DIR__ . '/vendor/programic/pro-backend-quality/configs/ecs.dist.php';

use SlevomatCodingStandard\Sniffs\TypeHints\ParameterTypeHintSniff;
use SlevomatCodingStandard\Sniffs\TypeHints\PropertyTypeHintSniff;
use Symplify\EasyCodingStandard\Config\ECSConfig;

use function Programic\QualityControl\EasyCodingStandard\ecsRules;
use function Programic\QualityControl\EasyCodingStandard\ecsSkips;

return static function (ECSConfig $ecsConfig): void {
    $ecsConfig->paths([__DIR__]);

    $rules = [];

    $skips = [
        __DIR__ . '/vendor',
        __DIR__ . '/storage',
        __DIR__ . '/bootstrap',
    ];

    if (file_exists(__DIR__ . '/_ide_helper.php')) {
        $skips[] = __DIR__ . '/_ide_helper.php';
    }

    if (file_exists(__DIR__ . '/.phpstorm.meta.php')) {
        $skips[] = __DIR__ . '/.phpstorm.meta.php';
    }

    $skips[PropertyTypeHintSniff::class . '.MissingNativeTypeHint'] = [
        __DIR__ . '/app/Exceptions/Handler.php',
        __DIR__ . '/app/Http/Kernel.php',
        __DIR__ . '/app/Http/Middleware/VerifyCsrfToken.php',
        __DIR__ . '/app/Http/Middleware/TrustProxies.php',
        __DIR__ . '/app/Http/Middleware/TrimStrings.php',
        __DIR__ . '/app/Http/Middleware/PreventRequestsDuringMaintenance.php',
        __DIR__ . '/app/Http/Middleware/EncryptCookies.php',
        __DIR__ . '/app/Providers/AuthServiceProvider.php',
        __DIR__ . '/app/Providers/EventServiceProvider.php',
        __DIR__ . '/app/Models/',
    ];

    $skips[ParameterTypeHintSniff::class] = [
        __DIR__ . '/app/Http/Middleware/Authenticate.php',
    ];

    $ecsConfig->skip([...$skips, ...ecsSkips()]);

    $ecsConfig->rules([...$rules, ...ecsRules()]);

    $ecsConfig->rules(ecsRules());
};
