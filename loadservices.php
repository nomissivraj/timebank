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

//QUERY AND LOAD SERVICES INFO FOR CURRENT USER
$query = "SELECT * FROM Services WHERE Services.User_ID = $_SESSION[User_ID] LIMIT 1;";
$result2 = mysqli_query($connect,$query);
$serviceArray = $result2 -> fetch_assoc();

if ($serviceArray){
    $_SESSION['has_service'] = true;
    $_SESSION['service_name'] = $serviceArray['Service_Name'];
    $_SESSION['service_cat'] = $serviceArray['Category'];
    $_SESSION['service_locate'] = $serviceArray['Location'];
    $_SESSION['service_desc'] = $serviceArray['Description'];
    //header('Location: profile.php');
} else {
    echo $_SESSION['User_ID'] .' wdsfsdf';
    //break;
}

//QUERY AND LOAD PROFILE DETAILS FOR CURRENT USER
$query = "SELECT * FROM User WHERE User.User_ID = $_SESSION[User_ID] LIMIT 1;";
$result = mysqli_query($connect,$query);
$userArray = $result -> fetch_assoc();


if ($result->num_rows == 1){
    //SUCCESS
    $_SESSION['username'] = $userArray['Username'];
    $_SESSION['User_ID'] = $userArray['User_ID'];
    //
    $_SESSION['password'] = $userArray['Password'];
    $_SESSION['currency'] = $userArray['Hours'];
    $_SESSION['email'] = $userArray['Email_acc'];
    $_SESSION['phone'] = $userArray['Phone_number'];
    $_SESSION['full_name'] = $userArray['Name'];
    $_SESSION['age'] = $userArray['Age'];
    $_SESSION['address'] = $userArray['Location'];
    $_SESSION['skills'] = $userArray['Skills'];
    

    header('Location: profile.php');
    //echo $userArray['User_ID'];
} else {
    echo 'messed up';
}

$connect->close();
?>