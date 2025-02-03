<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
body  {  background-color: black;
  font-family: Verdana, sans-serif;
  font-size: 16px;
  color: gray;  }
h1 { font-family: Georgia, serif;
  font-size: 40px;
  color: white;}
h5 {color:slategrey;}
h5{font-weight: bold;}
h5 {font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif}

h1 {
  box-shadow: 10px 5px 5px red; 
}
h2{
  box-shadow: 10px 5px 5px white;
  color: linear-gradient(to right, rgba(255,0,0,0), rgb(245, 34, 34));
}
.reg{
  color: red;
  font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}
form{
  margin:10% auto 0 auto;
	padding:30px;
	width:400px;
	height:auto;
	overflow:hidden;
	background:white;
	border-radius:10px;
}
form label {
	font-size:14px;
	color:darkgray;
	cursor:pointer;
}

form label,
form input {
	float:left;
	clear:both;
}

form input {
	margin:15px 0;
	padding:15px 10px;
	width:100%;
	outline:none;
	border:1px solid #bbb;
	border-radius:20px;
	display:inline-block;
	-webkit-box-sizing:border-box;
	   -moz-box-sizing:border-box;
	        box-sizing:border-box;
    -webkit-transition:0.2s ease all;
	   -moz-transition:0.2s ease all;
	    -ms-transition:0.2s ease all;
	     -o-transition:0.2s ease all;
	        transition:0.2s ease all;
}

form input[type=text]:focus,
form input[type="password"]:focus {
	border-color:cornflowerblue;
}

input[type=submit] {
	padding:15px 50px;
	width:auto;
	background:#1abc9c;
	border:none;
	color:white;
	cursor:pointer;
	display:inline-block;
	clear:right;
	-webkit-transition:0.2s ease all;
	   -moz-transition:0.2s ease all;
	    -ms-transition:0.2s ease all;
	     -o-transition:0.2s ease all;
	        transition:0.2s ease all;
}

#logo {
	margin:0 auto;
	width:200px;
	font-family:'Lily Script One', cursive;
	font-size:60px;
	font-weight:bold;
	text-align:center;
	color:lightgray;
	-webkit-transition:0.2s ease all;
	   -moz-transition:0.2s ease all;
	    -ms-transition:0.2s ease all;
	     -o-transition:0.2s ease all;
	        transition:0.2s ease all;
}

#logo:hover {
	color:cornflowerblue;
}
</style>
</head>
<body>
<div class="container shadow-lg">
      <h2 class="reg mt-5">PHP TUTORIAL</h2>
     <h2 class="mt-4">DAY_1_CORE_PHP_LEARNING</h2>
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
<h2 class="mt-2 text-center">DAY2_CORE_PHP</h2>
<h1>7. Concatenate Strings</h1>
<?php
$h1="deep jadav <br>";
$h2="jason Durelo";
$z=$h1.$h2;
echo $z;
?>
<h1>8. Slicing Strings</h1>
<?php
$h1="deep jadav <br>";
$h2="jason Durelo";
$z=$h1.$h2;
echo substr($z,0,27);
?>
<h1>9. PHP Numbers</h1>
<h5>INT-FLOAT-STRNG Numbers</h5>
<?php
$a1=10;
$a2=20.30;
$c="25";
var_dump($a1,$a2,$c);
?>
<h5>INFINITY</h5>
<?php
$S=1.9e411;
var_dump($S)
?>
<h1>10. PHP CASTING</h1>
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
<h1>11. PHP MATH FUNCTION</h1>
<h5>PI FUNCTION</h5>
<?php
echo(pi());
?>
<h5>MIN AND MAX FUNCTION</h5>
<?php
$deeps = array(10,20,30,40,50,-100);
echo(min($deeps));
$deepsa = array(10,20,30,40,50,-100);
echo(max($deepsa))
?>
<h5>MATH ABS</h5>
<?php
echo(abs(-6.7))
?>
<h5>MATH SQRT</h5>
<?php
echo(sqrt(64))
?>
<h5>MATH ROUND</h5>
<?php
echo(round(6.5))
?>
<h5>MATH RAND</h5>
<?php
echo(rand(10,30))
?>
<h1>12. PHP CONSTANTS</h1>
<?php
 const deep ="my name is volvo";
 echo deep;
