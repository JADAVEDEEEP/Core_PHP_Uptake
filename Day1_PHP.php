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

  <div class="output">
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
?>


  </div>
  </div>
</div>
</body>
</html>