<?php

namespace ProgramicCodingStandards\Sniffs;

use PHP_CodeSniffer\Util\Tokens;

trait ClassRegistrationTrait
{
    /**
     * Registers the tokens that this sniff wants to listen for.
     *
     * An example return value for a sniff that wants to listen for whitespace
     * and any comments would be:
     *
     * <code>
     *    return array(
     *            T_WHITESPACE,
     *            T_DOC_COMMENT,
     *            T_COMMENT,
     *           );
     * </code>
     *
     * @return int[]
     */
    public function register(): array
    {
        return Tokens::$ooScopeTokens;
    }
}
