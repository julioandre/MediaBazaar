<?php
include ("config.php");
session_start();

//$id = $_SESSION['login_user'];
$today=date("Y-m-d");
$sql= "SELECT * FROM shifts WHERE employeeID= '{$_SESSION['login_user']}'and time>'$today' ORDER BY time ASC";
$result = mysqli_query($conn,$sql);


$count = mysqli_num_rows($result)?>
<html>
<head>
    <title>View Shifts</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/ViewShifts.css">
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
            <li class="nav-item">
                <a class="nav-link" href="PersonalInfo.php">Personal Information</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="ViewShifts.php">View Shifts</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <a class="nav-link" href="logout.php">Logout</a>
        </ul>
</nav>
<h2>Upcoming Shifts</h2>
<table class="table" >
    <thead>
    <tr>
        <th scope="col">Date</th>
        <th scope="col">Day</th>
        <th scope="col">Time</th>
    </tr>
    </thead>
    <tbody id="shifttable">
        <?php while($row = mysqli_fetch_assoc($result)) {

            $date = DateTime::createFromFormat('Y-m-d H:i:s', $row['time']);
            echo"<tr id=".$date->format('Y-m-d').">
                    <td>".$date->format('Y-m-d')."</td>
                    <td>".$date->format('l')."</td>
                    <td>".$date->format('H:i')."</td>
                </tr>";
        }?>
    </tbody>
</table>

<div class="form-popup" id="myForm">
    <form action="ViewShifts.php" class="form-container">
        <h1>Request Absence</h1>
        <h2>Reason</h2>
        <label class="container">Sick
            <input type="radio" checked="checked" name="radio">
            <span class="checkmark"></span>
        </label>
        <label class="container">Family Emergency
            <input type="radio" name="radio">
            <span class="checkmark"></span>
        </label>
        <label class="container">Other
            <input type="radio" name="radio">
            <span class="checkmark"></span>
        </label>

        <h2>Comments</h2>
        <textarea rows="5" cols="50"></textarea><br>
        <button type="submit" class="btn btn-success">Submit</button>
        <button type="button" class="btn btn-danger" onclick="closeForm()">Close</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="scripts/ViewShifts.js" type="text/javascript"></script>

</body>
</html>