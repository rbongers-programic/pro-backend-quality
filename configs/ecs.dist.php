<?php

declare(strict_types=1);

namespace Programic\QualityControl\EasyCodingStandard;

use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

function ecsSets(): array
{
    return [SetList::PSR_12, SetList::CLEAN_CODE];
}

function ecsRules(): array
{
    $rules = [];

    // phpcsfixer
    $rules[] = \PhpCsFixer\Fixer\Alias\MbStrFunctionsFixer::class;
    $rules[] = \PhpCsFixer\Fixer\Basic\BracesFixer::class;
    $rules[] = \PhpCsFixer\Fixer\ClassNotation\OrderedClassElementsFixer::class;
    $rules[] = \PhpCsFixer\Fixer\FunctionNotation\ReturnTypeDeclarationFixer::class;
    $rules[] = \PhpCsFixer\Fixer\Strict\StrictComparisonFixer::class;
    $rules[] = \PhpCsFixer\Fixer\Strict\StrictParamFixer::class;
    $rules[] = \PhpCsFixer\Fixer\Whitespace\BlankLineBeforeStatementFixer::class;

    // slevomat
    // - arrays
    $rules[] = \SlevomatCodingStandard\Sniffs\Arrays\DisallowImplicitArrayCreationSniff::class;
    $rules[] = \SlevomatCodingStandard\Sniffs\Arrays\MultiLineArrayEndBracketPlacementSniff::class;
    $rules[] = \SlevomatCodingStandard\Sniffs\Arrays\SingleLineArrayWhitespaceSniff::class;
    $rules[] = \SlevomatCodingStandard\Sniffs\Arrays\TrailingArrayCommaSniff::class;

    // - classes
    $rules[] = \SlevomatCodingStandard\Sniffs\Classes\ClassConstantVisibilitySniff::class;
    $rules[] = \SlevomatCodingStandard\Sniffs\Classes\DisallowMultiConstantDefinitionSniff::class;
    $rules[] = \SlevomatCodingStandard\Sniffs\Classes\DisallowMultiPropertyDefinitionSniff::class;
    $rules[] = \SlevomatCodingStandard\Sniffs\Classes\ModernClassNameReferenceSniff::class;
    $rules[] = \SlevomatCodingStandard\Sniffs\Classes\PropertyDeclarationSniff::class;

    // - control structures
    $rules[] = \SlevomatCodingStandard\Sniffs\ControlStructures\AssignmentInConditionSniff::class;
    $rules[] = \SlevomatCodingStandard\Sniffs\ControlStructures\DisallowContinueWithoutIntegerOperandInSwitchSniff::class;
    $rules[] = \SlevomatCodingStandard\Sniffs\ControlStructures\DisallowYodaComparisonSniff::class;
    $rules[] = \SlevomatCodingStandard\Sniffs\ControlStructures\NewWithParenthesesSniff::class;
    $rules[] = \SlevomatCodingStandard\Sniffs\ControlStructures\RequireNullCoalesceEqualOperatorSniff::class;
    $rules[] = \SlevomatCodingStandard\Sniffs\ControlStructures\RequireNullCoalesceOperatorSniff::class;

    // - exceptions
    $rules[] = \SlevomatCodingStandard\Sniffs\Exceptions\DeadCatchSniff::class;

    // - functions
    $rules[] = \SlevomatCodingStandard\Sniffs\Functions\StrictCallSniff::class;
    $rules[] = \SlevomatCodingStandard\Sniffs\Functions\StaticClosureSniff::class;
    $rules[] = \SlevomatCodingStandard\Sniffs\Functions\UnusedParameterSniff::class;
    $rules[] = \SlevomatCodingStandard\Sniffs\Functions\UselessParameterDefaultValueSniff::class;

    // - namespaces
    $rules[] = \SlevomatCodingStandard\Sniffs\Namespaces\UseDoesNotStartWithBackslashSniff::class;
    $rules[] = \SlevomatCodingStandard\Sniffs\Namespaces\UselessAliasSniff::class;

    // - php
    $rules[] = \SlevomatCodingStandard\Sniffs\PHP\ShortListSniff::class;
    $rules[] = \SlevomatCodingStandard\Sniffs\PHP\TypeCastSniff::class;


    // - typehints
    $rules[] = \SlevomatCodingStandard\Sniffs\TypeHints\NullableTypeForNullDefaultValueSniff::class;
    $rules[] = \SlevomatCodingStandard\Sniffs\TypeHints\ParameterTypeHintSniff::class;
    $rules[] = \SlevomatCodingStandard\Sniffs\TypeHints\ParameterTypeHintSpacingSniff::class;
    $rules[] = \SlevomatCodingStandard\Sniffs\TypeHints\PropertyTypeHintSniff::class;
    $rules[] = \SlevomatCodingStandard\Sniffs\TypeHints\ReturnTypeHintSniff::class;
    $rules[] = \SlevomatCodingStandard\Sniffs\TypeHints\ReturnTypeHintSpacingSniff::class;
    $rules[] = \SlevomatCodingStandard\Sniffs\TypeHints\UselessConstantTypeHintSniff::class;

    // - variables
    $rules[] = \SlevomatCodingStandard\Sniffs\Variables\DisallowSuperGlobalVariableSniff::class;

    return $rules;
}

function ecsSkips(): array
{
    $skips = [];

    $skips[] = \PHP_CodeSniffer\Standards\Generic\Sniffs\PHP\RequireStrictTypesSniff::class;
    $skips[] = \SlevomatCodingStandard\Sniffs\Functions\StaticClosureSniff::class;

    return $skips;
}
