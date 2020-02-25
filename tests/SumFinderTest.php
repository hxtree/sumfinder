<?php
/**
 * This file is part of the SumFinder package.
 *
 *  (c) Matthew Heroux <matthewheroux@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace SumFinder\Tests;

use PHPUnit\Framework\TestCase;
use SumFinder\SumFinder;

final class SumFinderTest extends TestCase
{
    public function testCanInstantiate()
    {

        $sum_finder = new SumFinder();
        $this->assertInstanceOf(SumFinder::class, $sum_finder);
    }
}