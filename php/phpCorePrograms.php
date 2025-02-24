<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>  php core programs </h1>
<h4>1. Factorial of a Number</h4>
<h5> Factorial is the product of all positive integers from 1 up to a given number 
    factors : 6*5*4*3*2*1=720
</h5>
    <?php
    $num = 6;
    $fact =1; 
      
    for($i=$num;$i>0;$i--){
    $fact*=$i;
    }
    echo "fact of 6 is:$fact";
     
    ?>
 <h4>2. Fibonacci Series</h4>
  <h5>The Fibonacci series is a numerical sequence in which each number is the sum of the two numbers that come before it.</h5>  
  <?php
  $number=0;
  $a=0;
  $b=1;
  echo"\n";
  echo $a.$b;
  while($number<10){
    $c=$a+$b;
    echo $c;
    $a=$b;
    $b=$c;
    $number=$number+1;
  }
  ?>
   <h4>3.Check Prime Number</h4>
   <h5>its postiive integear that only divisible by 1</h5>  
<?php

$num = 5;
$isPrime = true;

for ($i = 2; $i <= sqrt($num); $i++) {
    if ($num % $i == 0) {
        $isPrime = false;
        break;
    }
}
if ($isPrime) {
    echo $num . " is a prime number.";
} else {
    echo $num . " is not a prime number.";
}

?>
<h4>4.Swap Two Numbers</h4>
<h5>Swap is the process of exchanging the values of two variables</h5>  
<?php
$number_one=10;
$number_two=20;
echo"before swap : $number_one<br>";
echo"before swap: $number_two<br>";
$temp_num=$number_one;//it is number 10 right now 
$number_one=$number_two;//swap it number_one is become 20 now were temp number_on is already 10
$number_two=$temp_num;//and now we passed that temp_number who aslredy declared as 10 that apply to number_two
echo"after swap swap : $number_one<br>";
echo"after swap: $number_two";
?>
<h4>5. Reverse an Array</h4>
<h5>we will gonna store the array values in to reversse order</h5>  
<?php
$array = array(1, 2, 3, 4);
$size = sizeof($array);

for($i=$size-1; $i>=0; $i--){
    echo $array[$i];
}
?>
<h4>6.Count Words in a Stringc</h4>
<h5>we will count the words based on string and return arrayas num </h5>  
<?php
$string = "hi deep jadav is my name";
$wordCount = 0;
$words = explode(" ", $string);

foreach ($words as $word) {
    if ($word != "") {
        $wordCount++;
    }
}
echo "Number of words: $wordCount";
?>
<h4>7.Find the length of n string</h4>
<h5>will retrun the length of n string</h5>  
<?php
$string = "deep jadav is my name";
$length = 0;
for ($i = 0; isset($string[$i]); $i++) {
    $length++;
}
echo "Length using loop: $length";
?>
<h4>8.Remove Duplicates from an Array</h4>
<h5>created new array from exixting array and match the comphersion</h5>  
<?php
$array = array(10, 10, 20, 30, 50, 50, 60, 70);
//intalize new empty array
$final = array();
foreach ($array as $value) {
    $found = false;
    foreach ($final as $existingValue) {
        //apply comphersion 
        if ($existingValue == $value) {
            $found = true;
            break;
        }
    }
    if (!$found) {
        $final[] = $value;
    }
}
print_r($final);
?>
<h4>9.Check if a Year is Leap Year</h4>
<h5>we took 2025 as value but its not leap year accrodig to rule of leap year divide by 4 </h5>  
<?php 
$Year = 2025;
if($Year%4==0){
echo "its leap year";
}else{
    echo "its not leap year";
}
?>
<h4>10.Find All Permutations of a String</h4>
<h5>still in progresss</h5> 
<?php

?> 
<h4>11.Check if a Number is an Armstrong Number</h4>
<h5>the num is sum of all his own digits if we take exammple of 153 </h5> 
<?php  
$num=153;  
$total=0;  
$x=$num;  
while($x!=0)  
{  
$rem=$x%10;  
$total=$total+$rem*$rem*$rem;
$x=$x/10;  
}  
if($num==$total)  
{  
echo "Yes it is an Armstrong number";  
}  
else  
{  
echo "No it is not an armstrong number";  
}  
?> 
<h4>12.Find the Longest Palindromic Substrin</h4>
<h5> </h5>  
<h4>13.Implement a Stack Using an Array</h4>
<h5> </h5>  
<?php
    class StackUsingArray {
        private $stack;
        private $top;
    
        public function __construct() {
            $this->stack = [];
            $this->top = -1;
        }
    
        public function push($item) {
            $this->top++;
            $this->stack[$this->top] = $item;
        }
    
        public function pop() {
            if ($this->top >= 0) {
                $item = $this->stack[$this->top];
                unset($this->stack[$this->top]);
                $this->top--;
                return $item;
            } else {
                return "Stack is empty";
            }
        }
    
        public function peek() {
            if ($this->top >= 0) {
                return $this->stack[$this->top];
            } else {
                return "Stack is empty";
            }
        }
    
        public function isEmpty() {
            return $this->top == -1;
        }
    }
    
    $stack = new StackUsingArray();
    $stack->push(10);
    $stack->push(20);
    $stack->push(30);
    
    echo $stack->pop() . "\n"; 
    echo $stack->peek() . "\n"; 
?>
<h4>14.implement Queue Using Two Stacks</h4>
<h5> </h5>  
<?php
 ?>
</body>
</html>