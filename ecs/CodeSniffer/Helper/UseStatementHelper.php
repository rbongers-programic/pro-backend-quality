<?php

declare(strict_types=1);

namespace ProgramicCodingStandards\CodeSniffer\Helper;

use PHP_CodeSniffer\Files\File;
use SlevomatCodingStandard\Helpers\UseStatement;
use SlevomatCodingStandard\Helpers\UseStatementHelper as BaseHelper;

class UseStatementHelper extends BaseHelper
{
    /**
     * Returns the type for the given use statement.
     *
     * @param File $file
     * @param UseStatement $useStatement
     *
     * @return string
     */
    public static function getType(File $file, UseStatement $useStatement): string
    {
        // Satisfy php md
        unset($file);

        $type = $useStatement->getType();

        return $type;
    }

    /**
     * Returns the type name for the given use statement.
     *
     * @param File $file
     * @param UseStatement $useStatement
     *
     * @return string
     */
    public static function getTypeName(File $file, UseStatement $useStatement): string
    {
        return UseStatement::getTypeName(static::getType($file, $useStatement)) ?? '';
    }
}
