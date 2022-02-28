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

	$action = empty($_GET['action']) ? '' : $_GET['action'];
	
	if ($action == 'do_RSVPadd') {
		handle_RSVPadd();
	} else {
		rsvp_form();
	}
	
	function handle_RSVPadd() {
		$firstName = empty($_GET['firstName']) ? '' : $_GET['firstName'];
		$lastName = empty($_GET['lastName']) ? '' : $_GET['lastName'];
        
        $areaCode = empty($_GET['areaCode']) ? '' : $_GET['areaCode'];
        $phoneNumber1 = empty($_GET['phoneNumber1']) ? '' : $_GET['phoneNumber1'];
        $phoneNumber2 = empty($_GET['phoneNumber2']) ? '' : $_GET['phoneNumber2'];
        
        $phoneNumber = $areaCode . $phoneNumber1 . $phoneNumber2;
        
        $relation = empty($_GET['relation']) ? '' : $_GET['relation'];
        $plusOne = empty($_GET['plusOne']) ? '' : $_GET['plusOne'];
        
        require_once 'EdmqgcFinalProjectdb.conf';
        
        $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        
        if ($mysqli->connect_error) {
            $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
			require "EdmqgcFinalProjectRSVP.php";
            exit;
        }

        $firstName = $mysqli->real_escape_string($firstName);
        $lastName = $mysqli->real_escape_string($lastName);
        $phoneNumber = $mysqli->real_escape_string($phoneNumber);
        $relation = $mysqli->real_escape_string($relation);
        $plusOne = $mysqli->real_escape_string($plusOne);
        
		$query = "INSERT INTO rsvp (firstName, lastName, phoneNumber, relation, plusOne) VALUES ('$firstName', '$lastName', '$phoneNumber', '$relation', '$plusOne')";
        $queryForDuplicate = "SELECT id FROM rsvp WHERE firstName = '$firstName' AND lastName = '$lastName' AND phoneNumber = '$phoneNumber' AND relation = '$relation' AND plusOne = '$plusOne'";       
		
        $mysqliResultForDuplicate = $mysqli->query($queryForDuplicate);
		
        if ($mysqliResultForDuplicate) {
            
            $match = $mysqliResultForDuplicate->num_rows;
            
            $mysqliResultForDuplicate->close();
            
            if($match == 0) {
                if($mysqli->query($query) === TRUE) {
                    $mysqli->close();
                    setcookie("rsvp", "success");
                    header("Location: EdmqgcFinalProjectInfo.php");
                    exit;
                }
                else {
                    $error = "RSVP Error: Please contact the system administrator.";
                    require "EdmqgcFinalProjectRSVP.php";
                }
            }
            
            $error = "RSVP Error: Duplicate entry.";
            
            require "EdmqgcFinalProjectRSVP.php";
            exit;

        }

        else {
            
            $error = 'RSVP Error: Please contact the system administrator.';
            require "EdmqgcFinalProjectRSVP.php";
            exit;
            
        }
	}
	
	function rsvp_form() {
		$firstName = "";
        $lastName = "";
        $phoneNumber = "";
        $relation = "";
        $plusOne = "";        
		$error = "";
		require "EdmqgcFinalProjectRSVP.php";
        exit;
	}
?>