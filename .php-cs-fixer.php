<?php

use PhpCsFixer\Finder;

$excludes = [];

$finder = (new Finder())
    ->exclude($excludes)
    ->in([
        './src',
        './tests',
    ]);

return (new PhpCsFixer\Config())
    ->setCacheFile(__DIR__ . '/.php-cs-fixer.cache')
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR12' => true,
        'semicolon_after_instruction' => false,
    ])
    ->setFinder($finder);
