<?php
	/* Created by Professor Wergeles for CS2830 at the University of Missouri */ 
	
	// Here we are using sessions to propagate the login
	// http://us3.php.net/manual/en/intro.session.php

//     HTTPS redirect
     if ($_SERVER['HTTPS'] !== 'on') {
 		$redirectURL = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
 		header("Location: $redirectURL");
 		exit;
 	}
	
	// http://us3.php.net/manual/en/function.session-start.php
	if(!session_start()) {
		// If the session couldn't start, present an error
		header("Location: error.php");
		exit;
	}
	
	
	// Check to see if the user has already logged in
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	
	if ($loggedIn) {
		header("Location: page1.php");
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
	

//		if ($username == "test" && $password == "pass") {
//			// Instead of setting a cookie, we'll set a key/value pair in $_SESSION
//			$_SESSION['loggedin'] = $username;
//			header("Location: page1.php");
//			exit;
//		} 
        
        // Require the credentials
 		require_once '../db.conf';
        
        // Connect to the database
 		$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        
        // Check for errors
 		if ($mysqli->connect_error) {
 		   	$error = 'Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
 			require "login_form.php";
 		   	exit;
 		}
        
//        else {
//            print "Successfully connected to DB";
//        }
//        
//        exit;
        
        // $password = sha1($password);
        
        $username = $mysqli->real_escape_string($username);
        $password = $mysqli->real_escape_string($password);
 		
        $query = "SELECT id FROM users WHERE username = '$username' AND userPassword = sha1('$password')";
        
//        print $query;
//        exit;
        
        $result = $mysqli->query($query);
        
 		if($result){
             
            $match = $result->num_rows;
             
             if($match == 1){
                 $_SESSION['loggedin'] = $username;
                 header("Location: page1.php"); 
                 exit; 
             }
             else {
                 $error = "Error: Incorrect username or password"; 
                 require "login_form.php"; 
                 exit; 
             }
         } 
        // Else, there was no result
        else {
          $error = 'Login Error: Please contact the system administrator.';
          require "login_form.php";
          exit;
        }
        
        $result->close();
        $mysqli->close();
        exit;
	}
	
	function login_form() {
		$username = "";
		$error = "";
		require "login_form.php";
        exit;
	}
	
?>
