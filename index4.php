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
	include "assets/inc/functions.inc";
	// include "assets/inc/mysql.inc";
	include "assets/inc/page-start.inc";
	include "assets/inc/page-header.inc";
	include "assets/inc/menu-evolt.inc";
	include "assets/inc/page-content-open.inc";
	if ( ! isset($_GET["dir"]) ) { 
?>
<h1>evolt.org Browser Archive</h1>
<h2><strong>Who archived all these?</h2>
<p>One of the founding members of evolt.org,
<a href="http://roselli.org/adrian" target="_new" title="Adrian's Personal Gallery">Adrian Roselli</a>
(or <a href="http://evolt.org/user/88" title="Link to Articles"><i>aardvark</i></a>
for those of you who visit the site or are on the mailing list), has provided
the archive as well as its support through his company,
<a href="http://algonquinstudios.com" target="_new" title="Visit Algonquin Studios - Opens New Window">Algonquin Studios</a>.
You can see more information at his <a href="http://evolt.org/article/evolt/21/352/index.html" title="Article on evolt.org">archive announcement</a>.
</p>
<p>
<!-- Submissions should be sent to <a href="mailto:roselli@algonquinstudios.com">Adrian</a> in the form of a URL so that he may download it when he is at his DSL line. -->
Browser submissions should be sent in the form of a URL using
<a href="http://evolt.org/contact/">our contact form</a>, so that evolt.org
staff can download the software into the master archive.
</p>

<h3>Recent Changes to the Archive ...</h3>
<tt><?php passthru("head -3 CHANGELOG"); ?></tt>
<p><small>Note that updates to the Archive may take ~ 24-48 hours to reach mirror sites.</small></p>

<h2>And so, to the Archive ...</h2>
<?php
	} 
	include "assets/external/encodeexplorer/index.php";
	include "assets/inc/page-content-shut.inc";
	include "assets/inc/page-footer.inc";
	include "assets/inc/page-stop.inc";
}

}
?>
