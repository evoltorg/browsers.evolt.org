<?php

// outputs e.g.  somefile.txt was last changed: December 29 2002 22:16:23.

// $filename = '/home/sites/site1/web/browsers/ie/32bit/standalone/ie55sp2_nt.zip';
// $filename = '/home/sites/site1/web/browsers/1x/readme.txt';
$filename = '/local/web/hosts/archive.browsers.evolt.org/1x/README';
if (file_exists($filename)) {
   echo "$filename was last changed: " . date("F d Y H:i:s.", filectime($filename));
	echo "<br />".filectime($filename);
	echo "<br />".time();
	if ( time () < filectime($filename) + 172800 ) {
		echo "too young";
	} else { 
		echo "probably ok";
	}
} else {
	echo "nofile";
}

?> 
