<?php
	/* Created by Professor Wergeles for CS2830 at the University of Missouri */
   

    print_r($_GET);

    // http://example.com/get/intro.php?name=nick&language=en&age=60

    // look for the 'name' key
    $name = $_GET['name'];
    // look for the 'language' key and return the value
    $language = $_GET['language'];

    // if the language is Chinese, say hi in Chinese
    if ($language == 'ch') {
        print "Ni Hao $name";
    }
    // otherwise default to English
    else {
        print "Hello $name";
    }

?>
