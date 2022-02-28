<?php
// Created by Professor Wergeles for CS2830 at the University of Missouri 

	// The predefined $_COOKIE array contains our cookies
	// Reference: http://php.net/manual/en/reserved.variables.cookies.php
	
    // get the value of a cookie named 'flavor'
//	$flavor = $_COOKIE['flavor'];

    // a better way to get the cookie's value
    $flavor = empty($_COOKIE['flavor']) ? "The cookie 'flavor' does not exist." : $_COOKIE['flavor'];

    echo $flavor;
?>
