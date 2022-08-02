<?php
/*
$a = "Akash Soni";
$b = 343245435;
$c = true;
$c2 = false;
$d = "245254353";

$x=10;
$x=$x+10; $x%=10;
$y=10;

if($x===$y) {
    echo "Equal";
}


$arr = [1244,4553,432,'Akash',true,false,'hello',"4234234"];
for($i=0;$i<sizeof($arr);$i++) {
    print($arr[$i].'<br>');
}

$arr2 = ['name'=>'Akash Soni','address'=>'Bangalore','age'=>25,'true/false'=>true];
print($arr2[0]);

foreach($array as $value) {
    echo $value;
}
*/

$G=30;
function cubefunc($x,$y,$z) {
    
    static $S=1;
    echo ++$S;
}

$cube = cubefunc(10,23,23);
$cube = cubefunc(10,23,23);
$cube = cubefunc(10,23,23);

/*
$array=array('name'=>'Akash Soni','address'=>'Bangalore','age'=>25,'true/false'=>true);
print($array['name']);

echo '<br><br><br>';

$age=14;
if($age>65) {
    echo "Retired";
} else if($age>40) {
    echo "senior";
} else if($age>18) {
    echo "adult";
} else {
    echo "Not eligible";
}

$book = 'Fullstack';
switch($book) {
    case 'MERN':
        echo "mern book";
        break;
    case 'Fullstack':
        echo "fullstack";
        break;
    default:
        echo "Not interested";
}

$x = 1;
while($x <= 5 || $x >= 0) {
   echo "The number is: $x <br>";
   $x++;
}


for($x=1;$x<=5;$x++) {
    echo "The number is: $x <br>";
}

$x=45;
do {
    echo "The number is: $x <br>";
    $x++;
}
while($x<10);
*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="text-align:center; font-weight: bold;"><?php /* printing greetings */ $result=print("Hello World"."My name is"."Akash Soni")  ?></div>
</body>
</html>