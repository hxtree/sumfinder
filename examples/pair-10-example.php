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

require __DIR__ . '/../vendor/autoload.php';

$sum_finder = new SumFinder();
$sum_finder->setSumValue(10);
$sum_finder->setIntArray(1,1,2,4,4,5,5,5,6,7,9);

/*
 * output all pairs (includes duplicates and the reversed order pairs)
 * [1,9], [1,9], [4,6], [4,6], [5,5], [5,5], [5,5], [5,5], [5,5], [5,5]
 */
echo $sum_finder->getAllPairs() . PHP_EOL;

/*
 * output unique pairs only once (removes the duplicates but includes the reversed ordered pairs)
 * [1,9], [4,6], [5,5], [6,4], [9,1]
 */
echo $sum_finder->getUniquePairs() . PHP_EOL;

/*
 * output the same combo pair only once (removes the reversed ordered pairs)
 * [1,9], [4,6], [5,5]
 */
echo $sum_finder->getComboPairs() . PHP_EOL;