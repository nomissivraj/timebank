<?php 
    session_start();
    if (isset($_SESSION['username'])){
        echo 'logged in '.$_SESSION['username'].' '.$_SESSION['User_ID'];
    } else {
        echo 'FUCK YOU';
    }
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
                    <form method="post" action="login.php">
                    Login:<br>
                        username: <input type="text" name="login" value="" placeholder="Username"><br>
                        password: <input type="text" name="password" value="" placeholder="Password"><br>

                        <input type="submit" value="submit">
                    </form>
                </div>

                <div class="single">
                    <select onchange="" class="single">
                        <option>Computing</option>
                        <option>House Work</option>
                        <option>Yard Work</option>
                        <option>Other</option>
                    </select>
                    <h1>This is the main content</h1>
                </div>
                <div id="service_list">
                </div>
            </div>
        </div>
        
        <?php include 'footer.php'; ?>
    </body>
</html>