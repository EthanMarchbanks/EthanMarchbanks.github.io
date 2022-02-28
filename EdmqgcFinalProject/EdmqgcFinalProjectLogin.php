<?php
	if(!session_start()) {
        print "failed session";
		exit;
	}
	
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	
	if ($loggedIn) {
		header("Location: EdmqgcFinalProjectInfo.php");
		exit;
	}	
	
	$action = empty($_POST['action']) ? '' : $_POST['action'];
	
	if ($action == 'do_login') {
		handle_login();
	} else {
		login_form();
	}
	
	function handle_login() {
		$username = empty($_POST['username']) ? '' : $_POST['username'];
		$password = empty($_POST['password']) ? '' : $_POST['password'];
        
        require_once 'EdmqgcFinalProjectdb.conf';
        
        $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        
        if ($mysqli->connect_error) {
            $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
			require "index.php";
            exit;
        }

        $username = $mysqli->real_escape_string($username);
        $password = $mysqli->real_escape_string($password);
        
        $password = sha1($password); 
        
		$query = "SELECT id FROM users WHERE userName = '$username' AND userPassword = '$password'";
        
        $queryForUser = "SELECT id FROM users WHERE userName = '$username'";
        
		$mysqliResult = $mysqli->query($query);
        
        $mysqliResultForUser = $mysqli->query($queryForUser);
		
        if ($mysqliResult && $mysqliResultForUser) {
            $match = $mysqliResult->num_rows;
            $matchForUser = $mysqliResultForUser->num_rows;

            $row = $mysqliResult->fetch_row();
            
            $mysqliResult->close();
            $mysqliResultForUser->close();
            $mysqli->close();

  		    if ($match == 1) {
                $_SESSION['loggedin'] = $username;
            
                setcookie("admin", "true");
                
                header("Location: EdmqgcFinalProjectInfo.php");
                exit;
            }
            else {
                if($matchForUser == 1) {
                    $error = "Error: Incorrect password";
                    setcookie("username", $username);
                }
                
                else {
                    $error = "Error: Incorrect username";
                    setcookie("username", "", time() - 3600);
                }
                
                require "index.php";
                exit;
            }
        }

        else {
            $error = 'Login Error: Please contact the system administrator.';
            require "index.php";
            exit;
        }
	}
	
	function login_form() {
		$username = "";
		$error = "";
		require "index.php";
        exit;
	}
?>