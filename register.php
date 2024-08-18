<?php
include("database.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Register Form</h1>
    <form action="register.php" method="post">
        <label for=""> Username </label><br>
        <input type="text" name="username"><br>
        <label for=""> Password </label><br>
        <input type="text" name="password"><br>
        <input type="submit" name="register" value="Register">
    </form>
    <a href="index.php">Go Back To Login </a> <br>
</body>

</html>

<?php

  if(isset($_POST["register"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $sqlinsert = "INSERT INTO users (name,password) VALUES ('{$username}','{$hash}')";
    mysqli_query($conn, $sqlinsert);

  }else{
    
  }
?>