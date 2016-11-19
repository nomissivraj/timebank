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

//get user_id of service
$_SESSION['service_ID'] = $_GET['id'];


$query = "UPDATE User SET User.Hours = User.Hours - 1 WHERE User.User_ID = $_SESSION[User_ID];";
$result = mysqli_query($connect, $query);

if ($result) { ?>
        <html>
            <head>
                <title></title>
                <link rel="stylesheet" href="style.css">
            </head>
            <body>
                <?php require 'header.php' ?>
                <div id="main_wrap">
                    <div id="page">
                        <div class="single">
                            <h2>Thanks for your custom! Your service has been booked</h2>
                            <h4>And you have been charged 1 hour</h4>
                            <script>
                                setTimeout(function(){
                                    window.location.href = "loadservices.php";
                                }, 2000);
                            </script>
                        </div>
                    </div>
                </div>
                
                <?php include 'footer.php'; ?>
            </body>
        </html>
        <?php 
} else {
    echo'Take hour failure';
}

$query = "UPDATE User SET User.Hours = User.Hours + 1 WHERE User.User_ID = $_SESSION[service_ID];";
$result = mysqli_query($connect, $query);


$connect->close();
?>