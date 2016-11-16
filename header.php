<div id="banner_wrap">
    <div id="login_bar">
        <?php 
            if (isset($_SESSION['username'])){
            echo '<span style="float:right; padding:10px 20px;">Welcome <span class="dynamic">'.$_SESSION['username'].'</span>! :)</span>';
            } else {
                echo '<div class="logform">
                        <form method="post" action="login.php"> 
                        <span class="loginput">Login:</span> 
                            <input class="loginput" type="text" name="login" value="" placeholder="Username">
                            <input class="loginput" type="password" name="password" value="" placeholder="Password">
                            <input type="submit" value="submit">
                        </form>
                    </div>';
            }
        ?>
     </div>
     <div id="clear">
    </div>
    <div id="banner">
        <h1>TIME SPENDER</h1>
    </div>
    
    <div id="nav_wrap">
        <div id="nav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#services">Services</a></li>
                <?php 
                    if (isset($_SESSION['username'])){
                        echo '<li style="float:right;"><a href="create_service.php">Edit Service</a></li>';
                    };
                ?>
                <?php 
                    if (isset($_SESSION['username'])){
                        echo '<li style="float:right;"><a href="logout.php">Logout</a></li>';
                    };
                ?>

                <?php 
                    if (isset($_SESSION['username'])){
                        echo '<li style="float:right;"><a href="profile.php">Profile</a></li>';
                 };
                ?>

                <?php 
                    if (!isset($_SESSION['username'])){
                        echo '<li><a href="create.php">Create account</a></li>';
                    };
                ?>

                
            </ul>
        </div>
    </div>
</div>