?>
<h1>13. PHP OPERATORS</h5>
<h5>Arithmetic Operators</h5>
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
<h5>Assignment Operators</h5>
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
<h5>Comphersion Operators</h5>
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
<h5> PHP Increment / Decrement Operators</h5>
<?php
$ab=30;
$bc=50;
var_dump(++$bc);//preiecremanret 
echo"<br>";
var_dump(--$bc);//preDecremanret 
?>
<h5>Logical Operators</h5>
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
<h5>Conditional Assignment Operators</h5>
<?php
$ajs=10;
$b=$ajs<10?"true":"false";
print ("Value of b is : " . $b);
////////////////////////////////////////////////////////////////////DAY-3_CORE_PHP////////////////////////////////////////////
?>
<h2 class="mt-3">DAY_3_CORE_PHP</h2>
<h1 class="mt-5">14. CONDTINAL STATEMETNS</h1>
<h5 class="mt-5">IF STATAMENT</h5>
<?php
$person="deep jadav";
$age=25;
if($person="deep jadav" && $age>25)
{
  echo"You are Login";
}else{
  echo"not Allowed";
}
?>
<h5 class="mt-2">IF OPERATORS</h5>
<?php
$person=100;
$age=100;
if($age == 15)
{
  echo"You are Adult";
}else{
  echo"not Adult <br>";
}
if($age === $person)
{
  echo"same same<br>";
}else{
  echo"diffrent";
}
if($age != 15)
{
  echo"valid Not operator<br>";
}else{
  echo"Not Right Operator";
}
if($age >15)
{
  echo"right Age<br>";
}else{
  echo"Not Right";
}
if($age<100)
{
  echo"right Age";
}else{
  echo"Not Right";
}
?>
<h5 class="mt-2">IF-ELSE STATEMENT</h5>
<?php
$person="deep jadav";
$age=25;
if($person="deep jadav" && $age>25)
{
  echo"You are Login";
}else{
  echo"not Allowed";
}
?>
<h5 class="mt-2">IF-ELSE SHORT HAND</h5>
<?php
$d=10;
if($d<=10)echo"kese he be";
?>
<h5 class="mt-2">NESTED IF-ELSE</h5>
<?php
$age=12;
if($age<=12){
  echo "correct age <br>";
  if($age=10){
   echo"Hakuna Matata";
  }else{
    echo"Matata Hakuna";
  }
  
}
?>
<h1 class="mt-5">15. SWTICH STATEMENT</h1>
<?php
$swith="red ";
switch($swith){
  case "red":
    echo "Your favorite color is red!";
    break;
  case "blue":
    echo "Your favorite color is blue!";
    break;
  case "green":
    echo "Your favorite color is green!";
    break;
  default:
    echo "Your favorite color is neither red, blue, nor green!";
}
?>
<h1 class="mt-5">16. PHP LOOPS</h1>
<h5 class="mt-3">WHILE LOOP</h5>
<?php
$i=1;
while($i<6){
echo "*";
$i++;
}
?>
<h5 class="mt-3">DO WHILE</h5>
<?php
$i = 1;
do {
  echo $i;
  $i++;
} while ($i < 6);
?>  
<h5 class="mt-3">FOR LOOP</h5>
<?php
for($i=0;$i<=5;$i++)
{
  for($j=0;$j<=$i;$j++){
    echo"*";
  }
  echo "</br>";
}
?>
<h5 class="mt-3">FOR EACH LOOP</h5>
<?php
$colors=array('lala','lajapat','ray','jay','ho');
foreach ($colors as $x) {
echo "$x <br>";
}
?>
<h5 class="mt-3">BREAK STATEMENT</h5>
<?php
for($i=0;$i<=5;$i++)
{
 if($i==3){
  break;
 }
 echo"$i";
}
?>
<h5 class="mt-3">COUNTINIUE STATEMENT</h5>
<?php
for($i=0;$i<=5;$i++)
{
 if($i==3){
  continue;
 }
 echo"$i";
}
?>
<h1 class="mt-5">17. PHP FUNCTION</h1>
<h5 class="mt-3">Simple Addtion using passing argument and paremeter directly to the function and alos rertun the value so almost all secnario off the function would be cover inside the exectution </h5>
<?php
function mytest($a=10,$b=20){
 $z1=$a+$b;
 return $z1;
}
echo(mytest());
?>
<h1 class="mt-5">18. PHP ARRAYS</h1>
<h5 class="mt-3">NUMBER ARRAY</h5>
<?php
$car=array(10,20,30,40,50);
foreach ($car as $off) {
  echo "$off <br>";
}

