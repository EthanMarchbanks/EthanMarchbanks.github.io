<!DOCTYPE html>
<!-- Created by Professor Wergeles for CS2830 at the University of Missouri --> 
<?php
/*
    What is a cookie?
        * A cookies is often used to identify a user
        * A cookie is a small file that the server embeds on the user's computer (local machine)
        * Each time the same computer requests a page with a browser, it will send the cookie too
*/

	/* References: 
			1) http://php.net/manual/en/function.setcookie.php
			2) http://www.w3schools.com/php/php_cookies.asp
	*/
	

	/* Note: A cookie is created with the setcookie() function.

			Syntax
				setcookie(name, value, expire, path, domain, secure, httponly);

			Only the name parameter is required. All other parameters are optional.
	*/

    $cookie_name = "flavor";
    $cookie_value = "Oatmeal Cream Pie";

    
    // the following sets the 'flavor' cookie to expire in one hour
    setcookie($cookie_name, $cookie_value, time() + 3600);

    $cookie_value = "White Macademia Nut";

    // we update the cookie and we speed up the process to 5 seconds to watch it work
    setcookie($cookie_name, $cookie_value, time() + 5);

    // set/update a cookie named 'flavor'
    // since no expiration time is set, this cookie will expire when the browser is closed.
    setcookie($cookie_name, $cookie_value);

    setcookie('nick', 'loves cookies');
?>

<!-- NOTE: the setcookie() function must (should) appear BEFORE the <html> tag --> 

<html>
	<head>
		<title> setting cookies </title>
	</head>
	<body>
	
    <?php
    
        // we are checking whether the cookie was successfully set or not
        if(!isset($_COOKIE[$cookie_name])) {
            echo "Cookie name '" . $cookie_name . "' is not set!";
        }
        else {
            echo "Cookie '" . $cookie_name . "' is set! <br>";
            echo "Value is: " . $_COOKIE[$cookie_name];
        }
    ?>

</body>
</html>
