<?php
include ("config.php");
session_start();


if($_SERVER["REQUEST_METHOD"] =="POST"){
    $id = $_POST['ID'];
    $password = $_POST['password'];
    echo("I am here");

    $sql= "SELECT * FROM users WHERE id='$id' and password='$password'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);




    if($count ==1) {
        $_SESSION['name']=$row["name"];
        $_SESSION['login_user'] = $id;

        header("location:dashboard.php");
    }else {
        $error = "Your Login Name or Password is invalid";
        $_SESSION["error"]=$error;
        header("Location:loginpage.php");
    }

}
