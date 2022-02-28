<?php
    if(!session_start()) {
        print "session failed";
        exit;
    }

    $loggedIn = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];

    if(!$loggedIn) {
        header("Location: index.php");
        exit;
    }
?>
<!DOCTYPE html>
<!-- 
    Name: Ethan Marchbanks
    Date: 4/20/2021
    Challenge: Final Project
    References: 1)https://getbootstrap.com/docs/4.0/getting-started/introduction/
                2)https://www.php.net/manual/en/mysqli-result.fetch-row.php
                3)https://www.freeiconspng.com/img/35402
-->
<html lang="en">
    <head>
        <title>Final Project</title>
        <meta charset="utf-8">
        
        <link rel="stylesheet" type="text/css" href="EdmqgcFinalProject.css">
        
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:ital,wght@1,300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=IM+Fell+Double+Pica:ital@1&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="jquery-ui-1.12.1.custom/jquery-ui.min.css">
        <script src="jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
        <script src="jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        
        <script src="EdmqgcFinalProject.js"></script>
        
    </head>
    <body onload="getAdminStatus()">
        <?php include 'EdmqgcFinalProjectHeader.php';?>
        
        <div id="back">
            <a href="EdmqgcFinalProjectInfo.php">Back</a>
        </div>
        
        <div id="rsvpListHeader" class="clearfix">
            <div class="websiteTitleImage">
                <img src="quill.png" alt="Paper and quill">
            </div>

            <div id="rsvpListTitle">
                <h1>RSVP List</h1>
            </div>

            <div class="websiteTitleImage">
                <img src="quill.png" alt="Paper and quill">
            </div>
        </div>
        
        <div id="wrapper">
            <div id="deleteMsg">Deleting...</div>
            
            <?php
                if ($error) {
                    print "<h4>$error</h4>";
                }
            ?>
            
            <div id="rsvpListContainer">
                <table id="rsvpList">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone Number</th>
                            <th>Relation</th>
                            <th>Plus One</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once 'EdmqgcFinalProjectdb.conf';

                            $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

                            if ($mysqli->connect_error) {
                                $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
                                require "EdmqgcFinalProjectRSVPlist.php";
                                exit;
                            }

                            $query = "SELECT * FROM rsvp";
                        
                            $mysqliResult = $mysqli->query($query);

                            if ($mysqliResult) {

                                while ($row = $mysqliResult->fetch_row()) {
                                    print "<tr>";
                                    print "<td class=\"id\">" . $row[0] . "</td>";
                                    print "<td>" . $row[1] . "</td>";
                                    print "<td>" . $row[2] . "</td>";
                                    print "<td>" . $row[3] . "</td>";
                                    print "<td>" . $row[4] . "</td>";
                                    print "<td>" . $row[5] . "</td>";
                                    print "<td><div class=\"x\"><img src=\"x.png\" alt=\"x\"></img></div></td>";
                                    print "</tr>";
                                }

                                $mysqliResult->close();
                                $mysqli->close();

                            }

                            else {                            
                                $error = 'RSVP List Error: Please contact the system administrator.';
                                require "EdmqgcFinalProjectRSVPlist.php";
                                exit;
                            }

                        ?>
                    </tbody>
                </table>
            </div>           
        </div>
    </body>
</html>