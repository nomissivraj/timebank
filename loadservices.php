<?php
session_start();
// create datbase connection info
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "database";
$database = "timebank";

// Create connection using connection info
$connect = new mysqli($servername, $dbUsername, $dbPassword, $database);
// Check if connection has worked or failed - if failed 'die'
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);

}

// new - TEST IF NO SERVICE (BY DELETING FROM TABLE MANUALLY)
$query = "SELECT * FROM Services WHERE Services.User_ID = $_SESSION[User_ID] LIMIT 1;";
$result2 = mysqli_query($connect,$query);
$serviceArray = $result2 -> fetch_assoc();

if ($serviceArray){
    $_SESSION['has_service'] = true;
    $_SESSION['service_name'] = $serviceArray['Service_Name'];
    $_SESSION['service_cat'] = $serviceArray['Category'];
    $_SESSION['service_locate'] = $serviceArray['Location'];
    $_SESSION['service_desc'] = $serviceArray['Description'];
    header('Location: profile.php');
} else {
    echo $_SESSION['User_ID'] .' wdsfsdf';
    //break;
}

$connect->close();
?>