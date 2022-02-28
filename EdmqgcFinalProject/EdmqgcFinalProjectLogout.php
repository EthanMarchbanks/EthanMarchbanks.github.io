<?php

    if(!session_start()) {
        print "session failed";
        exit;
    }

    $_SESSION = array();

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    setcookie("admin", "", time() - 3600);
    setcookie("username", "", time() - 3600);
    setcookie("rsvp", "", time() - 3600);

    session_destroy();

    header("Location: index.php");

    exit;
?>