<div id="banner_wrap">
    <?php 
        if (isset($_SESSION['username'])){
        echo '<p style="float:right; padding:0 20px;">Welcome '.$_SESSION['username'].' your id is: '.$_SESSION['User_ID'].'</p>';
        } else {
            echo '<div class="logform">
                    <form method="post" action="login.php"> 
                     <span class="loginput">Login:</span> 
                        <input class="loginput" type="text" name="login" value="" placeholder="Username">
                        <input class="loginput" type="text" name="password" value="" placeholder="Password">
                        <input type="submit" value="submit">
                    </form>
                  </div>';
        }
     ?>
    <div id="banner">
        <h1>A waste of Time bank</h1>
    </div>
    
    <div id="nav_wrap">
        <div id="nav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#Profile">Profile</a></li>
                <li><a href="create.php">Create account</a></li>
                <li style="float:right;"><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</div>
