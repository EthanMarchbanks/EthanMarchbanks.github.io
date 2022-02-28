<?php    
    if(is_string($_POST['username']) && is_string($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if($username == "test" && $password == "pass") {
            echo "<h1>Credentials validated with POST</h1>";
        }
        else {
            echo "<h1>Username or password is incorrect</h1>";
        }
    }

    else {
        echo "<h1>Please only enter strings for values!</h1>";
    }
?>