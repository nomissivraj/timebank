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

//USE THIS FOR ATTEMPTING SERVICE AND USER CREATE AT SAME TIME $currentUserID = mysqli_query($connect,"SELECT User.User_ID FROM User WHERE User.Username = '$username'");

//collect service details from create.php
$service = $_POST["service"];
$service_desc = $_POST["service_desc"];
$category = $_POST["category"];
$service_locale = $_POST["servicelocale"];

$insertData = "INSERT INTO Services (Service_Name, Description, Category, Location, User_ID) VALUES ('$service', '$service_desc', '$category', '$service_locale', '$_SESSION[User_ID]');";

if ($connect->query($insertData) === TRUE) { ?> <!-- If Service is saved correctly -->
    <html>
    <head>
        <title></title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php require 'header.php'; ?>        
        <div id="main_wrap">
            <div id="page">
                <div class="single">
                    <h1>Your service has successfully been created! :)</h1>
                    <a href="profile.php">CLICK ME IF YOU ARE NOT REDIRECTED WITHIN 5 SECONDS</a>
                </div>
            </div>
        </div>
        <script>
            setTimeout(function(){
                window.location.href = "loadservices.php";
            }, 2000);
        </script>
        <?php include 'footer.php'; ?>
    </body>
</html>
    <!-- RE-ENTERPHP TO CONTINUE SCRIPT --><?php

    //echo "New record created successfully";
} else {
    echo "Error: " . $insertData . "<br>" . $connect->error;
}

$connect->close();
?>