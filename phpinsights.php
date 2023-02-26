<?php

use PhpCsFixer\Fixer\Import\OrderedImportsFixer;
use PhpCsFixer\Fixer\Comment\NoEmptyCommentFixer;
use PhpCsFixer\Fixer\StringNotation\SingleQuoteFixer;
use NunoMaduro\PhpInsights\Domain\Insights\ForbiddenTraits;
use PhpCsFixer\Fixer\ClassNotation\VisibilityRequiredFixer;
use PhpCsFixer\Fixer\ClassNotation\OrderedClassElementsFixer;
use SlevomatCodingStandard\Sniffs\Functions\FunctionLengthSniff;
use SlevomatCodingStandard\Sniffs\TypeHints\ReturnTypeHintSniff;
use SlevomatCodingStandard\Sniffs\Arrays\TrailingArrayCommaSniff;
use SlevomatCodingStandard\Sniffs\Functions\UnusedParameterSniff;
use NunoMaduro\PhpInsights\Domain\Insights\ForbiddenNormalClasses;
use SlevomatCodingStandard\Sniffs\TypeHints\PropertyTypeHintSniff;
use PHP_CodeSniffer\Standards\Generic\Sniffs\Files\LineLengthSniff;
use SlevomatCodingStandard\Sniffs\TypeHints\ParameterTypeHintSniff;
use SlevomatCodingStandard\Sniffs\Commenting\DocCommentSpacingSniff;
use SlevomatCodingStandard\Sniffs\TypeHints\DeclareStrictTypesSniff;
use NunoMaduro\PhpInsights\Domain\Insights\CyclomaticComplexityIsHigh;
use SlevomatCodingStandard\Sniffs\Classes\ClassConstantVisibilitySniff;
use SlevomatCodingStandard\Sniffs\Classes\ForbiddenPublicPropertySniff;
use SlevomatCodingStandard\Sniffs\ControlStructures\DisallowEmptySniff;
use SlevomatCodingStandard\Sniffs\Classes\SuperfluousExceptionNamingSniff;
use PHP_CodeSniffer\Standards\Generic\Sniffs\Formatting\SpaceAfterNotSniff;
use SlevomatCodingStandard\Sniffs\Namespaces\AlphabeticallySortedUsesSniff;
use PHP_CodeSniffer\Standards\Generic\Sniffs\Formatting\SpaceAfterCastSniff;
use SlevomatCodingStandard\Sniffs\Commenting\UselessFunctionDocCommentSniff;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Preset
    |--------------------------------------------------------------------------
    |
    | This option controls the default preset that will be used by PHP Insights
    | to make your code reliable, simple, and clean. However, you can always
    | adjust the `Metrics` and `Insights` below in this configuration file.
    |
    | Supported: "default", "laravel", "symfony", "magento2", "drupal"
    |
    */

    'preset' => 'default',

    /*
    |--------------------------------------------------------------------------
    | IDE
    |--------------------------------------------------------------------------
    |
    | This options allow to add hyperlinks in your terminal to quickly open
    | files in your favorite IDE while browsing your PhpInsights report.
    |
    | Supported: "textmate", "macvim", "emacs", "sublime", "phpstorm",
    | "atom", "vscode".
    |
    | If you have another IDE that is not in this list but which provide an
    | url-handler, you could fill this config with a pattern like this:
    |
    | myide://open?url=file://%f&line=%l
    |
    */

    'ide' => 'phpstorm',

    /*
    |--------------------------------------------------------------------------
    | Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may adjust all the various `Insights` that will be used by PHP
    | Insights. You can either add, remove or configure `Insights`. Keep in
    | mind, that all added `Insights` must belong to a specific `Metric`.
    |
    */

    'exclude' => [
        //  'app/Providers',
    ],

    'add' => [
        //  ExampleMetric::class => [
        //      ExampleInsight::class,
        //  ]
    ],

    'remove' => [
        // Code
        DeclareStrictTypesSniff::class, // Declare strict types
        ForbiddenPublicPropertySniff::class, // Forbidden public property
        VisibilityRequiredFixer::class, // Visibility required
        ClassConstantVisibilitySniff::class, // Class constant visibility
        DisallowEmptySniff::class, // Disallow empty
        NoEmptyCommentFixer::class, // No empty comment
        UselessFunctionDocCommentSniff::class, // Useless function doc comment
        ReturnTypeHintSniff::class, // Return type hint
        ParameterTypeHintSniff::class, // Parameter type hint
        PropertyTypeHintSniff::class, // Property type hint
        UnusedParameterSniff::class,
        // Architecture
        ForbiddenNormalClasses::class, //Normal classes are forbidden
        ForbiddenTraits::class, //Traits are forbidden
        SuperfluousExceptionNamingSniff::class,
        // Style
        TrailingArrayCommaSniff::class,
        SpaceAfterCastSniff::class, // Space after cast
        SpaceAfterNotSniff::class, // Space after not
        AlphabeticallySortedUsesSniff::class, // Alphabetically sorted uses
        DocCommentSpacingSniff::class, // Doc comment spacing
        OrderedClassElementsFixer::class, // Ordered class elements
        SingleQuoteFixer::class, // Single quote

    ],

    'config' => [
        CyclomaticComplexityIsHigh::class => [
            'maxComplexity' => 8,
        ],
        FunctionLengthSniff::class => [
            'maxLinesLength' => 30,
        ],
        LineLengthSniff::class => [
            'lineLimit' => 120,
            'absoluteLineLimit' => 120,
            'ignoreComments' => false,
        ],
        OrderedImportsFixer::class => [
            'imports_order' => ['class', 'const', 'function'],
            'sort_algorithm' => 'length', // possible values ['alpha', 'length', 'none']
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Requirements
    |--------------------------------------------------------------------------
    |
    | Here you may define a level you want to reach per `Insights` category.
    | When a score is lower than the minimum level defined, then an error
    | code will be returned. This is optional and individually defined.
    |
    */

    'requirements' => [
        'min-quality' => 80,
        'min-complexity' => 70,
        'min-architecture' => 80,
        'min-style' => 80,
        'disable-security-check' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Threads
    |--------------------------------------------------------------------------
    |
    | Here you may adjust how many threads (core) PHPInsights can use to perform
    | the analyse. This is optional, don't provide it and the tool will guess
    | the max core number available. This accept null value or integer > 0.
    |
    */

    'threads' => null,

];
