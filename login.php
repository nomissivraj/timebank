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

$username = $_POST["login"];
$password = $_POST["password"];

$query = "SELECT * FROM User WHERE User.Username = '$username' AND User.Password = '$password' LIMIT 1;";
$result = mysqli_query($connect,$query);
$userArray = $result -> fetch_assoc();

if ($result->num_rows == 1){
    $_SESSION['username'] = $username;
    $_SESSION['User_ID'] = $userArray['User_ID'];
    header('Location: index.php');
    //echo $userArray['User_ID'];
} else { ?>
            <html>
            <head>
                <title></title>
                <link rel="stylesheet" href="style.css">
            </head>
            <body>
                <div id="main_wrap">
                    <div id="page">
                        <div class="single">
                            <h1>login details were incorrect</h1>
                            <h1>redirecting in 5...</h1>
                            <script>
                                setTimeout(function(){
                                    window.location.href = "index.php";
                                }, 5000);
                            </script>
                        </div>
                    </div>
                </div>
                
                <?php include 'footer.php'; ?>
            </body>
        </html>
    <?php session_destroy();
}
$connect->close();
?>