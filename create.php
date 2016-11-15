<?php
    session_start();
    session_id('userExist');
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
                    <h2>Please enter your details to create an account:</h2>
                    <form action="create_account.php" method="post">
                        <?php 
                            if(isset($_SESSION['userExists'])){
                                echo 'Username Taken<br>';
                            }
                        ?>
                        <!-- Ask user for their account details -->
                        Username: <input type="text" name="user" value="" placeholder="Bob Bobberson" maxlength="20" required><br>
                        Password: <input type="text" name="pass" value="" placeholder="Password" maxlength="20" required><br>
                        Email: <input type="text" name="email" value="" placeholder="Email" maxlength="100" required><br>
                        Full Name: <input type="text" name="name" value="" placeholder="Full Name" maxlength="100" required><br>
                        Age: <input type="number" name="age" value="" placeholder="Age" max="200" required><br>
                        Skills: <input type="text-field" name="skills" value="" placeholder="Skills seperated by ','" maxlength="500" required><br>
                        Location: <input type="text" name="locale" value="" placeholder="Location" required><br>
                        Phone Number: <input type="text" name="phone" value="" placeholder="01234567898" required><br>
                        <input type="submit" value="Submit">
                    </form>
                </div>
                <div id="service_list">
                </div>
            </div>
        </div>
        
        <?php include 'footer.php'; ?>
    </body>
</html>