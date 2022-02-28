<?php
// Created by Professor Wergeles for CS2830 at the University of Missouri 

//    $dbhost = "localhost";
//    $dbuser = "ubuntu";
//    $dbpass = "ethan";
//    $dbname = "CS2830";

    require_once "../db.conf";
//    print "using db.conf<br>";
//    print "dbhost: $dbhost<br>";
//    print "dbuser: $dbuser<br>";
//    print "dbpass: $dbpass<br>";
//    print "dbname: $dbname<br>";
//    exit;

    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }
    
    print "Connected! Status:" . $mysqli->host_info . "\n";
    
    $query = "SELECT * FROM foodstock WHERE cost > 10";

//    print $query;
//    exit;

    $result = $mysqli->query($query);

//    print_r($result);
//    print "<br><br>\n";

    // $row = $result->fetch_assoc();
//     print_r($row);
// 
     while($row = $result->fetch_assoc()) {
         print 'I have ' . $row['quantity'] . ' ' . $row['name'] . ' for $' . $row['cost'];
         print "<br>\n";
     }
    

    $result->close();
    $mysqli->close();
?>