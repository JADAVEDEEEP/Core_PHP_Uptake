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
p    {color: red;}
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

</html>