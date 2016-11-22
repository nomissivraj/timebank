<?php
    session_start();
?>

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
                    <h4>admin login</h4>
                    <?php 
                        if(isset($_SESSION['incorrect_login'])){
                            echo '<h3 style="color:#ff973c;">SORRY LOGIN DETAILS WERE INCORRECT!</h3><p style="color:#fff;">Please try again</p>';
                        };
                    ?>
                    <form action="admin-login.php" method="post">
                        Username: <input type="text" name="login" value="" placeholder="username" maxlength="20" required><br>
                        Password: <input type="password" password name="password" value="" placeholder="Password" maxlength="20" required><br>
                        <input type="submit" value="Submit">
                    </form>
                </div>
                <div id="service_list">
                </div>
                <div id="clear">
                </div>
            </div>
        </div>
        
        <?php include '../footer.php'; ?>
    </body>
</html>