<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\TypeDeclaration\Rector\StmtsAwareInterface\DeclareStrictTypesRector;

return RectorConfig::configure()
    ->withPaths([
        __DIR__.'/app',
        __DIR__.'/bootstrap',
        __DIR__.'/config',
        __DIR__.'/public',
        __DIR__.'/resources',
        __DIR__.'/routes',
        __DIR__.'/tests',
    ])
    ->withSkip([
        __DIR__.'/bootstrap/cache',
        __DIR__.'/storage',
        __DIR__.'/vendor',
        DeclareStrictTypesRector::class => [
            __DIR__.'/resources/views',
        ],
    ])
    ->withPhpSets()
    ->withImportNames()
    ->withComposerBased(laravel: true)
    ->withRules([
        DeclareStrictTypesRector::class,
    ]);
