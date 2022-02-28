<?php    
    function isHammingNumber($x) {
        if ($x == 1) {
            echo "<h1>The provided number " . $GLOBALS["x"] . " is a Hamming Number!</h1>";
        }
        
        else if ($x % 2 == 0) {
            return isHammingNumber($x/2);
        }

        else if ($x % 3 == 0) {
            return isHammingNumber($x/3);
          }
        
        else if ($x % 5 == 0) {
            return isHammingNumber($x/5);
        }	
        
        else {
            echo "<h1>The provided number " . $GLOBALS["x"] . " is not a Hamming Number!</h1>";
        }
    }

    if(is_finite($_GET['number']) && $_GET['number'] >= 1) {
        $x = $_GET['number'];
        isHammingNumber($x);
    }

    else {
        echo "<h1>Please only enter numbers for values!</h1>";
    }
?>