# SumFinder


***SumFinder*** accepts an array of integers and finds which operands sum equals the desired value.

![CI](https://github.com/hxtree/sumfinder/workflows/CI/badge.svg)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/1809feca789a467bb0788240a9e07546)](https://app.codacy.com/manual/hxtree/sumfinder?utm_source=github.com&utm_medium=referral&utm_content=hxtree/sumfinder&utm_campaign=Badge_Grade_Dashboard)

## Usage
```php
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

```

## Installation
Via Composer

SumFinder is available on [Packagist](https://packagist.org/packages/hxtree/sumfinder).

Install with Composer:

```shell script
composer require hxtree/sumfinder
```

## Examples

Learn how SumFinder can be used through our [Docs](docs/README.md).