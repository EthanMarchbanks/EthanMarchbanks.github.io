<?php
// Created by Professor Wergeles for CS2830 at the University of Missouri

    header('Content-type: image/gif');

    $handle = fopen('cool.gif', 'rb');

	$bufferLen = 8192;

	while ($buffer = fread($handle, $bufferLen)) {
		print $buffer;
	}
	
	fclose($handle);
?>