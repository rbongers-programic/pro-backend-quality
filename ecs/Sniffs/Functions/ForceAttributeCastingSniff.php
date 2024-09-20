<?php declare(strict_types = 1);

namespace ProgramicCodingStandards\Sniffs\Functions;

use quality\ecs\CodeSniffer\Helper\PropertyHelper;
use quality\ecs\CodeSniffer\Helper\TokenHelper;
use quality\ecs\Sniffs\AbstractSniff;
use ProgramicCodingStandards\Sniffs\ClassRegistrationTrait;

class ForceAttributeCastingSniff extends AbstractSniff
{
    use ClassRegistrationTrait;

    /**
     * You SHOULD sort you constants, methods and properties in the right order.
     */
    public const CODE_SORT_MODEL = 'SortModel';

    /**
     * The message for the wrong sorting.
     */
    private const MESSAGE_SORT_MODEL = 'Please sort you methods in the right order.';

    private const NAME = 'ProgramicCodingStandards.Functions.ForceAttributeCasting';

    private function checkAndRegisterSortingProblems(array $foundContentsOrg, array $foundContentsSorted): void
    {
        $checkIndex = 0;

        dd($foundContentsOrg);

        foreach ($foundContentsOrg as $foundContentPos => $foundContent) {
            if ($foundContentsSorted[$checkIndex++] !== $foundContent) {
                dd('found..');
                $this->file->addWarning(
                    self::MESSAGE_SORT_MODEL,
                    $foundContentPos,
                    static::CODE_SORT_MODEL,
                );
            }
        }
    }

    /**
     * Loads every content for the token type and checks their sorting.
     *
     * @param int $token
     *
     * @return void
     */
    private function checkAndRegisterSortingProblemsOfTypes(int $token): void
    {
        $foundContentsOrg = $this->getContentsOfTokenType($token);

        $foundContentsSorted = $this->sortTokensWithoutPos($foundContentsOrg);

        $this->checkAndRegisterSortingProblems($foundContentsOrg, $foundContentsSorted);
    }

    /**
     * Returns the contents of the token type.
     *
     * @param int $token The contents with their position as array key.
     *
     * @return array
     */
    private function getContentsOfTokenType(int $token): array
    {
        $helper = new PropertyHelper($this->file);
        $tokenPoss = TokenHelper::findNextAll(
            $this->file,
            [$token],
            $this->stackPos + 1,
            $this->token['scope_closer'],
        );

        $foundContentsOrg = [];

        foreach ($tokenPoss as $tokenPos) {
            $tokenContentPos = $tokenPos;

            if (($token === T_VARIABLE) && (!$helper->isProperty($tokenPos))) {
                continue;
            }

            if ($token !== T_VARIABLE) {
                $tokenContentPos = $this->file->findNext([T_STRING], $tokenPos);
            }

            $foundContentsOrg[$tokenContentPos] = $this->tokens[$tokenContentPos]['content'];
        }

        return $foundContentsOrg;
    }

    /**
     * Processes the token.
     *
     * @return void
     */
    protected function processToken(): void
    {
        $tokenTypes = [T_CONST, T_FUNCTION, T_VARIABLE];

        foreach ($tokenTypes as $tokenType) {
            $this->checkAndRegisterSortingProblemsOfTypes($tokenType);
        }
    }

    /**
     * Sorts the tokens and returns them without their position as array keys.
     *
     * @param array $foundContentsOrg
     *
     * @return array
     */
    private function sortTokensWithoutPos(array $foundContentsOrg): array
    {
        $foundContentsSorted = $foundContentsOrg;

        natsort($foundContentsSorted);

        return array_values($foundContentsSorted); // "remove" indices

        return $foundContentsSorted;
    }
}
