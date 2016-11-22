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
$Ticket_ID = $_GET["id"];

//Data to insert using variables from above
$DeleteData = "DELETE FROM Tickets WHERE Ticket_ID = $Ticket_ID LIMIT 1;";


if ($connect->query($DeleteData) === TRUE) { ?> <!-- BREAK OUT OF PHP TO LOAD HTML -->
    <html>
    <head>
        <title></title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <?php require '../header-admin.php'; ?>        
        <div id="main_wrap">
            <div id="page">
                <div class="single">
                    <h1>Ticket Deleted</h1>
                </div>
                <div id="service_list">
                </div>
            </div>
        </div>
        <script>
            setTimeout(function(){
                window.location.href = "admin-dashboard.php";
            }, 2000);
        </script>
        <?php include '../footer.php'; ?>
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