?>
<h5 class="mt-3">STRING ARRAY</h5>
<?php
$car=array("DEEP","ANNU","MODI");
foreach ($car as $off) {
  echo "$off <br>";
}
?>
<h5 class="mt-3">ARRAY FUNCTION</h5>
<?php
$car=array(10,20,30,40,50);
echo(count($car));
////////////////////////////////////////////////////////DAY-4-PHP////////////////////////////////////
?>
<h2 class="mt-3">DAY_4_CORE_PHP</h2>
<h5 class="mt-5">INDEXED ARRAY</h5>
<?php
$cas=array('<br>deep','kal','jason');
var_dump($cas)
?>
<h5 class="mt-3">ASSOOCIATIVE ARRAY</h5>
<?php 
$cas1=array('Name'=>'Deep','Age'=>'24');
echo $cas1['Name'];
echo $cas1['Age'];
?>
<h5 class="mt-3">CREATE ARRAY</h5>
<?php
$cast=array(
  'Name'=>'jadav deep',
   'Age'=>24,
   'city'=>'Ahemdabad'
);
  var_dump($cast); 
?>
<h5 class="mt-3">UPDATE ARRAY</h5>
<?php
$cast=array(
  'Name'=>'jadav deep',
   'Age'=>24,
   'city'=>'Ahemdabad'
);
  $cast['Name']='jagrtu';
  var_dump($cast); 
?>
<h5 class="mt-3">ADD ARRAY</h5>
<?php
$case=array('deep','jadav');
array_push($case,'jason','nandan');
var_dump($case);
?>
<h5 class="mt-3">REMOVE ARRAY</h5>
<?php
$case=array('deep','jadav');
var_dump(array_splice($case,1,1));
?>
<h5 class="mt-3">SORTING ARRAYS ASC</h5>
<?php
$arr = array(40, 61, 2, 22, 13);
sort($arr);
print_r($arr);
?>
<h5 class="mt-3">SORTING ARRAYS DESC</h5>
<?php
$arr = array(40, 61, 2, 22, 13);
rsort($arr);
print_r($arr);
?>
<h5 class="mt-3">MULTIDIMATIONAL ARRAYS</h5>
<?php
$cad=array(array( 'Name'=>'jason'),array('Age'=>25));
print_r($cad);
?>
<h1 class="mt-5">19. PHP SUPERGLOBAL</h1>
<h5 class="mt-5">$GLOBAL</h5>
<?php
$x=75;
function myfunction(){
  echo $GLOBALS['x'];
}
myfunction();
?>
<h5 class="mt-3">$_SERVER</h5>
<?php
echo $_SERVER['PHP_SELF'];
echo "<br>";
echo $_SERVER['SERVER_NAME'];
echo "<br>";
echo $_SERVER['HTTP_HOST'];
echo "<br>";
echo $_SERVER['HTTP_REFERER'];
echo "<br>";
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];
?>
<h5 class="mt-3">$_REQUEST</h5>
<form method="post" action="demo_request.php" class="border text-center">
  <div class="mt-5 mb-5 shadow-lg">
  Name: <input type="text" name="fname">
  <input type="submit" class="btn btn-danger">
</form>
</div>
<h5 class="mt-3">$_POST</h5>
<form method="post" action="demo_request.php" class="border text-center">
  <div class="mt-5 mb-5 shadow-lg">
  Name: <input type="text" name="fname">
  <input type="submit" class="btn btn-danger">
