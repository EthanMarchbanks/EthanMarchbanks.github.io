<?php
// Created by Professor Wergeles for CS2830 at the University of Missouri
    
    sleep(1);

    $me = array("name" => "Professor Wergeles", "pet" => "Tiger");
    
    // {"name": "Professor Wergeles", "pet": "Tiger"}

    //    print '{"name": "' . $me['name'] . '", "pet": "' . $me['pet'] . '"}';

    // json_encode create a JSON representation of the value you pass it

    print json_encode($me);

?>
