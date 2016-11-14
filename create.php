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
                    
                        <!-- Ask user for their account details -->
                        Username: <input type="text" name="user" value="" placeholder="Bob Bobberson" maxlength="20"><br>
                        Password: <input type="text" name="pass" value="" placeholder="Password" maxlength="20"><br>
                        Email: <input type="text" name="email" value="" placeholder="Email" maxlength="100"><br>
                        Full Name: <input type="text" name="name" value="" placeholder="Full Name" maxlength="100"><br>
                        Age: <input type="number" name="age" value="" placeholder="Age" max="200"><br>
                        Skills: <input type="text-field" name="skills" value="" placeholder="Skills seperated by ','" maxlength="500"><br>
                        Location: <input type="text" name="locale" value="" placeholder="Location"><br>
                        Phone Number: <input type="text" name="phone" value="" placeholder="01234567898"><br>

                        <!-- Also ask for service details -->
                        <p>Add details of the service you will be offering:</p>
                        Service Title:<input type="text" name="service" value="" placeholder="Computing"><br>
                        Description:<input type="text-field" name="service_desc" value="" placeholder="Description of service"><br>
                        Category:   <select name="category">
                                        <option selected disabled>Select</option>
                                        <option>Computing</option>
                                        <option>House Work</option>
                                        <option>Yard Work</option>
                                    </select><br>
                        Location of service: <select name="servicelocale">
                                                <option selected disabled>Select</option>
                                                <option>Plymouth</option>
                                                <option>Norfolk</option>
                                                <option>Essex</option>
                                            </select><br>
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