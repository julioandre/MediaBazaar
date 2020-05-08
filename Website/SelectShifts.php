<?php
include ("config.php");

session_start();

$sql = "SELECT Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday FROM `preferred shifts` WHERE Employee_ID='".$_SESSION['login_user']."'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);


$week = date("W");
$year = date("Y");
$monshifts= null;
$tuesshifts=null;
$wedshifts=null;
$thursshifts=null;
$frishifts=null;
$satshifts=null;
$sunshifts=null;

function addprefshifts(){
    global $conn,$monshifts,$tuesshifts,$wedshifts,$thursshifts,$frishifts,$satshifts,$sunshifts;
    $sql="INSERT INTO `preferred shifts` (Employee_ID,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday) VALUES ('".$_SESSION['login_user']."','$monshifts','$tuesshifts','$wedshifts','$thursshifts','$frishifts','$satshifts','$sunshifts')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
if(isset($_POST['submit'])){//to run PHP script on submit
    if(!empty($_POST['Monday_Shifts'])){

// Loop to store and display values of individual checked checkbox.

        foreach($_POST['Monday_Shifts'] as $selected){
            echo $selected;
            $monshifts.=$selected.=",";
            $monshifts=rtrim($monshifts,',');
        }

    }
    if(!empty($_POST['Tuesday_Shifts'])){

// Loop to store and display values of individual checked checkbox.

        foreach($_POST['Tuesday_Shifts'] as $selected){
            echo $selected;
            $tuesshifts.=$selected.=",";
            $tuesshifts=rtrim($tuesshifts,',');
        }

    }
    if(!empty($_POST['Wednesday_Shifts'])){

// Loop to store and display values of individual checked checkbox.

        foreach($_POST['Wednesday_Shifts'] as $selected){
            $wedshifts.=$selected.=",";
            $wedshifts=rtrim($wedshifts,',');
        }

    }
    if(!empty($_POST['Thursday_Shifts'])){

// Loop to store and display values of individual checked checkbox.

        foreach($_POST['Thursday_Shifts'] as $selected){
            $thursshifts.=$selected.=",";
            $thursshifts=rtrim($thursshifts,',');
        }

    }
    if(!empty($_POST['Friday_Shifts'])){

// Loop to store and display values of individual checked checkbox.

        foreach($_POST['Friday_Shifts'] as $selected){
            $frishifts.=$selected.=",";
            $frishifts=rtrim($frishifts,',');
        }

    }
    if(!empty($_POST['Saturday_Shifts'])){

// Loop to store and display values of individual checked checkbox.

        foreach($_POST['Saturday_Shifts'] as $selected){
            echo $selected;
            $satshifts.=$selected.=",";
            $satshifts=rtrim($satshifts,',');
        }

    }
    if(!empty($_POST['Sunday_Shifts'])){

// Loop to store and display values of individual checked checkbox.

        foreach($_POST['Sunday_Shifts'] as $selected){
            $sunshifts.=$selected.=",";
            $sunshifts=rtrim($sunshifts,',');
        }

    }
    if(isset($row)){
        $sql1="DELETE FROM `preferred shifts` WHERE Employee_ID='".$_SESSION['login_user']."'";
        $conn->query($sql1);
    }
    addprefshifts();
    header("location:SelectShifts.php");

}
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
            <li class="nav-item active">
                <a class="nav-link" href="SelectShifts.php">Select Shifts</a>
            </li>
            <li class="nav-item">
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
<div class="container">
    <form action="SelectShifts.php" method="post">
        <div id="my_php">
            <?php
            if(isset($row)){
                foreach ($row as $day=>$day_value){
                    if(!empty($day_value)){
                        $str_arr=explode(",",$day_value);
                        echo"<h5>$day</h5>";
                        foreach ($str_arr as $a){
                            echo "<h7>".$a."   </h7>";

                        }
                        //echo"<h7>$day_value</h7>";
                    }
                }
                echo"<br><button type=\"button\" class=\"btn btn-info btn-md\"style=\"margin-top: 35px\">Update Preferences</button>";
            }
            else{
                echo"<h5>No Preferences Set</h5>";
                echo"<button type=\"button\" class=\"btn btn-info btn-md\"style=\"margin-left: 35px\">Add Preferences</button>";

            }
            ?>
        </div>

        <div id="mytable" class="removedisplay">
            <table class="table" >

                <tbody>
                <tr>
                    <th scope="row">Monday</th>
                    <td><input type="checkbox" name="Monday_Shifts[]" value="Morning"> Morning</td>
                    <td><input type="checkbox" name="Monday_Shifts[]" value="Afternoon"> Afternoon</td>
                    <td><input type="checkbox" name="Monday_Shifts[]" value="Evening"> Evening</td>
                </tr>
                <tr>
                    <th scope="row">Teusday</th>
                    <td><input type="checkbox" name="Tuesday_Shifts[]" value="Morning"> Morning</td>
                    <td><input type="checkbox" name="Tuesday_Shifts[]" value="Afternoon"> Afternoon</td>
                    <td><input type="checkbox" name="Tuesday_Shifts[]"value="Evening"> Evening</td>
                </tr>
                <tr>
                    <th scope="row">Wednesday</th>
                    <td><input type="checkbox" name="Wednesday_Shifts[]" value="Morning"> Morning</td>
                    <td><input type="checkbox" name="Wednesday_Shifts[]" value="Afternoon"> Afternoon</td>
                    <td><input type="checkbox" name="Wednesday_Shifts[]"value="Evening"> Evening</td>
                </tr>
                <tr>
                    <th scope="row">Thursday</th>
                    <td><input type="checkbox" name="Thursday_Shifts[]" value="Morning"> Morning</td>
                    <td><input type="checkbox" name="Thursday_Shifts[]" value="Afternoon"> Afternoon</td>
                    <td><input type="checkbox" name="Thursday_Shifts[]"value="Evening"> Evening</td>
                </tr>
                <tr>
                    <th scope="row">Friday</th>
                    <td><input type="checkbox" name="Friday_Shifts[]" value="Morning"> Morning</td>
                    <td><input type="checkbox" name="Friday_Shifts[]" value="Afternoon"> Afternoon</td>
                    <td><input type="checkbox" name="Friday_Shifts[]"value="Evening"> Evening</td>
                </tr>
                <tr>
                    <th scope="row">Saturday</th>
                    <td><input type="checkbox" name="Saturday_Shifts[]" value="Morning"> Morning</td>
                    <td><input type="checkbox" name="Saturday_Shifts[]" value="Afternoon"> Afternoon</td>
                </tr>
                <tr>
                    <th scope="row">Sunday</th>
                    <td><input type="checkbox" name="Sunday_Shifts[]" value="Afternoon"> Afternoon</td>
                </tr>
                </tbody>
            </table>
            <input style="align:left" type="submit" class="btn btn-secondary btn-md" style="margin-top: 5px; margin-left: 45px " value="Submit Preference" name="submit">
            <button type="button" class="btn btn-danger btn-md"style="margin-left: 35px">Clear</button>
        </div>
    </form>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="scripts/weekpicker.js" type="text/javascript"></script>
</body>
</html>
