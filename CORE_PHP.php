<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container d-flex justify-content-center">

     <h1 class="mt-2">CORE_PHP_LEARNING</h1>
  <div class="output mt-5">
  <h1>1. PHP SYNTAX WITH COMMENTS</h1>

<?php 
    ////////////////////////////////////////////////////////PHP BASIC SYNTAX ///////////////////////////////////
      $color=10; 
      $color2=20; 
      $jason=40; 
      
      if($color<$jason){
        echo "true";
      }else{
        echo "false";
      }
      echo "hii my name is deep jadav";
      
      echo "hii my name is deep jadav";

/////////////////////////////////////////////////////PHP VARIABLES/////////////////////////////////////////////////////////////
    ?>
    <br>
    <h1>2. PHP VARAIBLES</h1>
    <h5>STRTING VARIABLE</h5>
    <?php 
       $Name="deep jadav";
       $age="25";
       $city="Ahemdabad";

       echo "My Name is $Name and i am $age Years old were i am from Ahemdabad $city"  
    ?>
    <br>
    <h5>INTGEAR VARIABLE</h5>
    <?php 
       $a=20;
       $b=10;
       $c=30;
       echo $a+$b+$c;  
    ?>
    <h1>3. VARIABLE SCOPE</h1>
    <h5>GLOBAL SCOPE</h5>
<?php
$x = 5;//here we declared the global scope 
function jasonDurelo() {
  echo "$x";//since we x is global we cant assign the inside the local or fuction 
}
jasonDurelo();
echo "$x";
?>
<h5>LOCAL SCOPE</h5>
<?php
function jason2(){
  $ak="deep jadav is  name";
  echo $ak;
}
jason2();
echo "$ak"
?>
<h5>GLOBAL KEYWORD</h5>
<?php
//global keyword make galobally variable within inside fucntion 
$h=10;
function larset(){
global $h;
echo "$h";
}
larset();
echo "$h"
/////////////////////////////////////////////////PHP ECHO AND PRINT STATEMENT///////////////////////////////////
?>
<h1>4. ECHO AND PRINT STATEMENT</h1>
<h5>ECHO</h5>
<?php
echo "deep jadav uptake intern<br>";
echo "i am 25 years old<br>";
echo "i like programing<br>";
?>
<h5>VARIABLE WITH ECHO</h5>
<?php
$rahu="deep jadav";
$ketu="jadav deep";

echo "My Name is $rahu";
echo"<br>my name is $ketu";
?>
<h5>PRINT</h5>
<?php
$rahu1="deep jadav";
$ketu1="jadav deep";

print "My Name is $rahu";
print"<br>my name is $ketu";
/////////////////////////////////////////////PHP DATATYPES//////////////////////////////////
?>
<h1>5. PHP DATATYPES</h1>
<h5>STRING</h5>
<?php
$fas ="uptake infotech interns";
$dax="dhara is next level";

var_dump($fas);//used to return the datatypes 
echo "<br>";
var_dump($dax);
echo "<br>";
?>
<h5>INTGEAR</h5>
<?php
$fas1 =10;
$dax=20;

var_dump($fas1);//used to return the datatypes 
echo "<br>";
var_dump($dax);
echo "<br>";
echo $fas1+$dax;
?>
<h5>BOOLEAN</h5>
<?php
$fas3 =true;
$dax3=false;

var_dump($fas3);//used to return the datatypes 
echo "<br>";
var_dump($dax3);
echo "<br>";
?>
<h5>ARRAY</h5>
<?php
$fas4 =array(10,20,30,40,50);//intgear values 
$dax4= array('banana','india-parent','pakistan-child-father-india');//steing values 

