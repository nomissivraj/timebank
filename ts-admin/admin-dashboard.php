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

    $query = "SELECT * FROM Tickets;";
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
                <div class="single">
                    <h4>welcome</h4>
                    <?php
                        if (isset($_SESSION['admin'])){
                            echo $_SESSION['full_name'];
                        } else {
                            echo"<h2 style='color:red'>Warning! you're not an admin please <a href='../index.php'>return to user domain!</a></h2>";
                        }?>
                    <h4>Help requests:</h4> 
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
                                                    <td>'. $row['Ticket_OriginName'] . '</td>
                                                </tr>
                                                <tr>
                                                    <td>Contact: </td>
                                                    <td>'. $row['Ticket_Email'] . '</td>
                                                </tr>
                                            </table>
                                        </div>  
                                        <table>
                                            <tr>
                                                <td>Ticket Subject:</td>
                                                <td>'. $row['Ticket_Name'] . '</td>
                                            </tr>
                                            <tr>
                                                <td>Ticket Details:</td>
                                                <td>'. $row['Ticket_Message'] . '</td>
                                            </tr>
                                        </table>
                                        
                                        <div class="right">
                                            <div>';
                                                if(isset($_SESSION['admin'])){
                                                   echo '
                                                        <form action="delete-ticket.php" method="get">
                                                            <input class="hide" type="text" name="id" value="'.$row['Ticket_ID'].' " readonly>
                                                            <input type="submit" value="Delete Ticket">
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