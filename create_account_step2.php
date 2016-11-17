<!-- do login process here -> link to create service on success
login form - template include? with forgotten password/tryagain messages built in?-->
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
                <?php require 'loginclude.php'?>
            </div>
        </div>
        
        <?php include 'footer.php'; ?>
    </body>
</html>