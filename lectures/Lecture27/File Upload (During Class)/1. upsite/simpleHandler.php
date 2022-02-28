<?php
// Created by Professor Wergeles for CS2830 at the University of Missouri

	$target_dir = "uploads/"; 

    // Foreach through the $_FILES array
    foreach ($_FILES as $inputName => $fileArray) {
		print "$inputName = $fileArray<br>\n";
		
		foreach ($fileArray as $key => $value) {
			print "- $key = $value<br>\n";
		}
	}
	
	$result = move_uploaded_file($_FILES['file1']['tmp_name'], $target_dir . 'upload.png');

	if($result){
		echo "File was moved successfully!"; 
	}
	else {
		echo "File no no"; 
	}	
?>