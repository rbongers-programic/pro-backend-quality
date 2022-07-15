<?php

declare(strict_types=1);

namespace Programic\QualityControl\EasyCodingStandard;

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->import(SetList::PSR_12);
    $containerConfigurator->import(SetList::CLEAN_CODE);

    $services = $containerConfigurator->services();

    // phpcsfixer
    $services->set(\PhpCsFixer\Fixer\Alias\MbStrFunctionsFixer::class);
    $services->set(\PhpCsFixer\Fixer\Basic\BracesFixer::class);
    $services->set(\PhpCsFixer\Fixer\ClassNotation\OrderedClassElementsFixer::class);
    $services->set(\PhpCsFixer\Fixer\FunctionNotation\ReturnTypeDeclarationFixer::class);
    $services->set(\PhpCsFixer\Fixer\Strict\StrictComparisonFixer::class);
    $services->set(\PhpCsFixer\Fixer\Strict\StrictParamFixer::class);

    // slevomat
    // - arrays
    $services->set(\SlevomatCodingStandard\Sniffs\Arrays\DisallowImplicitArrayCreationSniff::class);
    $services->set(\SlevomatCodingStandard\Sniffs\Arrays\MultiLineArrayEndBracketPlacementSniff::class);
    $services->set(\SlevomatCodingStandard\Sniffs\Arrays\SingleLineArrayWhitespaceSniff::class);
    $services->set(\SlevomatCodingStandard\Sniffs\Arrays\TrailingArrayCommaSniff::class);
    // - classes
    $services->set(\SlevomatCodingStandard\Sniffs\Classes\ClassConstantVisibilitySniff::class);
    $services->set(\SlevomatCodingStandard\Sniffs\Classes\DisallowMultiConstantDefinitionSniff::class);
    $services->set(\SlevomatCodingStandard\Sniffs\Classes\DisallowMultiPropertyDefinitionSniff::class);
    $services->set(\SlevomatCodingStandard\Sniffs\Classes\ModernClassNameReferenceSniff::class);
    $services->set(\SlevomatCodingStandard\Sniffs\Classes\PropertyDeclarationSniff::class);
    // - control structures
    $services->set(\SlevomatCodingStandard\Sniffs\ControlStructures\AssignmentInConditionSniff::class);
    $services->set(\SlevomatCodingStandard\Sniffs\ControlStructures\DisallowContinueWithoutIntegerOperandInSwitchSniff::class);
    $services->set(\SlevomatCodingStandard\Sniffs\ControlStructures\DisallowYodaComparisonSniff::class);
    $services->set(\SlevomatCodingStandard\Sniffs\ControlStructures\NewWithParenthesesSniff::class);
    $services->set(\SlevomatCodingStandard\Sniffs\ControlStructures\RequireNullCoalesceEqualOperatorSniff::class);
    $services->set(\SlevomatCodingStandard\Sniffs\ControlStructures\RequireNullCoalesceOperatorSniff::class);
    // - exceptions
    $services->set(\SlevomatCodingStandard\Sniffs\Exceptions\DeadCatchSniff::class);
    // - functions
    $services->set(\SlevomatCodingStandard\Sniffs\Functions\StrictCallSniff::class);
    $services->set(\SlevomatCodingStandard\Sniffs\Functions\StaticClosureSniff::class);
    $services->set(\SlevomatCodingStandard\Sniffs\Functions\UnusedParameterSniff::class);
    $services->set(\SlevomatCodingStandard\Sniffs\Functions\UselessParameterDefaultValueSniff::class);
    // - namespaces
    $services->set(\SlevomatCodingStandard\Sniffs\Namespaces\UseDoesNotStartWithBackslashSniff::class);
    $services->set(\SlevomatCodingStandard\Sniffs\Namespaces\UselessAliasSniff::class);
    // - php
    $services->set(\SlevomatCodingStandard\Sniffs\PHP\ShortListSniff::class);
    $services->set(\SlevomatCodingStandard\Sniffs\PHP\TypeCastSniff::class);
    // - typehints
    $services->set(\SlevomatCodingStandard\Sniffs\TypeHints\NullableTypeForNullDefaultValueSniff::class);
    $services->set(\SlevomatCodingStandard\Sniffs\TypeHints\ParameterTypeHintSniff::class);
    $services->set(\SlevomatCodingStandard\Sniffs\TypeHints\ParameterTypeHintSpacingSniff::class);
    $services->set(\SlevomatCodingStandard\Sniffs\TypeHints\PropertyTypeHintSniff::class);
    $services->set(\SlevomatCodingStandard\Sniffs\TypeHints\ReturnTypeHintSniff::class);
    $services->set(\SlevomatCodingStandard\Sniffs\TypeHints\ReturnTypeHintSpacingSniff::class);
    $services->set(\SlevomatCodingStandard\Sniffs\TypeHints\UselessConstantTypeHintSniff::class);
    // - variables
    $services->set(\SlevomatCodingStandard\Sniffs\Variables\DisallowSuperGlobalVariableSniff::class);

    // - Programic specific rules
//    $services->set(\ProgramicCodingStandards\Sniffs\Functions\ForceAttributeCastingSniff::class);

    $services->remove(\PHP_CodeSniffer\Standards\Generic\Sniffs\PHP\RequireStrictTypesSniff::class);
    $services->remove(\SlevomatCodingStandard\Sniffs\Functions\StaticClosureSniff::class);
};
