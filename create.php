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
                    <h4>Step 1 of 3</h4>
                    <h3>Please enter your details to create an account:</h3>
                    <form action="create_account.php" method="post">
                        <?php 
                            if(isset($_SESSION['userExists'])){
                                echo '<h3 style="color:#ff973c;">SORRY THAT USERNAME HAS BEEN TAKEN!</h3><p style="color:#fff;">Please try again</p>';
                            }
                        ?>
                        <!-- Ask user for their account details -->
                        Username: <input type="text" name="user" value="" placeholder="Username" maxlength="20" required><br>
                        Password: <input type="password" password name="pass" value="" placeholder="Password" maxlength="20" required><br>
                        Email: <input type="email" name="email" value="" placeholder="Email" maxlength="100" required><br>
                        Full Name: <input type="text" name="name" value="" placeholder="Full Name" maxlength="100" required><br>
                        Age: <input type="number" name="age" value="" placeholder="Age" min="16" max="200" required><br>
                        Skills: <input type="text" name="skills" value="" placeholder="Skills seperated by ','" maxlength="500" required><br>
                        Location: <textarea type="text" name="locale" value="" placeholder="Location" required></textarea><br>
                        Phone Number: <input type="tel" pattern="^\s*\(?(020[7,8]{1}\)?[ ]?[1-9]{1}[0-9{2}[ ]?[0-9]{4})|(0[1-8]{1}[0-9]{3}\)?[ ]?[1-9]{1}[0-9]{2}[ ]?[0-9]{3})\s*$" name="phone" value="" placeholder="01234567898" maxlength="11" required><br>
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