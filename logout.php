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
                    <h1 style="text-align:center;">Thanks for using Time Spender!</h1>
                    <h4 style="text-align:center;">Please return soon <3</h4>
                </div>
                <div id="service_list">
                </div>
            </div>
        </div>
        <script>
            setTimeout(function(){
                window.location.href = "index.php";
            }, 2000);
        </script>
        <?php include 'footer.php'; ?>
    </body>
</html>
<?php
unset($_SESSION['admin']);
session_destroy();
?>