<?php
include ("config.php");
session_start();

//$id = $_SESSION['login_user'];
$today=date("Y-m-d");
$sql= "SELECT * FROM shifts WHERE employeeID= '{$_SESSION['login_user']}'and time>'$today' ORDER BY time ASC";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$date = DateTime::createFromFormat('Y-m-d H:i:s', $row['time']);
$count = mysqli_num_rows($result);

//echo $active['id'];

?>

<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f87fc95c0b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="styles/Dashboard.css">
    <title>DashBoard</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">MediaBazaar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="SelectShifts.php">Select Shifts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="PersonalInfo.php">Personal Information</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ViewShifts.php">View Shifts</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
           <a class="nav-link" href="logout.php">Logout</a>
        </ul>
</nav>
<div class="container" style="margin-top: 150px">
    <div class="jumbotron">
        <h1 class="display-4"> Hello <?php echo $_SESSION['name']?></h1>
    </div>
    <div class="row">
        <div class="card col" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Hours Worked This Month</h5>
                <h5 class="card-subtitle mb-2 text-muted"><?php echo"Date: ".date("Y-m-d");?></h5>
                <p class="card-text"><?php echo "7 Hours Worked";?></p>
                <p>Monthly Progress</p>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: <?php $som=((float)$t=date('d')/31)*100; echo round($som)."%"; ?>" aria-valuenow=<?php $som=((float)$t=date('d')/31)*100; echo round($som)."%"; ?> aria-valuemin="0" aria-valuemax="100"><?php $som=((float)$t=date('d')/31)*100; echo round($som)."%"; ?></div>
                </div
            </div>
        </div>
    </div>
    <div class="card" style="width: 18rem;margin-left: 45px">
        <div class="card-body">
            <?php
                if($count>0){
                   echo "<h5 class=\"card-title\">Next Work Shift</h5>";
                   echo" <p> ".$date->format('l')." the ".$date->format('Y-m-d')."</p>";
                   echo"<p>at ".$date->format('H:i')."</p>";
                }
            ?>

        </div>
    </div>


</div>






        <script
            src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous"></script>

