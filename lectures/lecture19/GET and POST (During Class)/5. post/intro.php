<?php
// Created by Professor Wergeles for CS2830 at the University of Missouri


    // Print the contents of $_POST
    print_r($_POST);
    
    print "<br><br>"; 
    
    // Look for a 'name' key
    $name = $_POST['name'];
    // Look for a 'language' key
    $language = $_POST['language'];
    
    // If the language is Chinese, say hi in Chinese
    if ($language == 'ch') {
        print "Ni Hao $name";
    }
    // Else default to English
    else {
        print "Hello $name";
    }

?>