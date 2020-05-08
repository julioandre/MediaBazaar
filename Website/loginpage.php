<?php

session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        Login
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f87fc95c0b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="styles/loginpage.css">
</head>
<body>
<h1>Media Bazaar</h1>
<div class ="container">
    <div style="color: #555555">
        <i class="fas fa-user fa-5x"></i>
    </div>

        <div class="empID">
            <input type="ID" placeholder="employeeID" name="ID">
        </div>
        <div style="margin-top: 10px">
            <input type="password" placeholder="password" name="password">
        </div>
        <div>
            <input type="submit" class="btn btn-secondary" style="margin-top: 5px; margin-left: 45px " value="Login">
        </div>
         <?php
            if(isset($_SESSION["error"])) {
                echo "<span style=\"color: red\">".$_SESSION["error"]."</span>";
                unset($_SESSION["error"]);
            }
            ?>


    </form>

    <a href="ResetPassword.php">Reset Password</a>


</div>

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
</body>
</html>
<?php
unset($_SESSION["error"]);
?>
