<!DOCTYPE html>
<!-- Created by Professor Wergeles for CS2830 at the University of Missouri -->
<html>
<head>
	<title>Echo vs. Print</title>
</head>
<body>
    <!--
        echo and print are more or less the same thing. They both are used
        to output data to the screen.

        The differences are small but there are differences:
            * echo has no return value while print has a return value of
            1 so it can be used in expressions
            * echo can take multiple parameters (although such usage is rare)
            while print can take only one argument
            * echo is marginally faster than print
    -->
    
	<p>Echo</p>

    <?php
		echo "<h2>PHP is Fun!</h2>";
		echo "Hello world!<br>";
		echo "I'm about to learn PHP!<br>";
		echo "This ", "string ", "was ", "made ", "with multiple parameters.";
	?> 
	
	<p>Displaying Variables with Echo</p>
	
	<?php
		$txt1 = "Learn PHP";
		$txt2 = "CS2830";
		$x = 5;
		$y = 4;

		echo "<h2>" . $txt1 . "</h2>";
		echo "Study PHP in " . $txt2 . "<br>";
		echo $x + $y;
	?>	

    <p>Print</p>

    <?php
	/* The print statement can be used with or without parentheses: print or print(). */
		print "<h2>PHP is Fun!</h2>";
		print "Hello world!<br>";
		print "I'm about to learn PHP!";
	?> 

    <p>Displaying Variables with Print</p>

    <?php
		$txt1 = "Learn PHP";
		$txt2 = "CS2830";
		$x = 5;
		$y = 4;

		print "<h2>" . $txt1 . "</h2>";
		print "Study PHP in " . $txt2 . "<br>";
		print $x + $y;
	?>
</body>
</html>
