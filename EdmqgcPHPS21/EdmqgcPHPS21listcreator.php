<?php    
    if(strlen($_GET['a']) == 1 || strlen($_GET['a']) == 1) {
        $a = ord($_GET['a']);
        $b = ord($_GET['b']);

        echo "<h1>{" . chr($a) . ", ";

        $c = $a;

        if($a < $b) {
            while($c != $b) {
                $c++;
                if($c == $b) {
                    echo chr($c) . "}</h1>";
                }
                else {
                    echo chr($c) . ", ";
                }
            }
        }

        else if($a > $b) {
            while($c != $b) {
                $c--;
                if($c == $b) {
                    echo chr($c) . "}</h1>";
                }
                else {
                    echo chr($c) . ", ";
                }
            }
        }
    }
    
    else {
        echo "<h1>Please only enter a single character for each value!</h1>";
    }
?>