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

//collect information from create.php
$username = mysqli_real_escape_string($connect, $_POST["user"]);
$password = mysqli_real_escape_string($connect, $_POST["pass"]);
$email = mysqli_real_escape_string($connect, $_POST["email"]);
$name = mysqli_real_escape_string($connect, $_POST["name"]);
$age = mysqli_real_escape_string($connect, $_POST["age"]);
$skills = mysqli_real_escape_string($connect, $_POST["skills"]);
$locale = mysqli_real_escape_string($connect, $_POST["locale"]);
$phone = mysqli_real_escape_string($connect, $_POST["phone"]);

$checkUser = mysqli_query($connect, "SELECT * FROM User WHERE User.Username = '$username';");
$result = mysqli_num_rows($checkUser);

if ($result > 0){
    $_SESSION['userExists'] = "";
    header('location:create.php');
    die();
}

//Data to insert using variables from above
$insertData = "INSERT INTO User (Username, Password, Email_Acc, Name, Age, Skills, Location, Phone_number, Hours) VALUES ('$username','$password', '$email', '$name', $age, '$skills', '$locale', '$phone', 1);";


if ($connect->query($insertData) === TRUE) { ?> <!-- BREAK OUT OF PHP TO LOAD HTML -->
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
                    <h1>Your account has successfully been created! :)</h1>
                    <p>Now to create your service</p>
                </div>
                <div id="service_list">
                </div>
            </div>
        </div>
        <script>
            setTimeout(function(){
                window.location.href = "create_account_step2.php";
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