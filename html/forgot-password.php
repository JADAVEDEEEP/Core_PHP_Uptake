<?php include '../php/send-password-reset.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="post" action="../php/send-password-reset.php">
    <label for="email">email</label>
    <input type="email" name="email" id="email">
    <button>Send mail</button>
</form>
    
</body>
</html>