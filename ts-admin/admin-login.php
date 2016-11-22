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

$query = "SELECT * FROM Admin WHERE Admin.Username = '$username' AND Admin.Password = '$password' LIMIT 1;";
$result = mysqli_query($connect,$query);
$userArray = $result -> fetch_assoc();


if ($result->num_rows == 1){
    //SUCCESS
    $_SESSION['admin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['User_ID'] = $userArray['Admin_ID'];
    //
    $_SESSION['password'] = $userArray['Password'];
    $_SESSION['email'] = $userArray['Email_acc'];
    $_SESSION['phone'] = $userArray['Phone_number'];
    $_SESSION['full_name'] = $userArray['Name'];
    $_SESSION['address'] = $userArray['Location'];

    

    header('Location: admin-dashboard.php');
    //echo $userArray['User_ID'];
} else { ?>
            <html>
            <head>
                <title></title>
                <link rel="stylesheet" href="../style.css">
            </head>
            <body>
                <?php require '../header-admin.php' ?>
                <div id="main_wrap">
                    <div id="page">
                        <div class="single">
                            <h1>login details were incorrect</h1>
                            <h1>Please try again...</h1>
                            <script>
                                setTimeout(function(){
                                    window.location.href = "index.php";
                                }, 2000);
                            </script>
                        </div>
                    </div>
                </div>
                
                <?php include '../footer.php'; ?>
            </body>
        </html>
    <?php session_destroy();
}
$connect->close();
?>