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

    $result = mysqli_query($connect, "SELECT User.Username, User.email_acc, User.Name, User.Age, User.Location, User.Phone_number, User.Hours, Services.Service_Name, Services.Description, Services.Category, Services.Location, Services.User_ID FROM User INNER JOIN Services ON User.User_ID = Services.User_ID;");
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
                    <select onchange="" class="single">
                        <option>Computing</option>
                        <option>House Work</option>
                        <option>Yard Work</option>
                        <option>Other</option>
                    </select>
                    <h1>This is the main content</h1>
                </div>
                <div id="service_list">
                    <?php 
                        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
                            {
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
                                                if(isset($_SESSION['username']) && $_SESSION['currency'] > 0){
                                                   echo '
                                                        <form style="width:30%; float:right" action="transaction.php" method="get">
                                                            <input class="hide" type="text" name="id" value="'.$row['User_ID'].' " readonly>
                                                            <input type="submit" value="Hire Me">
                                                        </form>
                                                   ';
                                                };
                                                echo'
                                            </div>
                                        </div>  
                                </div>';
                            }
                    ?>
                </div>
            </div>
        </div>
        
        <?php include 'footer.php'; ?>
    </body>
</html>