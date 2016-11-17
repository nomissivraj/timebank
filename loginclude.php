<div class="single">
    <h4>Step 2 of 3</h4>
    <h3>Please login to create your service and complete signup:</h3>
    <?php 
        if(isset($_SESSION['incorrect_login'])){
            echo '<h3 style="color:#ff973c;">SORRY LOGIN DETAILS WERE INCORRECT!</h3><p style="color:#fff;">Please try again</p>';
        };
    ?>
    <form action="create_account_login.php" method="post">
        Username: <input type="text" name="login" value="" placeholder="username" maxlength="20" required><br>
        Password: <input type="password" password name="password" value="" placeholder="Password" maxlength="20" required><br>
        <input type="submit" value="Submit">
    </form>
</div>
<div id="service_list">
</div>
<div id="clear">
</div>