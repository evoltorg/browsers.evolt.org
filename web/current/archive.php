<?php
// browserarchive.org aka browsers.evolt.org
// Copyright (c) 1999-2013 Adrian Roselli, William Anderson
?>
<?php
include "assets/inc/00-functions.inc";
include "data.inc";
$browsercode = end(explode("/",$_GET['dir']));
$site_name = "browsers.evolt.org";
$html_title = $browsers[$browsercode]["name"];
$page_title = $site_name;
$short_title = $browsers[$browsercode]["name"];
$page_type = "page";
$upstairs_uri = "/";
$upstairs_title = "Browser Archive";
include "assets/inc/10-header.inc";
include "assets/inc/20-message.inc";
?>
<?php
if ( (isset($_SERVER["QUERY_STRING"])) && (!isset($_GET["img"])) && (!isset($_GET["dir"])) && ($_SERVER["REQUEST_URI"] != "/") ) { 
	// echo "temporary outage: testing, back in a couple of minutes<br />";
	// echo $_SERVER["QUERY_STRING"]."<br />";
	// echo $_GET["dir"]."<br />";
	// echo $_GET["img"]."<br />";
	// echo $_SERVER["REQUEST_URI"]."<br />";
	header("Location: http://browsers.evolt.org/?dir=archive/".$_SERVER["QUERY_STRING"],301);
} else {
	if ( isset($_GET["img"]) ) {
		error_reporting(0);
		include "assets/external/encodeexplorer/index.php";
	} else {
		error_reporting(E_ALL);
		ini_set('display_errors','1');
		// include "assets/inc/functions.inc";
		// include "assets/inc/mysql.inc";
		/// include "assets/inc/page-start.inc";
		/// include "assets/inc/page-header.inc";
		/// include "assets/inc/menu-evolt.inc";
		/// include "assets/inc/page-content-open.inc";
?>
<h2><?php echo $browsers[$browsercode]["name"] ?></h2>
<?php
		include "assets/external/encodeexplorer/index.php";
		/// include "assets/inc/page-content-shut.inc";
		/// include "assets/inc/page-footer.inc";
		/// include "assets/inc/page-stop.inc";
		include "assets/inc/99-footer.inc";
	}
}
?>
