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

$username = mysqli_real_escape_string($connect, $_POST["login"]);
$password = mysqli_real_escape_string($connect, $_POST["password"]);

$query = "SELECT * FROM User WHERE User.Username = '$username' AND User.Password = '$password' LIMIT 1;";
$result = mysqli_query($connect,$query);
$userArray = $result -> fetch_assoc();

if ($result->num_rows == 1){
    //SUCCESS
    $_SESSION['username'] = $username;
    $_SESSION['User_ID'] = $userArray['User_ID'];
    //
    $_SESSION['currency'] = $userArray['Hours'];
    $_SESSION['email'] = $userArray['Email_acc'];
    $_SESSION['phone'] = $userArray['Phone_number'];
    $_SESSION['full_name'] = $userArray['Name'];
    $_SESSION['age'] = $userArray['Age'];
    $_SESSION['address'] = $userArray['Location'];
    $_SESSION['skills'] = $userArray['Skills'];
    

    header('Location: create_service.php');
    //echo $userArray['User_ID'];
} else { 
    $_SESSION['incorrect_login'] = true;
    header('location:create_account_step2.php');
}
$connect->close();
?>