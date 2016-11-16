
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
                <h1>YOUR PROFILE</h1>
                <?php
                    if (isset($_SESSION['username'])){
                        echo '
                            <div class="single">
                                <div id="currency">
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
                            </div>';
                    };
                ?>
                <div id="clear">
                </div>

                <div class="single">
                    <h1>YOUR SERVICE</h1>
                </div>   
            </div>
        </div>
        
        <?php include 'footer.php'; ?>
    </body>
</html>