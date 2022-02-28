<!DOCTYPE html>
<!-- Created by Professor Wergeles for CS2830 at the University of Missouri -->
<html>
<head>
	<title>Variables and Scope</title>
</head>
<body>
    <?php
        /* Creating (Declaring) PHP Variables */
        
        $txt = "Hello World!";
        $x = 5;
        $y = 10.5;
        
        
        echo $txt;
        echo "<br>";
        echo $x;
        echo "<br>";
        echo $y;
        
        echo "<br><br>";
        
        $x = 6;
        $y = 4;
        echo $x + $y;
        
        /* in the example above, notice that we did not have to tell PHP which data type the variable is.
        
            PHP automatically converts the variable to the correct data type, depending on its value. */
    
    
        
        /* Global and Local Scope */
        
        $x = 5; // global scope
    
        function myTest() {
            global $x;
            echo "<p>Variable x inside function is: $x</p>";
        }
        myTest();    
    
        echo "<p>Variable x outside function is: $x</p>";
        
        
        
        function myTest2() {
            $n = 10; // local scope
            echo "<p>Variable n inside function is: $n</p>";
        }
        myTest2();
        
        
        echo "<p>Variable n outside function is: $n</p>";
        
        $x = 6;
        $y = 14;
        
        // the global keyword is used to access a global variable from within a function
        function myTest3() {
            global $x, $y;
            $y = $x + $y;
        }
        myTest3();
    
        echo $y;
    ?>
</body>
</html>
