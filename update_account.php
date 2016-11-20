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

//collect information from edit-account.php
$password = mysqli_real_escape_string($connect, $_POST["pass"]);
$email = mysqli_real_escape_string($connect, $_POST["email"]);
$name = mysqli_real_escape_string($connect, $_POST["name"]);
$age = mysqli_real_escape_string($connect, $_POST["age"]);
$skills = mysqli_real_escape_string($connect, $_POST["skills"]);
$locale = mysqli_real_escape_string($connect, $_POST["locale"]);
$phone = mysqli_real_escape_string($connect, $_POST["phone"]);

//Data to update user row using variables from above
$updateData = "UPDATE User SET Password = '$password', Email_acc = '$email', Name = '$name', Age = '$age', Skills = '$skills', Location = '$locale', Phone_number = '$phone'  WHERE User_ID = $_SESSION[User_ID];";


if ($connect->query($updateData) === TRUE) { ?> <!-- BREAK OUT OF PHP TO LOAD HTML -->
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
                    <h1>Your account details have been updated! :)</h1>
                </div>
                <div id="service_list">
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
    <!-- RE-ENTERPHP TO CONTINUE SCRIPT -->
<?php
    session_id('userExists');
    session_destroy();
    //echo "New record created successfully";
} else {
    //echo "Error: " . $insertData . "<br>" . $connect->error;
    echo $connect->error;
}

$connect->close();
?>