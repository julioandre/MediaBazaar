<?php
session_start();
$_SESSION['login_user']=null;
$_SESSION['name']=null;
$_SESSION["error"]=null;
 header("Location: loginpage.php");



