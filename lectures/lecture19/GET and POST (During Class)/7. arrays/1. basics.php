<!DOCTYPE html>
<!-- Created by Professor Wergeles for CS2830 at the University of Missouri -->
<html>
	<head>
		<title>PHP Arrays</title>
	</head>
	<body>
        <?php
            /*
                References:
                    http://php.net/manual/en/function.array.php
                    http://php.net/manual/en/language.types.array.php
            */
        
            // create an array
            $zoo = array("Monkey", "Tiger", "Crocs", "Penguins");
            
            // add to the zoo array at 4th index
            $zoo[4] = "Giraffe";
            $zoo[] = "Lion";
        
            // readable format
            print_r($zoo);
            
            // http://php.net/manual/en/function.print-r.php
        
            // http://php.net/manual/en/function.unset.php
        
            unset($zoo[0]);
        
            print_r($zoo);

            // http://php.net/manual/en/function.array-values.php
            
            $zoo = array_values($zoo);
        
            print_r($zoo);
        
            print "<ul>\n";
            
            for ($i = 0; $i < count($zoo); $i++) {
                print "<li>{$zoo[$i]}</li>\n";
            }
            
            print "</ul>\n";

        ?>
	</body>
</html>
