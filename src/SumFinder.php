<?php
/**
 * This file is part of the SumFinder package.
 *
 *  (c) Matthew Heroux <matthewheroux@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace SumFinder;

/**
 * Class SumFinder
 * @package SumFinder
 */
class SumFinder
{
    // arity
    const NULLARY = 0;
    const UNARY = 1;
    const BINARY = 2;
    const TERNARY = 3;
    const QUATERNARY = 4;
    const QUINARY = 5;

    // format
    const PRETTY = 10;
    const JSON = 11;

    // pairing options
    const PAIRS_ALL = 30;
    const PAIRS_UNIQUE = 31;
    const PAIRS_COMBO = 32;

    // used to determine what sum is desired
    private $sum;

    // number of operands used in determining sum
    private $number_of_operands;

    // array of integers
    private $integers = [];

    // format set
    private $format;

    // storage of pairs found
    private $pairs;

    /**
     * SumFinder constructor.
     *
     * @param $number_of_operands
     */
    public function __construct($number_of_operands = self::BINARY)
    {
        // set default format
        $this->format = self::PRETTY;

        // set number of operands
        $this->setNumberOfOperands($number_of_operands);
    }

    /**
     * Set the number of operands used to find sum.
     *
     * @param int $number_of_operands
     * @return bool
     */
    public function setNumberOfOperands(int $number_of_operands = self::BINARY): bool
    {
        // TODO : Add support for more than Binary
        if (!is_integer($number_of_operands)) {
            return false;
        }

        $this->number_of_operands = $number_of_operands;

        return true;
    }

    /**
     * Set sum value used to resolve pairs.
     *
     * @param $sum
     * @return bool
     */
    public function setSumValue($sum): bool
    {
        if (is_numeric($sum)) {
            $this->sum = $sum;
            return true;
        }

        return false;
    }

    /**
     * Set operands used to resolve pairs.
     *
     * @param mixed ...$integers (must contain integers only)
     * @return bool
     * @throws \Exception
     */
    public function setIntArray(...$integers): bool
    {
        // reset integer array
        $this->integers = [];

        // validate each parameter passed
        foreach ($integers as $key => $integer) {
            // if is int add to array
            if (!is_int($integer)) {
                continue;
            }

            $this->integers[] = $integer;
        }

        return true;
    }

    /**
     * Sets object's output / __toString format.
     *
     * @param $format
     * @return bool
     */
    public function setFormat($format = self::JSON): bool
    {
        switch ($format) {
            case self::JSON:
                $this->format = self::JSON;
                break;
            case self::PRETTY:
                $this->format = self::PRETTY;
                break;
            default:
                return false;
        }
        return true;
    }

    /**
     * Get combo pairs
     *
     * @return string
     */
    public function getComboPairs(): string
    {
        return $this->getPairsByOption(self::PAIRS_COMBO);
    }

    /**
     * Get pairs based on option
     *
     * @param int $options
     * @return string
     */
    public function getPairsByOption(int $options = self::PAIRS_ALL): string
    {
        $this->pairs = $this->findPairs($options);

        return $this;
    }

    /**
     * Gets all pairs from integers where sum equals desired sum.
     *
     * @param int $option
     * @return array
     */
    public function findPairs(int $option): array
    {

        $pairs = [];

        // sort array from highest to lowest for faster calculations
        sort($this->integers);

        // store another version from low to highest while for faster calculations
        $integers_reversed = array_reverse($this->integers, true);

        // iterate through integers from lowest to highest
        foreach ($this->integers as $key_low => $integer_low) {

            // iterate through integers from highest to lowest
            foreach ($integers_reversed as $key_high => $integer_high) {

                // avoid comparing same key
                if ($key_low == $key_high) {
                    continue;
                }

                // sum up pair
                $pair_sum = $integer_low + $integer_high;

                // skip unnecessary iterations where sum will already be too low
                if ($pair_sum < $this->sum) {
                    //break;
                }

                // if operand sum equals desired sum add to list
                if ($pair_sum == $this->sum) {
                    $pairs[] = [$integer_low, $integer_high];
                }
            }

        }

        // return unique pairs
        if ($option == self::PAIRS_UNIQUE) {
            return array_unique($pairs, SORT_REGULAR);
        }

        // return combo pairs only
        if ($option == self::PAIRS_COMBO) {
            $combo_pairs = [];
            foreach ($pairs as $pair) {
                sort($pair, SORT_REGULAR);
                $combo_pairs[] = $pair;
            }
            return array_unique($combo_pairs, SORT_REGULAR);
        }

        return $pairs;
    }

    /**
     * Get pairs all
     *
     * @return string
     */
    public function getAllPairs(): string
    {
        return $this->getPairsByOption(self::PAIRS_ALL);
    }

    /**
     * Get pairs unique
     *
     * @return string
     */
    public function getUniquePairs(): string
    {
        return $this->getPairsByOption(self::PAIRS_UNIQUE);
    }

    /**
     * Return this object as string
     *
     * @return string
     */
    public function __toString(): string
    {
        switch ($this->format) {
            case self::JSON:
                return $this->jsonOutput();
                break;
            case self::PRETTY:
            default:
                return $this->prettyOutput();
        }
    }

    /**
     * Returns pairs/array in JSON format
     *
     * @return string
     */
    private function jsonOutput(): string
    {

        return json_decode($this->pairs);

    }

    /**
     * Returns $pairs in pretty format e.g. [1,9],[5,5],[9,1]
     *
     * @return string
     */
    private function prettyOutput(): string
    {
        $pretty_pairs = [];

        foreach ($this->pairs as $pair) {

            $pretty_pairs[] = '[' . implode(',', $pair) . ']';
        }

        return implode(', ', $pretty_pairs);
    }
}