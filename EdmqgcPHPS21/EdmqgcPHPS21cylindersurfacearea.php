<?php    
    if(is_finite($_POST['height']) && is_finite($_POST['radius'])) {
        $height = $_POST['height'];
        $radius = $_POST['radius'];

        $pi = pi();

        $area = (2 * $pi * $radius * $height) + (2 * $pi * pow($radius, 2));

        echo "<h1>" . number_format($area, 2) . "</h1>";
    }

    else {
        echo "<h1>Please only enter numbers for values!</h1>";
    }
?>