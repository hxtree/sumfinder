# SumFinder

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/1809feca789a467bb0788240a9e07546)](https://app.codacy.com/manual/hxtree/sumfinder?utm_source=github.com&utm_medium=referral&utm_content=hxtree/sumfinder&utm_campaign=Badge_Grade_Dashboard)

***SumFinder*** accepts an array of integers and finds which operands sum equals the desired value.

![CI](https://github.com/hxtree/sumfinder/workflows/CI/badge.svg)

## Usage
```php
// setup SumFinder
$sum_finder = new SumFinder();
$sum_finder->setSumValue(10);
$sum_finder->setIntArray(1,1,2,4,4,5,5,5,6,7,9);
$sum_finder->setFormat(PRETTY);

// output all pairs (includes duplicates and the reversed order pairs)
echo $sum_finder->get(ALL_PAIRS) . PHP_EOL; /* returns [1,9], [1,9], [4,6], [4,6], [5,5], [5,5], [5,5], [5,5], [5,5], [5,5], [6,4], [6,4] */

// output unique pairs only once (removes the duplicate but includes the reversed ordered pairs),
echo $sum_finder->get(UNIQUE_COMBO) . PHP_EOL;  /* returns [1,9], [4,6], [5,5], [6,4], [9,1] */

// output the same combo pair only once (removes the reversed ordered pairs).
echo $sum_finder->get(UNIQUE) . PHP_EOL; /* returns [1,9], [4,6], [5,5] */
```

## Installation
Via Composer

SumFinder is available on Packagist.

Install with Composer:

```shell script
composer require hxtree/sumfinder
```

## Examples

Learn how SumFinder can be used through our [Docs](docs/README.md).