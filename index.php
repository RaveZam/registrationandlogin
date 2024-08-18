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
    <h1>Login Form</h1>
    <form action="index.php" method="post">
        <label for=""> Username </label><br>
        <input type="text" name="username"><br>
        <label for=""> Password </label><br>
        <input type="text" name="password"><br>
        <input type="submit" name="login" value="Login">
    </form>
    <br>
    <br>
    <a href="register.php">Dont have Account Yet? </a> <br>
</body>

</html>

<?php
    if(isset($_POST["login"])){
        $username = $_POST ["username"];
        $password = $_POST ["password"];
        if(empty($username) || empty($password)){
            echo "Please Input User and Password";
        }else{

        $sqluser = "SELECT * FROM users WHERE name = '{$username}'";
        $userresult = mysqli_query($conn, $sqluser);
        if(mysqli_num_rows($userresult) > 0){
           $row = mysqli_fetch_assoc($userresult);
        if(password_verify($password, $row["password"])){

            echo "User Logged In ";
        }else{
            
            echo "Password Incorrect";
        }

    }else{
        echo "user was not found";
    }
    
}
}
?>