<?php
    session_start();
    
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

    $query = "SELECT * FROM User;";
    $result = mysqli_query($connect,$query);

?>

<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <?php require '../header-admin.php'; ?>
        
        
        <div id="main_wrap">
            <div id="page">
                <?php
                    if(!isset($_SESSION['admin'])){
                        echo"<h2 style='color:red'>Warning! you're not an admin please <a href='../index.php'>return to user domain!</a></h2>";
                    } 
                ?>
                <div class="single">
                    <h4>Users</h4>
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
                                                    <td>'. $row['Name'] . '</td>
                                                </tr>
                                                <tr>
                                                    <td>Contact: </td>
                                                    <td>'. $row['Email_acc'] . '</td>
                                                </tr>
                                            </table>
                                        </div>  
                                        <table>
                                            <tr>
                                                <td>Username:</td>
                                                <td>'. $row['Username'] . '</td>
                                            </tr>
                                            <tr>
                                                <td>User Address:</td>
                                                <td>'. $row['Location'] . '</td>
                                            </tr>
                                        </table>
                                        
                                        <div class="right">
                                            <div>';
                                                if(isset($_SESSION['admin'])){
                                                   echo '
                                                        <form action="delete-user.php" method="get">
                                                            <input class="hide" type="text" name="id" value="'.$row['User_ID'].' " readonly>
                                                            <input type="submit" value="Delete User">
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
                <div id="clear">
                </div>
            </div>
        </div>
        
        <?php include '../footer.php'; ?>
    </body>
</html>