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
$num = 5; $prime = true;
for($i = 2; $i < $num; $i++) { if($num % $i == 0) { $prime = false; break; } }
echo $num . " " . ($prime ? "is a prime number." : "is not a prime number.");
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

$array = [1, 2, 3, 4]; $i = 0; while(isset($array[$i])) { $i++; } 
for($j = $i - 1; $j >= 0; $j--) { echo $array[$j]; }
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

$final = array();
foreach ($array as $value) {
    $found = false;
    foreach ($final as $existingValue) {
        
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
function permute($str, $l, $r) {
    if ($l == $r) echo $str . "\n"; 
    for ($i = $l; $i <= $r; $i++) {
        $str = swap($str, $l, $i);
        permute($str, $l + 1, $r);
        $str = swap($str, $l, $i); 
    }
}
function swap($str, $i, $j) {
    $arr = []; for ($k = 0; isset($str[$k]); $k++) $arr[$k] = $str[$k];
    $temp = $arr[$i]; $arr[$i] = $arr[$j]; $arr[$j] = $temp;
    $newStr = ""; for ($k = 0; isset($arr[$k]); $k++) $newStr .= $arr[$k];
    return $newStr;
}
$input = "ABC"; $n = 0; for (; isset($input[$n]); $n++);
permute($input, 0, $n - 1);

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
<h5> A palindrome is a word, phrase, number, or sequence of characters that reads the same backward as forward. In other words, it remains unchanged when its characters are reversed.</h5>  
<?php
function lps($str) {
    
    $n = 0;
    for ($i = 0; $str[$i] != ''; $i++) {
        $n++;
    }

    $L = array();
    for ($i = 0; $i < $n; $i++) {
        $L[$i] = array();
        for ($j = 0; $j < $n; $j++) {
            $L[$i][$j] = 0;
        }
    }

   
    for ($i = 0; $i < $n; $i++) {
        $L[$i][$i] = 1;
    }

    
    for ($cl = 2; $cl <= $n; $cl++) {
  
        for ($i = 0; $i < $n - $cl + 1; $i++) {
            $j = $i + $cl - 1;

       
            if ($str[$i] == $str[$j]) {
               
                if ($cl == 2) {
                    $L[$i][$j] = 2;
                }
               
                else {
                    $L[$i][$j] = $L[$i + 1][$j - 1] + 2;
                }
            }
           
            else {
              
                $L[$i][$j] = maxHelper($L[$i][$j - 1], $L[$i + 1][$j]);
            }
        }
    }


    return $L[0][$n - 1];
}


function maxHelper($a, $b) {
    if ($a > $b) {
        return $a;
    } else {
        return $b;
    }
}


$seq = 'BBABCBCAB';
echo "The length of the longest palindromic subsequence is " . lps($seq);
?>
<h4>13.Implement a Stack Using an Array</h4>
<h5>last in first out </h5>  
<?php
    $stack = [];
    $top = -1;
    
    function push(&$stack, &$top, $item) {
        $top++;
        $stack[$top] = $item;
    }
    
    function pop(&$stack, &$top) {
        if ($top >= 0) {
            $item = $stack[$top];
            unset($stack[$top]);
            $top--;
            return $item;
        } else {
            return "Stack is empty";
        }
    }
    
    function peek(&$stack, &$top) {
        return $top >= 0 ? $stack[$top] : "Stack is empty";
    }
    
    function isEmpty(&$top) {
        return $top == -1;
    }
    push($stack, $top, 10);
    push($stack, $top, 20);
    push($stack, $top, 30);
    
    echo pop($stack, $top) . "\n";  
    echo peek($stack, $top) . "\n";  
    ?>
    
<h4>14.implement Queue Using Two Stacks</h4>
<h5> 
</h5>  
<?php
$stack1 = [];
$stack2 = [];
$top1 = -1;
$top2 = -1;

function enqueue(&$stack1, &$top1, $value) {
    $top1++;
    $stack1[$top1] = $value;
}

function dequeue(&$stack1, &$top1, &$stack2, &$top2) {
    if (isEmpty($top1, $top2)) {
        return NULL;
    }

    if ($top2 == -1) {
        while ($top1 >= 0) {
            $top2++;
            $stack2[$top2] = $stack1[$top1];
            $top1--;
        }
    }

    $value = $stack2[$top2];
    $top2--;
    return $value;
}

function isEmptys(&$top1, &$top2) {
    return $top1 == -1 && $top2 == -1;
}

function displayQueue(&$stack1, &$top1, &$stack2, &$top2) {
    $result = [];

    for ($i = $top2; $i >= 0; $i--) {
        $result[] = $stack2[$i];
    }

    for ($i = 0; $i <= $top1; $i++) {
        $result[] = $stack1[$i];
    }

    return $result;
}
enqueue($stack1, $top1, 1);
enqueue($stack1, $top1, 2);
enqueue($stack1, $top1, 3);
echo "Dequeued: " . dequeue($stack1, $top1, $stack2, $top2) . "\n";
enqueue($stack1, $top1, 4);
echo "Dequeued: " . dequeue($stack1, $top1, $stack2, $top2) . "\n";
?>
 <h4>15.Implement a Simple Web Scraper Using cURL</h4>
 <?php

function my_strlen($str) {
    $len = 0;
    while (isset($str[$len])) {
        $len++;
    }
    return $len;
}

function my_strpos($haystack, $needle) {
    $haystackLen = my_strlen($haystack);
    $needleLen = my_strlen($needle);
    for ($i = 0; $i <= $haystackLen - $needleLen; $i++) {
        $found = true;
        for ($j = 0; $j < $needleLen; $j++) {
            if ($haystack[$i + $j] !== $needle[$j]) {
                $found = false;
                break;
            }
        }
        if ($found) {
            return $i;
        }
    }
    return -1;
}

function my_substr($str, $start, $length) {
    $result = "";
    for ($i = $start; $i < $start + $length; $i++) {
        if (isset($str[$i])) {
            $result .= $str[$i];
        }
    }
    return $result;
}

$url = "https://www.flipkart.com/";

//initlize the curl 
$ch = curl_init();

//sset the url 
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//xecute the http reaquest 
$html = curl_exec($ch);

//once responce is done you can close the session
curl_close($ch);

$startTag = "<title>";
$endTag   = "</title>";

$startPos = my_strpos($html, $startTag);
if ($startPos != -1) {
    
    $startPos += my_strlen($startTag);
    $endPos = my_strpos($html, $endTag);
    if ($endPos != -1) {
        $titleLength = $endPos - $startPos;
        $title = my_substr($html, $startPos, $titleLength);
        
        
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <title>" . $title . "</title>
</head>
<body>
    <h1>Page Title: " . $title . "</h1>
    <p>This page displays the title fetched from the remote URL.</p>
</body>
</html>";
    } else {
        echo "End tag not found.";
    }
} else {
    echo "Title tag not found.";
}
?>
</body>
</html>