</form>
</div>
<h5 class="mt-3">$_GET</h5>
<form method="post" action="demo_request.php" class="border text-center">
  <div class="mt-5 mb-5 shadow-lg">
  Name: <input type="text" name="fname">
  <input type="submit" class="btn btn-danger">
</form>
</div>
<h1 class="mt-5">20. PHP REGULAR EXPRESSION</h1>
<h5 class="mt-4">PREG_MATCH</h5>
<?php
$deep="Deep Jadav";
$parrten="/deep/i";
echo preg_match($parrten,$deep)
?>
<h5 class="mt-4">PREG_MATCH_ALL</h5>
<?php
$str = "The rain in SPAIN falls mainly on the plains.";
$pattern = "/ain/i";
echo preg_match_all($pattern, $str);
?>
<h5 class="mt-4">PREG_MATCH_ALL</h5>
<?php
$str = "The rain in SPAIN falls mainly on the plains!";
$pattern = "/SPAIN/i";
echo preg_replace($pattern,'INDIA', $str);
?>
 <!----------------------------------------------------------------DAY_5_CORE_PHP------------------------------------------------------->
  
<h2 class="mt-4">DAY_5_CORE_PHP_LEARNING</h2>
<h2 class="reg mt-5">PHP FORMS INFORMATION</h2>
<h1 class="mt-5">21. PHP FORM HANDLING</h1>
<p class="text-white mt-4 opacity-40 opacity-75">The PHP superglobals $_GET and $_POST are used to collect form-data.
When the user fills out the form above and clicks the submit button, the form data is sent for processing to a PHP file named "welcome.php". The form data is sent with the HTTP POST method.

To display the submitted data you could simply echo all the variables.

The "welcome.php" looks like this:
</p>
  <h1 class="mt-5">22. PHP FORM VALIDATION</h1>
  The HTML form we will be working at in these chapters, contains various input fields: required and optional text fields, radio buttons, and a submit button:
</body>
 <h1 class="mt-5">23. PHP FORM REQIRED</h1>
 <P class="text-white opacity-75">From the validation rules table on the previous page, we see that the "Name", "E-mail", and "Gender" fields are required. These fields cannot be empty and must be filled out in the HTML form.

Field	Validation Rules
Name	Required. + Must only contain letters and whitespace
E-mail	Required. + Must contain a valid email address (with @ and .)
Website	Optional. If present, it must contain a valid URL
Comment	Optional. Multi-line input field (textarea)
Gender	Required. Must select one
In the previous chapter, all input fields were optional.

In the following code we have added some new variables: $nameErr, $emailErr, $genderErr, and $websiteErr. These error variables will hold error messages for the required fields. We have also added an if else statement for each $_POST variable. This checks if the $_POST variable is empty (with the PHP empty() function). If it is empty, an error message is stored in the different error variables, and if it is not empty, it sends the user input data through the test_input() function:</P>
<h1 class="mt-5">24. PHP FORM URL/NAME</h1>
<h5 class="mt-4">VALIDATE_NAME</h5>
<P class="text-white opacity-75">
The easiest and safest way to check whether an email address is well-formed is to use PHP's filter_var() function.

In the code below, if the e-mail address is not well-formed, then store an error message:

