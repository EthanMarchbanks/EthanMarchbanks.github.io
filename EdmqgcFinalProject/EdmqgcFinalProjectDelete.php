<?php
	if(!session_start()) {
        print "failed session";
		exit;
	}
	
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	
	if (!$loggedIn) {
		header("Location: index.php");
		exit;
    }

    $idToDelete = empty($_POST['id']) ? '' : $_POST['id'];

    require_once 'EdmqgcFinalProjectdb.conf';

    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    if ($mysqli->connect_error) {
        $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
        require "EdmqgcFinalProjectRSVPlist.php";
        exit;
    }

    $query = "DELETE FROM rsvp WHERE id='$idToDelete'";

    if ($mysqli->query($query)) {
        $mysqli->close();
        exit;
    }

    else {
        $error = 'Delete Error: Please contact the system administrator.';
        require "EdmqgcFinalProjectRSVPlist.php";
        exit;
    }
?>