<?php 
    session_start();

    // create datbase connection info
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "database";
    $database = "timebank";

    // Create connection using connection info
    $connect = new mysqli($servername, $dbUsername, $dbPassword, $database);
    // Check if connection has worked or failed - if failed 'die'
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);

    }
    
    $searchInput = $_POST['search'];
    $searchID = "SELECT * FROM Services WHERE Service_Name LIKE '%$searchInput%' OR Category LIKE '%$searchInput%' OR Description LIKE '%$searchInput%'";
    $searchID_Result = mysqli_query($connect, $searchID);
    $searchID_Array = $searchID_Result -> fetch_assoc();
    $resultID = $searchID_Array['User_ID'];
    

    $getResult = "SELECT User.User_ID, User.Username, User.email_acc, User.Name, User.Age, User.Location, User.Phone_number, User.Hours, Services.Service_Name, Services.Description, Services.Category, Services.Location FROM User INNER JOIN Services ON User.User_ID=Services.User_ID WHERE User.User_ID = $resultID;";
    $saveResult = mysqli_query($connect, $getResult);


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
                    <form method="post" action="search.php">
                        <input type="text" value="" name="search" placeholder="Search">
                        <input type="submit" value="Search">
                    </form>
                </div>
                <div id="clear">
                </div>
                <div class="single">
                    <h4>Search Result:</h4>
                </div>
                <div id="service_list">
                    <?php 
                        $stuff = false;
                        while ($row = mysqli_fetch_array($saveResult,MYSQLI_ASSOC))
                            {
                                $stuff = true;
                                    echo '
                                            <div class="single list-item">
                                                <div class="right">
                                                    <table>
                                                        <tr>
                                                            <td>User: </td>
                                                            <td>'. $row['Username'] . '</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Contact: </td>
                                                            <td>'. $row['email_acc'] . '</td>
                                                        </tr>
                                                    </table>
                                                </div>  
                                                <table>
                                                    <tr>
                                                        <td>Service:</td>
                                                        <td>'. $row['Service_Name'] . '</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Category:</td>
                                                        <td>'. $row['Category'] . '</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Location:</td>
                                                        <td>'. $row['Location'] . '</td>
                                                    </tr>
                                                </table>
                                                
                                                <table>
                                                    <tr>
                                                        <td>Description of service:</td>
                                                        <td>'. $row['Description'] . '</td>
                                                    </tr>
                                                </table>
                                                <div class="right">
                                                    <div>';
                                                        if(isset($_SESSION['username']) && $_SESSION['currency'] > 0 && $row['User_ID'] != $_SESSION['User_ID']){
                                                        echo '
                                                                <form action="transaction.php" method="get">
                                                                    <input class="hide" type="text" name="id" value="'.$row['User_ID'].' " readonly>
                                                                    <input type="submit" value="Hire Me">
                                                                </form>
                                                        ';
                                                        };
                                                        echo'
                                                    </div>
                                                </div>  
                                        </div>';
                                if (!$stuff){
                                    echo 'No results please try again';
                                }
                            }// end of while
                    ?>
                </div>
            </div>
        </div>
        
        <?php include 'footer.php'; ?>
    </body>
</html>