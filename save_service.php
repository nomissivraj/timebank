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


//collect service details from create.php
$service = mysqli_real_escape_string($connect, $_POST["service"]);
$service_desc = mysqli_real_escape_string($connect, $_POST["service_desc"]);
$category = mysqli_real_escape_string($connect, $_POST["category"]);
$service_locale = mysqli_real_escape_string($connect, $_POST["servicelocale"]);

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