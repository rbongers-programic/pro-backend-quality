<?php

declare(strict_types=1);

namespace ProgramicCodingStandards\CodeSniffer\Helper;

use quality\ecs\CodeSniffer\CodeError;
use ProgramicCodingStandards\CodeSniffer\CodeWarning;
use PHP_CodeSniffer\Files\File;

class ExceptionHelper
{
    /**
     * The sniffed file.
     *
     * @var File
     */
    private File $file;

    /**
     * ExceptionHelper constructor.
     *
     * @param File $file The sniffed file.
     */
    public function __construct(File $file)
    {
        $this->file = $file;
    }

    /**
     * Registers the exception as an error or warning on the file.
     *
     * @param CodeWarning $exception The error which should be handled.
     *
     * @return bool Should this error be fixed?
     */
    public function handleException(CodeWarning $exception): bool
    {
        $isError = $exception instanceof CodeError;
        $isFixable = $exception->isFixable();
        $method = 'add';

        if ($isFixable) {
            $method .= 'Fixable';
        }

        $method .= $isError ? 'Error' : 'Warning';

        return $this->file->$method(
            $exception->getMessage(),
            $exception->getStackPosition(),
            $exception->getCode(),
            $exception->getPayload(),
        );
    }
}
