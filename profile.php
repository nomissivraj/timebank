
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

    $testQ = "SELECT User.Username, User.Phone_number, User.User_ID, User.Name, User.Email_Acc, Requests.Request_ID FROM User, Requests WHERE Requests.Recipient_ID = User.User_ID AND Owner_ID = $_SESSION[User_ID]";
    $testQR = mysqli_query($connect, $testQ);


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
                <h1>YOUR PROFILE</h1>
                <?php
                    if (isset($_SESSION['username'])){
                        echo '
                            <div class="list-item">
                                <a href="edit-account.php">Edit Account details</a>
                                    <div class="single">
                                        <div class="right">
                                            CURRENCY: <span class="dynamic">'.$_SESSION['currency'].'</span> Hour
                                        </div>  
                                        <div id="acc_details">
                                            <table>
                                                <tr>
                                                    <td>USERNAME: </td>
                                                    <td class="dynamic">'.$_SESSION['username'].'</td>
                                                </tr>
                                                <tr>
                                                    <td>EMAIL: </td>
                                                    <td class="dynamic">'.$_SESSION['email'].'</td>
                                                </tr>
                                                <tr>
                                                    <td>PHONE: </td>
                                                    <td class="dynamic">'.$_SESSION['phone'].'</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="clear">
                                    </div>
                                    <div class="single">
                                        <div id="name_address">
                                            <table>
                                                <tr>
                                                    <td>NAME: </td>
                                                    <td class="dynamic">'.$_SESSION['full_name'].',</td>
                                                    <td class="dynamic">'.$_SESSION['age'].'</td>
                                                </tr>
                                            </table>
                                        </div>                  
                                    </div>
                                    <div id="clear">
                                    </div>
                                    <div class="single">
                                        <div id="address">
                                            ADDRESS:
                                        </div>  
                                        <div id="address" class="dynamic">
                                            '.$_SESSION['address'].'
                                        </div>                  
                                    </div>
                                    <div id="clear">
                                    </div>
                                    <div class="single">
                                        <div id="skills">
                                            SKILLS:
                                        </div>  
                                        <div id="skills" class="dynamic">
                                            '.$_SESSION['skills'].'
                                        </div>                  
                                    </div>
                            </div>'
                                ;
                    };
                ?>
                <div id="clear">
                </div>


                    <h1>YOUR SERVICE</h1>
                <?php
                    if (isset($_SESSION['has_service'])){
                        echo '
                            <div class="list-item">
                                <a href="edit-service.php">Edit Service</a>
                                <div class="single">
                                    <div class="right service_desc_text">
                                        <div>
                                            Service Description:
                                        </div>  
                                        <div class="dynamic">
                                            '.$_SESSION['service_desc'].'
                                        </div>                  
                                    </div>
                                    <div id="service_titles">
                                        <table>
                                            <tr>
                                                <td>Service: </td>
                                                <td class="dynamic">'.$_SESSION['service_name'].'</td>
                                            </tr>
                                            <tr>
                                                <td>Category: </td>
                                                <td class="dynamic">'.$_SESSION['service_cat'].'</td>
                                            </tr>
                                            <tr>
                                                <td>Location: </td>
                                                <td class="dynamic">'.$_SESSION['service_locate'].'</td>
                                            </tr>
                                        </table>
                                    </div>                  
                                </div>
                            </div>
                            <div id="clear">
                            </div>';
                    } else {
                        echo'<a href="create_service.php">Create a service</a>';
                    };
                ?>
                <h1>Job Requests</h1>
                <?php
                $stuff = false;
                    while ($row = mysqli_fetch_array($testQR,MYSQLI_ASSOC)) {
                        $stuff = true;
                            echo '
                                <div class="list-item">
                                    <p>Following User has hired you:</p>
                                    <div class="single">
                                        <div class="right service_desc_text">
                                            <div>
                                                Service Description:
                                            </div>  
                                            <div class="dynamic">
                                                '.$_SESSION['service_name'].'
                                            </div>                  
                                        </div>
                                        <div id="service_titles">
                                            <table>
                                                <tr>
                                                    <td>User: </td>
                                                    <td class="dynamic">'.$row['Username'].'</td>
                                                </tr>
                                                <tr>
                                                    <td>Email: </td>
                                                    <td class="dynamic">'.$row['Email_Acc'].'</td>
                                                </tr>
                                                <tr>
                                                    <td>Contact No.: </td>
                                                    <td class="dynamic">'.$row['Phone_number'].'</td>
                                                </tr>
                                            </table>
                                        </div>                  
                                    </div>
                                    <form action="delete-request.php" method="get">
                                        <input class="hide" type="text" name="id" value="'.$row['Request_ID'].' " readonly>
                                        <input type="submit" value="Delete">
                                    </form>
                                </div>
                                <div id="clear">
                                </div>';
                    }
                    if (!$stuff) {
                        echo 'You have no requests';
                    }
                 ?>   
            </div>
        </div>
        
        <?php include 'footer.php'; ?>
    </body>
</html>