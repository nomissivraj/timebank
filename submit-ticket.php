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


//collect service details from create-ticket.php
$ticketName = mysqli_real_escape_string($connect, $_POST["ticket-subject"]);
$ticketDetails = mysqli_real_escape_string($connect, $_POST["ticket-details"]);

$insertData = "INSERT INTO Tickets (Ticket_Name, Ticket_Message, Ticket_OriginID, Ticket_OriginName, Ticket_Email) VALUES ('$ticketName', '$ticketDetails', '$_SESSION[User_ID]', '$_SESSION[username]', '$_SESSION[email]');";
             //INSERT INTO Tickets (Ticket_Name, Ticket_Message, Ticket_OriginID, Ticket_OriginName, Ticket_Email) VALUES ('ticket name', 'ticket message', '3', 'ticket origin name', 'ticket@email');
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
                    <h1>Your ticket has successfully been created! :)</h1>
                    <h4>We'll get back to you shortly</h4>
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