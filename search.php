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
    $search = "SELECT * FROM Services WHERE Service_Name LIKE '%".$searchInput."%'";
    $searchResult = mysqli_query($connect, $search);

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
                <?php include 'search-result.php'?>
                <div id="service_list">
                    <?php 
                        while ($row = mysqli_fetch_array($searchResult,MYSQLI_ASSOC))
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
                            }
                    ?>
                </div>
            </div>
        </div>
        
        <?php include 'footer.php'; ?>
    </body>
</html>