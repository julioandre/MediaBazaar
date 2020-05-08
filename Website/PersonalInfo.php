<?php
include ("config.php");
session_start();

//$id = $_SESSION['login_user'];
$today=date("Y-m-d");
$sql= "SELECT * FROM users WHERE id= '{$_SESSION['login_user']}'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$name=$row['name'];
?>
<html>
<head>
    <title>Select Shifts</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/SelectShifts.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">MediaBazaar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="SelectShifts.php">Select Shifts</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="PersonalInfo.php">Personal Information</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">View Shifts</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <a class="nav-link" href="logout.php">Logout</a>
        </ul>
</nav>
<div class="container" style="margin-left: 50px">
    <form action="PersonalInfo.php" method="post">
        <div class="row" style="width: 25%">
            <div class="col" style="width: 25%">
                <label for="formGroupExampleInput">Name</label>
                <input type="text" class="form-control" placeholder="First name" value="<?php echo $name?>">
            </div>
        </div>
        <div class="row" style="width: 25%">
            <div class="col" style="width: 25%">
                <label for="formGroupExampleInput">Email</label>
                <input type="email" class="form-control" placeholder="Email"  value="<?php echo $row['email']?>">
            </div>
            <div class="col" style="width: 25%">
                <label for="formGroupExampleInput">Phone Number</label>
                <input type="text" class="form-control" placeholder="Phone Number"   value="<?php echo intval($row['phone'])?>">
            </div>
        </div>

        <div class="row" style="width:25%">
            <div class="col" >
                <label for="formGroupExampleInput">Postal Address</label>
                <input type="text" class="form-control" placeholder="Postal Address"  value="<?php echo $row['address']?>">
            </div>
        </div>
<input style="align:left" type="submit" class="btn btn-secondary btn-md" style="margin-top: 5px; margin-left: 45px " value="Update Details">
</form>
</div>
</body>
