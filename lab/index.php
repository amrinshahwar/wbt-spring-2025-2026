<?php
//1
$length = 15;
$width = 5;

$area = $length * $width;
$perimeter = 2 * ($length + $width);

echo "Area = " . $area . "<br>";
echo "Perimeter =" . $perimeter;

echo "<br>";

//2
$amount = 500;
$vat = 0.15 * $amount;

echo "VAT = " . $vat;

echo "<br>";

//3
$num = 45;

if($num%2 == 0){
    echo "odd";
}
else{
    echo "even";
}

echo "<br>";

//4
$num1 = 7;
$num2 = 3;
$num3 = 9;

if($num1>$num2 && $num1>$num3){
    echo $num1." is largest";
}
else if($num2>$num1 && $num2>$num3){
    echo $num2." is largest";
}
else{
    echo $num3." is largest";
}

echo "<br>";

//5
for ($i=10; $i<=100; $i++) {
    if ($i%2 != 0) {
        echo  $i. " " ;
    }
}

echo "<br>";

//6
$fruits = array("Apple", "Orange", "Litchi", "Mango");
$search = "Litchi";
$found = false;

foreach($fruits as $value){
    if($value == $search){
        $found = true;
        break;
    }
}
if($found){
    echo "Element is found";
}
else{
    echo "Element not found";
}

echo "<br>";

//7
for($i=1; $i<=3; $i++){
    for($j=1; $j<=$i; $j++){
        echo "*";
    }
    echo "<br>";
}

echo "<br>";

for($i=3; $i>=1; $i--){
    for($j=1; $j<=$i; $j++){
        echo $j. " ";
    }
    echo "<br>";
}

echo "<br>";

$char = "A";
for($i=1; $i<=3; $i++){
    for($j=1; $j<=$i; $j++){
        echo $char. " ";
        $char++;
    }
    echo "<br>";
}


?>