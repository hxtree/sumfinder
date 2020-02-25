# Welcome to the SumFinder Documentation

SumFinder is designed to find what pairs of integers specified add up to match a sum. 

### Example
The following example shows how to use SumFinder get all pairs that add up to 10 from the numbers 1,1,2,4,4,5,5,5,6,7,9.
```
require __DIR__ . '/../vendor/autoload.php';

$sum_finder = new SumFinder();
$sum_finder->setSumValue(10);
$sum_finder->setIntArray(1,1,2,4,4,5,5,5,6,7,9);

echo $sum_finder->getAllPairs();
```