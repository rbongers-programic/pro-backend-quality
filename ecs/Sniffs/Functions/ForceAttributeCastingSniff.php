<?php declare(strict_types = 1);

namespace ProgramicCodingStandards\Sniffs\Functions;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;
use SlevomatCodingStandard\Helpers\SuppressHelper;
use SlevomatCodingStandard\Helpers\TokenHelper;

class ForceAttributeCastingSniff implements Sniff
{
    private const NAME = 'ProgramicCodingStandards.Functions.ForceAttributeCasting';

    /**
     * Returns the token types that this sniff is interested in.
     *
     * @return array(int)
     */
    public function register(): array
    {
        dd('register');
        return TokenHelper::$functionTokenCodes;
    }

    /**
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingNativeTypeHint
     * @param File $phpcsFile
     * @param int $functionPointer
     */
    public function process(File $phpcsFile, $functionPointer): void
    {
        $phpcsFile->addError(
            sprintf('Useless %s %s', SuppressHelper::ANNOTATION, self::NAME),
            $functionPointer,
            self::CODE_USELESS_SUPPRESS
        );
    }
}
