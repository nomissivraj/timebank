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
                    <form action="save_service.php" method="post">
                        <h4>Final Step</h4>
                        <h1>Fill out to create your service:</h1>
                        Service Title:<input type="text" name="service" value="" placeholder="Computing" required><br>
                        Description:<input type="text-field" name="service_desc" value="" placeholder="Description of service" required><br>
                        Category:   <select name="category" required>
                                        <option value="" selected disabled>-Select</option>
                                        <option>Computing</option>
                                        <option>House Work</option>
                                        <option>Yard Work</option>
                                    </select><br>
                        Location of service: <select name="servicelocale" required>
                                                <option value="" selected disabled>-Select</option>
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