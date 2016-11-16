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

//collect information from create.php    Perhaps add form security? = mysql_real_escape_string($_POST["name"]);
$username = $_POST["user"];
$password = $_POST["pass"];
$email = $_POST["email"];
$name = $_POST["name"];
$age = $_POST["age"];
$skills = $_POST["skills"];
$locale = $_POST["locale"];
$phone = $_POST["phone"];

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
                    <a href="create_service.php">CLICK ME IF YOU ARE NOT REDIRECTED WITHIN 5 SECONDS</a>
                </div>
                <div id="service_list">
                </div>
            </div>
        </div>
        <script>
            setTimeout(function(){
                window.location.href = "create_service.php";
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
}

$connect->close();
?>