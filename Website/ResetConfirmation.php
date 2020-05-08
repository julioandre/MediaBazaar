<?php
include "config.php";
session_start();

if($_SERVER["REQUEST_METHOD"] =="POST" && $_POST["NewPassword"]==$_POST["ConfirmPassword"]){
    $pass = $_POST["NewPassword"];
    $sql="UPDATE `users` SET password ='$pass'WHERE id='{$_SESSION['user']}'";
    if ($conn->query($sql) === TRUE) {
        echo " Password Updated successfully";
        header("location:loginpage.php");
        session_destroy();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
?>
<html>
<head>
    <title>Select Shifts</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/ViewShifts.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>


</head>
<body>
<h1>Enter New Password</h1>
<div class="container">
    <form method="post" action="ResetConfirmation.php">
        <div class="NewPass">
            <input type="password" placeholder="New Password" name="NewPassword">
        </div>
        <div class="ConPass">
            <input type="password" placeholder="Confirm Password" name="ConfirmPassword">
        </div>
        <div>
            <input type="submit" class="btn btn-secondary" style="margin-top: 5px; margin-left: 45px " value="Reset Password">
        </div>
    </form>
</div>

</body>
</html>
