<?php
    if(!session_start()) {
        print "session failed";
        exit;
    }

    $loggedIn = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];

    if($loggedIn) {
        header("Location: EdmqgcFinalProjectInfo.php");
        exit;
    }
?>

<!DOCTYPE html>
<!-- 
    Name: Ethan Marchbanks
    Date: 4/20/2021
    Challenge: Final Project
    References: 1)https://stackoverflow.com/questions/16056591/font-scaling-based-on-width-of-container
                2)https://fonts.google.com/specimen/IM+Fell+Double+Pica?slant=6
                3)http://clipart-library.com/clip-art/wedding-rings-transparent-background-1.htm
                4)https://www.fotoimpressions.com/
                5)https://www.weddingwire.com/wedding-ideas/wedding-timeline
                6)https://www.peerspace.com/resources/wedding-photographers-cincinnati/
                7)https://on-the-times.com/2020/04/03/fall-stonebridge-wedding/
                8)https://fonts.google.com/specimen/New+Tegomin
                9)https://fonts.google.com/specimen/Open+Sans+Condensed#standard-styles
-->
<html lang="en">
    <head>
        <title>Final Project</title>
        <meta charset="utf-8">

        <link rel="stylesheet" type="text/css" href="EdmqgcFinalProject.css">
        
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=IM+Fell+Double+Pica:ital@1&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=New+Tegomin&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:ital,wght@1,300&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="jquery-ui-1.12.1.custom/jquery-ui.min.css">
        <script src="jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
        <script src="jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        
    </head>
    <body>
        <?php include 'EdmqgcFinalProjectHeader.php';?>
        
        <div id="websiteTitleContainer" class="clearfix">
            <div class="websiteTitleImage">
                <img src="weddingRings.png" alt="Wedding Rings">
            </div>
            
            <div id="websiteTitle">
                <h1>Forever is around the corner</h1>
            </div>
            
            <div class="websiteTitleImage">
                <img src="weddingRings.png" alt="Wedding Rings">
            </div>
        </div>       
        
        <div id="loginFormContainer">
            <div id="loginTitle">
                <h1>Login</h1>
            </div>
            
            <form id="loginForm" action="EdmqgcFinalProjectLogin.php" method="POST">
            
                <input type="hidden" name="action" value="do_login">

                <div id="error">
                    <?php
                        if ($error) {
                            print "<h2>$error</h2>";
                        }
                    ?>
                </div>
                
                <div class="loginField">
                    <label for="username">User name:</label>
                    <input type="text" id="username" name="username" autofocus>
                </div>

                <div class="loginField">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">
                </div>

                <div class="clearfix" id="loginButtonContainer">
                    <input id="loginSubmit" type="submit" value="Login">
                    <a id="guestSubmit" href="EdmqgcFinalProjectInfo.php">Continue as guest...</a>
                </div>
                
            </form>
        </div>
        
        <div id="weddingPhotoContainer">
            <div class="weddingPhoto">
                <img class="photo" src="weddingPhoto1.png" alt="Wedding Photo 1">
            </div>
            
            <div class="weddingPhoto">
                <img class="photo" src="weddingPhoto2.png" alt="Wedding Photo 2">
            </div>
            
            <div class="weddingPhoto">
                <img class="photo" src="weddingPhoto3.png" alt="Wedding Photo 3">
            </div>
            
            <div class="weddingPhoto">
                <img class="photo" src="weddingPhoto4.png" alt="Wedding Photo 4">
            </div>
        </div>
      
        <script src="EdmqgcFinalProject.js"></script>
    </body>
</html>