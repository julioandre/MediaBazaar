<?php
include ("config.php");
session_start();
if($_SERVER["REQUEST_METHOD"] =="POST") {
    $id = $_POST['ID'];
    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);


    if ($count == 1) {
        $_SESSION['user'] = $id;

        header("location:ResetConfirmation.php");
    } else {
        $error = "Employee.doesnt exist";
        $_SESSION["error"] = $error;
        header("Location:ResetPassword.php");
    }
}
?>
<html>
<head>
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/ViewShifts.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>


</head>
<body>
<h1>Reset Password</h1>
<div class="container">
    <form method="post" action="ResetPassword.php">
        <div class="empID">
            <input type="ID" placeholder="employeeID" name="ID">
        </div>
        <div>
            <input type="submit" class="btn btn-secondary" style="margin-top: 5px; margin-left: 45px " value="Confirm ID">
        </div>
    </form>
</div>

</body>
</html>