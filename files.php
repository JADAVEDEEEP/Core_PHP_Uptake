<?php
$name=$_FILES['myfile']['name'];
$temp_name=$_FILES['myfile']['tmp_name'];

move_uploaded_file($temp_name,$name);
?>