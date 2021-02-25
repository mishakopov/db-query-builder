<?php

class MyClass{

    public $string;

    public function __construct()
    {
        $this->string = "Hello All. I am ";
    }

    public function printString($name){
        echo $this->string . $name;
    }
}
$obj = new MyClass();
$obj->printString('Scott');

echo "<br>";

class Factorial{
    public function CalculateFactorial($n){
        $res = 1;
        for ($i = 1; $i <= $n; $i++){
            $res *= $i;
        }
        return $res;
    }
}

$obj = new Factorial();
echo $obj->CalculateFactorial(5);

echo "<br>";

// class excercises 6

class Math{

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function plus(){
        return $this->x + $this->y;
        echo "<br>";
    }

    public function minus(){
        return $this->x - $this->y;
        echo "<br>";
    }

    public function multiply(){
        return $this->x * $this->y;
        echo "<br>";
    }

    public function divide(){
        return $this->x / $this->y;
        echo "<br>";
    }

}

$obj = new Math(3, 5);



echo "<br>";

class SortArray{
    public function sorting(array $arr){
        sort($arr);
        return $arr;
    }
}
$obj = new SortArray();
print_r($obj->sorting([13, 5324 , -23 , 2937]));

echo "<br>";

class MyDate{
    public function dateDif($date1, $date2){
        $date1 = date_create($date1);
        $date2 = date_create($date2);
        $interval = date_diff($date1, $date2);
        return $interval->format('%y Year %m Month %d Day' );
    }
}
echo (new MyDate())->dateDif('2018-10-25', '2010-08-24');

// write to show indexes

function specCount($smth){
    $arr = [21 , 43 , 235 , 223 , 5 ,1241, 25 ,5 , 24124, "sfs" , 0];
    $count = 0;
    foreach($arr as $value){
        if($value == $smth){
            $count++;
        }
    }
    return $count;
}
echo specCount('5');
