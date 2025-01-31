<?php
include ('./teacher.php');
include ('./studnet.php');

$teher = new teacher\joining();
$teher->joiningDate();
$thar= new student\joining();
echo"<br>";
$thar->AddmissionDate();

?>