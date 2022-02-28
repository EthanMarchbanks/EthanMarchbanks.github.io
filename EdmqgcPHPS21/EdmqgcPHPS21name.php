<?php
    if(!preg_match('/[^A-Za-z]/', $_GET['firstname']) && !preg_match('/[^A-Za-z]/', $_GET['lastname'])) {
        $firstname = $_GET['firstname'];
        $lastname = $_GET['lastname'];
        echo "<h1>Hello $firstname $lastname, welcome to my PHP playground, designed to simulate the value of server-side development and practical use in web development!</h1>";
    }

    else {
        echo "<h1>Please only enter letters for values!</h1>";
    }
?>