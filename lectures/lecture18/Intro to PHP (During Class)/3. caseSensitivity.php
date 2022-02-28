<!DOCTYPE html>
<!-- Created by Professor Wergeles for CS2830 at the University of Missouri -->
<html>
<head>
	<title>Case Sensitivity</title>
</head>
<body>

    <?php

        /*
            All keywords (e.g. if, else, while, echo, etc.),
            classes, functions, and user-defined functions
            are NOT case-sensitive 
        */
        echo "Hello World!<br>";
        ECHO "Hello World!<br>";
        EcHo "Hello World!<br>";
    
        /* However, all variable names ARE case-sensitive */
        $color = "red";
        echo "My car is " . $color . "<br>";
        echo "My house is " . $COLOR . "<br>";
        echo "My boat is " . $coLOR . "<br>";
        
    ?>

</body>
</html>
