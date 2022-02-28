<?php
    if(!session_start()) {
        print "session failed";
        exit;
    }

    $loggedIn = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];

    if($loggedIn) {
        header("Location: EdmqgcFinalProjectRSVPlist.php");
        exit;
    }

?>
<!DOCTYPE html>
<!-- 
    Name: Ethan Marchbanks
    Date: 4/20/2021
    Challenge: Final Project
    References: 1)
-->
<html lang="en">
    <head>
        <title>Final Project</title>
        <meta charset="utf-8">

        <link rel="stylesheet" type="text/css" href="EdmqgcFinalProject.css">
        
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=IM+Fell+Double+Pica:ital@1&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:ital,wght@1,300&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="jquery-ui-1.12.1.custom/jquery-ui.min.css">
        <script src="jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
        <script src="jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        
    </head>
    <body onload="getAdminStatus()">
        <?php include 'EdmqgcFinalProjectHeader.php';?>
        
        <div id="back">
            <a href="EdmqgcFinalProjectInfo.php">Back</a>
        </div>
        
        <div id="rsvpTitle">
            <h1>RSVP</h1>
        </div>
        
        <div id="rsvpFormContainer">
            <form id="rsvpForm" action="EdmqgcFinalProjectRSVPadd.php" method="GET">
            
                <input type="hidden" name="action" value="do_RSVPadd">
                
                <div id="error">
                    <?php
                        if ($error) {
                            print "<h2>$error</h2>";
                        }
                    ?>
                </div>

                <div class="rsvpField">
                    <label for="firstName">First name:</label>
                    <input type="text" id="firstName" name="firstName" autofocus required>
                </div>

                <div class="rsvpField">
                    <label for="lastName">Last name:</label>
                    <input type="text" id="lastName" name="lastName" required>
                </div>
                
                <div class="rsvpField">
                    <label for="areaCode">Phone Number:</label>
                    <span>( </span><input type="number" id="areaCode" class="phoneNumber" name="areaCode" maxlength="3" required><span> )</span>
                    <input type="number" id="phoneNumber1" class="phoneNumber" name="phoneNumber1" maxlength="3" required><span> -</span>
                    <input type="number" id="phoneNumber2" class="phoneNumber" name="phoneNumber2" maxlength="4" required>
                </div>
                
                <div class="rsvpField">
                    <label for="relation">Relation:</label>
                    <select name="relation" id="relation" required>
                        <option value="" selected disabled hidden>-- Please Select One --</option>
                        <option value="Parent">Parent</option>
                        <option value="Grandparent">Grandparent</option>
                        <option value="Aunt/Uncle">Aunt/Uncle</option>
                        <option value="Sibling">Sibling</option>
                        <option value="Cousin">Cousin</option>                       
                        <option value="Friend">Friend</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                
                <div class="rsvpField">
                    <label for="plusOneChoice">Plus One:</label>
                    <select id="plusOneChoice">
                        <option value="none" selected>None</option>
                        <option value="one">One</option>
                    </select>
                    <input type="text" id="plusOne" name="plusOne" value="none" disabled>
                </div>

                <div class="clearfix" id="buttonContainer">
                    <input id="rsvpSubmit" type="submit" value="Submit">
                    <button id="rsvpClear" type="button">Clear</button>
                </div>
                
            </form>
        </div>
      
        <script src="EdmqgcFinalProject.js"></script>
    </body>
</html>