var_dump($fas4);//used to return the datatypes 
echo "<br>";
var_dump($dax4);
echo "<br>";
?>
<h5>OBJECTS</h5>
<?php
class person{
  public $name="deep jadav";
}
$myperson1 = new person();
var_dump($myperson1)
?>
<h5>NULL VALUES</h5>
<?php
$fac=null;
var_dump($fac) 
?>
<h1>6. STRINGS</h1>
<?php
$facs="selmon bhoi vs lawrance bishnoi";
var_dump($facs); 
echo strlen($facs);//it will retun length of the string
echo strpos($facs,"bishnoi");//it find the matces snd returns the postion 
?>
<h5>MODIFY STRINGS</h5>
<?php
$facs="selmon bhoi vs lawrance bishnoi<br>";
echo strtoupper($facs);//converts strings in to the uppercase 
echo strtolower($facs);//converts in to small alphabests string 
echo strrev($facs);//takes the all string in tio reverse 
echo trim($facs);//it always avoaids the white spaces 
//////////////////////////////////////////////////////////////////////DAY-2-CORE_PHP//////////////////////////////////
?>
<h1 class="mt-2 text-center">DAY2_CORE_PHP</h1>
<h5>Concatenate Strings</h5>
<?php
$h1="deep jadav <br>";
$h2="jason Durelo";
$z=$h1.$h2;
echo $z;
?>
<h5>Slicing Strings</h5>
<?php
$h1="deep jadav <br>";
$h2="jason Durelo";
$z=$h1.$h2;
echo substr($z,0,27);
?>
<h5>PHP Numbers</h5>
<h6>INT-FLOAT-STRNG Numbers</h6>
<?php
$a1=10;
$a2=20.30;
$c="25";
var_dump($a1,$a2,$c);
?>
<h6>INFINITY</h6>
<?php
$S=1.9e411;
var_dump($S)
?>
<h5>PHP CASTING</h5>
<?php
$r=20;
$r11=20;
$r22=20;
$r33=20;
$r44=20;
$r=(string)$r;
$r11=(int)$r11;
$r22=(bool)$r22;
$r33=(float)$r33;
$r44=(object)$r44;
var_dump($r); 
var_dump($r11); 
var_dump($r22);
var_dump($r33);
var_dump($r44);
?>
<h5>PHP MATH FUNCTION</h5>
<h6>PI FUNCTION</h6>
<?php
echo(pi());
?>
<h6>MIN AND MAX FUNCTION</h6>
<?php
$deeps = array(10,20,30,40,50,-100);
echo(min($deeps));
$deepsa = array(10,20,30,40,50,-100);
echo(max($deepsa))
?>
<h6>MATH ABS</h6>
<?php
echo(abs(-6.7))
?>
<h6>MATH SQRT</h6>
<?php
echo(sqrt(64))
?>
<h6>MATH ROUND</h6>
<?php
echo(round(6.5))
?>
<h6>MATH RAND</h6>
<?php
echo(rand(10,30))
?>
<h5>PHP CONSTANTS</h5>
<?php
 const deep ="my name is volvo";
 echo deep;
?>
<h5>PHP OPERATORS</h5>
<h6>Arithmetic Operators</h6>
<?php
$ab=30;
$bc=50;
echo($ab+$bc);
echo"<br>";
echo($ab-$bc);
echo"<br>";
echo($ab*$bc);
echo"<br>";
echo($ab/$bc);
echo"<br>";
echo($ab%$bc);
echo"<br>";
echo($ab ** $bc);
?>
<h6>Assignment Operators</h6>
<?php
$ab=30;
$bc=50;
echo($ab+$bc);
echo"<br>";
echo($ab-$bc);
echo"<br>";
echo($ab*$bc);
echo"<br>";
echo($ab/$bc);
echo"<br>";
echo($ab%$bc);
echo"<br>";
echo($ab ** $bc);
?>
<h6>Comphersion Operators</h6>
<?php
$ab=30;
$bc=50;
var_dump($ab==$bc);//Equal to
echo"<br>";
var_dump($ab===$bc);//Identical 
echo"<br>";
var_dump($ab!=$bc);//Not Equal to
echo"<br>";
var_dump($ab>$bc);//Greater than
echo"<br>";
var_dump($ab<$bc);//less than
echo"<br>";
var_dump($ab>=$bc);//Greater than Equal to
echo"<br>";
var_dump($ab<=$bc);//Less than Equal to
?>
<h6> PHP Increment / Decrement Operators</h6>
<?php
$ab=30;
$bc=50;
var_dump(++$bc);//preiecremanret 
echo"<br>";
var_dump(--$bc);//preDecremanret 
?>
<h6>Logical Operators</h6>
<?php
$ab=30;
$bc=50;
if($ab>30 && $bc<40)
{
  echo"true";
}else{
  echo"false";
}
echo"<br>";
if($ab>30 || $bc<40)
{
  echo"true";
}else{
  echo"false";
} 
echo"<br>";
if (!($ab == 90)) {
  echo "Hello world!";
}
?>
<h6>Conditional Assignment Operators</h6>
<?php
$ajs=10;
$b=$ajs<10?"true":"false";
print ("Value of b is : " . $b);
?>
<h6>PHP Conditional Statements </h6>

  </div>
  </div>
</div>
</body>
</html>