<?php
    session_start();
?>

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
                    <h4>Create Ticket</h4>
                    <h3>Please enter details to submit a support ticket:</h3>
                    <form action="submit-ticket.php" method="post">
                        <!-- Ask user for their account details -->
                        
                        What's wrong: <input type="text" name="ticket-subject" value="" placeholder="Brief summary of your problem" maxlength="100" required><br>
                        
                        Details of problem: <textarea type="text" name="ticket-details" value="" placeholder="Describe the details of your problem" required></textarea><br>
                        
                        <input type="submit" value="Submit">
                    </form>
                </div>
                <div id="service_list">
                </div>
                <div id="clear">
                </div>
            </div>
        </div>
        
        <?php include 'footer.php'; ?>
    </body>
</html>