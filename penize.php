<?php
// Creating an array with the given values
$values = [
    4270, 5260, 6369, 50239, 25150, 22833, 74645, 44923,
    36933, 16800, 7434, 3072, 971, 35779, 25784
];



$male_pujcky = [7434,6369,5260,4270,3072,971];
$splatky = [250,239,200,250,300,200];

// Function to sum all the elements in the array
function sumArray($array) {
    $sum = 0;
    foreach ($array as $value) {
        $sum += $value;
    }
    return $sum;
}

// Calculating the sum of all elements in the array
$totalSum = sumArray($values);

// Sorting the array from largest to smallest
rsort($values);

// Output the sorted values
foreach ($values as $value) {
    echo $value . "<br>";
}


echo "<br>";
echo "<br>";
$male_celkem = sumArray($male_pujcky);
$splatky_celkem = sumArray($splatky);
echo "Ještě k zaplacení malé: " . $male_celkem;
echo "<br>";
echo "Splátky celkem: " . $splatky_celkem;
echo "<br>";
echo "<br>";
// Output the sum of all numbers
echo "Ještě k zaplacení celkem: " . $totalSum;
?>