$email = test_input($_POST["email"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format";
}
</P>
<h5 class="mt-4">VALIDATE_EMAIL</h5>
<P class="text-white opacity-75">
The easiest and safest way to check whether an email address is well-formed is to use PHP's filter_var() function.

In the code below, if the e-mail address is not well-formed, then store an error message:

$email = test_input($_POST["email"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format";
}
</P>
<h5 class="mt-4">PHP - Validate URL</h5>
<P class="text-white opacity-75">
The code below shows a way to check if a URL address syntax is valid (this regular expression also allows dashes in the URL). If the URL address syntax is not valid, then store an error message:

$website = test_input($_POST["website"]);
if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
  $websiteErr = "Invalid URL";
}
</P>
<!----------------------------------------------------------------DAY_6_CORE_PHP------------------------------------------------------->
<h2 class="mt-4">DAY_6_CORE_PHP_LEARNING</h2>
<h2 class="reg mt-5">PHP ADVANCE TOPICS</h2>
<h1 class="mt-4">25. DATE AND TIME </h1>
<?php
echo "Today is ".date("y/m/d")."<br>";
echo "Today is ".date("y-m-d")."<br>";
echo "Today is ".date("y.m.d")."<br>";

 date_default_timezone_set("Asia/kolkata");
echo "The time is " . date("h:i:sa");
?>
<h1 class="mt-4">26. INCLUDE AND REQUIRED </h1>
<p class=" mt-3 text-white opacity-50">INCLUDE</p>
<?php include 'includeExample.php'?>
<p class=" mt-3 text-white opacity-50">REQUIRED</p>
<?php require 'includeExample.php' ?>
<h1 class="mt-4">27. FILE HANDLING </h1>
<h5 class="mt-4">READFILE</h5>
<?php
echo readfile("FileHandling.txt")
?>
<h1 class="mt-4">28. FILE READ/OPEN</h1>
<?php
$deep=fopen("FileHandling.txt",'r');
echo fread($deep,filesize("FileHandling.txt"));
fclose($deep);
?>
<h1 class="mt-4">28. FILE CREATE/WRITE</h1>
<?php
$myfile = fopen("newfile.txt", "w");
$txt = "John Doe";
fwrite($myfile, $txt);
fclose($myfile);
?>
<h1 class="mt-4">29. FILE UPLOAD</h1>
<form method="post" enctype="multipart/form-data" action="files.php">
  <input type="file" name="myfile">
  <input type="submit" name="upload" value="send">
</form>
<h1 class="mt-4">30. PHP COOKIES</h1>
<p>A cookie is often used to identify a user. A cookie is a small file that the server embeds on the user's computer. Each time the same computer requests a page with a browser, it will send the cookie too. With PHP, you can both create and retrieve cookie values.
</p>
<!----------------------------------------------------------------DAY_7_CORE_PHP------------------------------------------------------->
<h2 class="mt-3">DAY_7_CORE_PHP</h2>
<h1 class="mt-4">31. PHP SESSION</h1>
<P>FileName : Session</P>
<p>
session_start();
"here we started the session storing User name";
$_SESSION['username']="deep jadav";
echo "Sesion has been Started";
</p>
<P>FileName : Session2</P>
<p>
session_start();
"Here we Stored the Username that Session gived"

session_start();
echo "welocme ".$_SESSION['username']
</p>
P>FileName : SessionLogout</P>
<p>
session_start();
"Here we Unset the session and destory the it"
session_start();
session_unset();
session_destroy();
echo "you have been log out" 
</p>
<h1 class="mt-4">32. PHP FILTERTING</h1>
<p>if we take @ then it will be Invalid either is valid</p>
<?php
$email="jadavdeep560.com";
$vemail=filter_var($email,FILTER_VALIDATE_EMAIL);
if($vemail==false)
{
  echo"invalid";
}else{
  echo"valid email".$vemail;
}
?>
<h1 class="mt-4">33. PHP CALLBACK FUNCTIONS</h1>
<?php
function Addition($abs=10,$bsb=20){
 $z=$abs+$bsb;
 return $z;
}
echo(call_user_func('Addition'));
?>
<h1 class="mt-4">34. PHP AND JSON</h1>
<h5 class="mt-4">JSON_ENCODE </h5>
<?php
$fask=array("a"=>10,'b'=>20);
echo json_encode($fask)
?>
<h5 class="mt-4">JSON_dECODE </h5>
<?php
$jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';
print_r(json_decode($jsonobj));
?>
<h1 class="mt-4">35. PHP Expection</h1>
<?php
function divide($dividend, $divisor) {
  if($divisor == 0) {
    throw new Exception("Division by zero");
  }
  return $dividend / $divisor;
}

try {
  echo divide(5, 0);
} catch(Exception $e) {
  echo "Unable to divide. ";
} finally {
  echo "Process complete.";
}
?>
<!----------------------------------------------------------------DAY_8_CORE_PHP------------------------------------------------------->
<h2 class="mt-3">DAY_8_CORE_PHP</h2>
<h2 class="reg mt-5">PHP OOP</h2>
<h1 class="mt-4">36. WHAT IS OOP </h1>
<?php
//USING VARAIBLE DACLRATION 
class deep{
  public $fax='deep jadav is my name';
}
$dep=new deep();
echo $dep->fax;

//USING FUNCTION 

class addtion{
  function addtion(){
    return 10+20;
  }
}
$add = new addtion();
echo $add->addtion();
?>
<h1 class="mt-4">37. CLASS AND OBJECT </h1>
<h5 class="mt-4">CLASS AND OBJECT WITH MULTIPLE FUNCTION or METHODS </h5>
<?php
class Auth{
  function Teacher(){
    echo "i am teacher<br>";
  }
  function Student(){
    echo "i am Student<br>";
  }
  function Management(){
    echo "i am Mnagament<br>";
  }
}
$Aut=new Auth();
echo $Aut->Management();
echo $Aut->Student();
echo $Aut->Teacher();

class kas{
  public $namesd="bachao mije iss jungl se";
}
$obj=new kas();
echo $obj->namesd;
?>
<h5 class="mt-4">CLASS AND OBJECT WITH PROPTIES  </h5>
<?php
class propties{
 public $name="Deep jadav";
 function getName(){
  echo  $this->name;
 }
 function UpdateName(){
  echo $this->name="Monster";
 }
}
$p1=new propties();
echo $p1->name;
echo "<br>";
echo $p1->getName();
echo "<br>";
echo $p1->UpdateName();
?>
<h1 class="mt-4">38. CLASS AND OBJECT CONSTRUCTOR FUNCTION </h1>
<?php
 class gas{
  public $marks;
  public $age;
  public function __construct($marks,$age)
  {
    $this->marks = $marks;
    $this->age = $age;
  }
}
  $k1=new gas("deep",25);
  echo $k1->age;
  echo"<br>";
  echo $k1->marks;
?>
<h1 class="mt-4">39. CLASS AND OBJECT DESTRUCTOR FUNCTION </h1>
<?php
class jason{
  public $Yamraj ="Yamraj : Vats Tumara Waqt Ho Gaya Prasthan Ka hum mot ke Devta he";
  function _construct($Yamraj){
    $this->Yamraj = $Yamraj;
  }
  public $mahakal ="Shivji :Madira Pan Kam kiya karo Yamraj KIske samne Khade ho woh to Dekh lo Hum Devo ke Dev Mahakal he Jivan aur mrtuyu dono Hamare andar vas karta he aur  hume khatam karega";
  public $mahakalthirdEye="yamraj ji Destory ho gaye";
  function _destruct($mahakal,$mahakalthirdEye){
    $this->$mahakal= $mahakal;
    $this->$mahakalthirdEye= $mahakalthirdEye;
  }
}
$has=new jason();
echo $has->Yamraj;
echo "<br>";
echo $has->mahakal;
echo "<br>";
echo $has->mahakalthirdEye
?>
<h1 class="mt-4">40. CLASS AND OBJECT WITH ACESS MODIFIRES </h1>
<?php
class AcessModfiers{
  public $iam ="Public : i am accisable from everywhere";
  private $dance="Private : i am confidential";
  protected $jsu ="Protected : kon ho tum sab Hum sabKuch he";
}
$acces=new AcessModfiers();
echo $acces->iam;
// echo $acces->dance;
// echo $acces->jsu;
?>
<!----------------------------------------------------------------DAY_9_CORE_PHP------------------------------------------------------->
<h2 class="mt-3">DAY_9_CORE_PHP</h2>
<h1 class="mt-4">41. CLASS AND OBJECT WITH INHERITANCE</h1>
<?php
class Bank{
  public $Name;
  public $Branch;
  function __construct($Name,$Branch)
  {
    $this->Branch=$Branch;
    $this->Name=$Name;
  }
  function info(){
    echo "Bank Name : {$this->Name} <br> Branch : {$this->Branch}";
  }
}
class SBI extends Bank{
    public $Adress;
    function __construct($Adress)
    {
      $this->Adress=$Adress;
    }
    function info()
    {
     echo "Location : {$this->Adress}";
    }
}
$SBI1 =new SBI('ashram road');
$SBI2 =new Bank('SBI','Goverment');
echo $SBI1->info();
echo "<br>";
echo $SBI2->info();
?>
<h1 class="mt-4">42. CLASS AND OBJECT WITH CONSTANTS</h1>
<?php
class gods_Of_Thunder{
      const riya ="drugs do muje drdugs do muje";
      public $rajesh="lavo oye koi charas";
}
echo gods_Of_Thunder:: riya;
echo "<br>";
$dep1=new gods_Of_Thunder();
echo $dep1->rajesh;
?>
<h1 class="mt-4">43. CLASS AND OBJECT WITH ABSTRACT CLASS</h1>
<?php
abstract class Jay_Mahakal{
  abstract  function KedarNath();
  abstract  function UjjainMahakal();
  abstract  function Kelash();
}
class Bless extends Jay_Mahakal{
  function KedarNath()
  {
    echo "Jay Mahakal Kedarnath vale";
  }
  function UjjainMahakal()
  {
    echo "Jay Mahakal Ujjain vale ";
  } 
  function Kelash()
  {
    echo "Jay Mahakal kelash vale";
  }
}
$Blessings_Ghee_Baka=new Bless();
$Blessings_Ghee_Baka->KedarNath();
echo "<br>";
$Blessings_Ghee_Baka->Kelash();
echo "<br>";
$Blessings_Ghee_Baka->UjjainMahakal();
?>
<h1 class="mt-4">44. CLASS AND OBJECT WITH INTERFACE</h1>
<?php
interface Narendra_Modi_Global_leader{
  function Papu_RahulGandhi();
  function Chamiya_SoniaGandhi();
  function Priyanka_Gandhi_congress_Destroyer();
  
}
class BJP implements Narendra_Modi_Global_leader{
   function Papu_RahulGandhi(){
    echo "Pappu : Esi Machine Lgaunga iss side se Alu Dllo Uss side se sona NIklega";
   }
   function Chamiya_SoniaGandhi(){
    echo "Chamiya : Me Apko mera beta sop rahu ho jo karna he kar lijiye";
   }
   function  Priyanka_Gandhi_congress_Destroyer(){
    echo "Priyanka : 60 sal purani congress ki dhajya udane ka ghamand he muje ";
   } 
} 
$bj1=new BJP();
$bj1->Chamiya_SoniaGandhi();
echo "<br>";
$bj1->Papu_RahulGandhi();
echo "<br>";
$bj1->Priyanka_Gandhi_congress_Destroyer();
?>
<h1 class="mt-4">45. CLASS AND OBJECT WITH TRAITS</h1>
<?php
trait hello{
  function Michel_Jackson(){
    echo "i am dancer";
  }
}
class cow{
  use hello;
}
class billa{
  use hello;
}
$test =new billa();
$test->Michel_Jackson();
?>
<h1 class="mt-4">46. CLASS AND OBJECT WITH STATIC METHOD</h1>
<?php
class jackson{
  static function welcome(){
    echo "hii i am dancer";
  }
}
jackson::welcome();
?>
<!----------------------------------------------------------------DAY_10_CORE_PHP------------------------------------------------------->
<h2 class="mt-3">DAY_10_CORE_PHP</h2>
<h1 class="mt-4">47. CLASS AND OBJECT WITH STATIC PROPTIES </h1>
<?php
class pi {
  public static $value = 3.14159;
}

// Get static property
echo pi::$value;
?>
<h1 class="mt-4">48. CLASS AND OBJECT WITH NAMESPACE </h1>
<p>
PHP Namespaces
Namespaces are qualifiers that solve two different problems:

They allow for better organization by grouping classes that work together to perform a task
They allow the same name to be used for more than one class
For example, you may have a set of classes which describe an HTML table, such as Table, Row and Cell while also having another set of classes to describe furniture, such as Table, Chair and Bed. Namespaces can be used to organize the classes into two different groups while also preventing the two classes Table and Table from being mixed up.
</p>

<h2 class="reg mt-5">PHP MYSQL</h2>
<h1 class="mt-4">49. CREATING DATABASE </h1>
<p>
What is MySQL?
MySQL is a database system used on the web
MySQL is a database system that runs on a server
MySQL is ideal for both small and large applications
MySQL is very fast, reliable, and easy to use
MySQL uses standard SQL
MySQL compiles on a number of platforms
MySQL is free to download and use
MySQL is developed, distributed, and supported by Oracle Corporation
MySQL is named after co-founder Monty Widenius's daughter: My
The data in a MySQL database are stored in tables. A table is a collection of related data, and it consists of columns and rows.

Databases are useful for storing information categorically. A company may have a database with the following tables:

Employees
Products
Customers
Orders
</p>
<h1 class="mt-4">50. PHP DATBASE CONNECTION </h1>
<img src="Screenshot 2025-01-31 125829.png" class="mt-3">
<h1 class="mt-4">51. PHP DATBASE INSERT DATA </h1>
<img src="../Core_PHP/CrudWithPhp/Screenshot 2025-01-31 165944.png" class="mt-3">
<!----------------------------------------------------------------DAY_11_CORE_PHP------------------------------------------------------->
<h2 class="mt-3">DAY_11_CORE_PHP</h2>
<h1 class="mt-4">52. PHP DATBASE CRUD WITH UI </h1>
<h5 class="mt-4">MY SQL VALIDATION</h5>
<img src="../Core_PHP/CrudWithPhp/validation.png" class="mt-3">
<h5 class="mt-4">MY SQL INSERT DATA</h5>
<img src="../Core_PHP/CrudWithPhp/Add.png" class="mt-3">
<h5 class="mt-4">MY SQL UPDATE DATA</h5>
<img src="../Core_PHP/CrudWithPhp/Update1.png" class="mt-3">
<img src="../Core_PHP/CrudWithPhp/Update.png" class="mt-3">
<h5 class="mt-4">MY SQL DELETE DATA </h5>
<img src="../Core_PHP/CrudWithPhp/DELETE.png" class="mt-3">
<img src="../Core_PHP/CrudWithPhp/delete2.png" class="mt-3">
<h1 class="mt-4">53. PHP DATBASE PREPARED PARAMETERS </h1>
<p>
A prepared statement is a feature used to execute the same (or similar) SQL statements repeatedly with high efficiency.

Prepared statements basically work like this:

Prepare: An SQL statement template is created and sent to the database. Certain values are left unspecified, called parameters (labeled "?"). Example: INSERT INTO MyGuests VALUES(?, ?, ?)
The database parses, compiles, and performs query optimization on the SQL statement template, and stores the result without executing it
Execute: At a later time, the application binds the values to the parameters, and the database executes the statement. The application may execute the statement as many times as it wants with different values
Compared to executing SQL statements directly, prepared statements have three main advantages:

Prepared statements reduce parsing time as the preparation on the query is done only once (although the statement is executed multiple times)
Bound parameters minimize bandwidth to the server as you need send only the parameters each time, and not the whole query
Prepared statements are very useful against SQL injections, because parameter values, which are transmitted later using a different protocol, need not be correctly escaped. If the original statement template is not derived from external input, SQL injection cannot occur.
</p>
<h1 class="mt-4">54. PHP MY SQL LIMIT DATA </h1>
<p>Limit Data Selections From a MySQL Database
MySQL provides a LIMIT clause that is used to specify the number of records to return.

The LIMIT clause makes it easy to code multi page results or pagination with SQL, and is very useful on large tables. Returning a large number of records can impact on performance.

Assume we wish to select all records from 1 - 30 (inclusive) from a table called "Orders". The SQL query would then look like this:

$sql = "SELECT * FROM Orders LIMIT 30";
When the SQL query above is run, it will return the first 30 records.

What if we want to select records 16 - 25 (inclusive)?

Mysql also provides a way to handle this: by using OFFSET.

The SQL query below says "return only 10 records, start on record 16 (OFFSET 15)":

$sql = "SELECT * FROM Orders LIMIT 10 OFFSET 15";
You could also use a shorter syntax to achieve the same result:

$sql = "SELECT * FROM Orders LIMIT 15, 10";
Notice that the numbers are reversed when you use a comma.</p>

</html>

