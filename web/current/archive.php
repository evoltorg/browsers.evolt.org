<?php
// browserarchive.org aka browsers.evolt.org
// Copyright (c) 1999-2013 Adrian Roselli, William Anderson

$headertext = "browsers.evolt.org: ";
$path=urldecode($_GET["file"]); //remove url encoding.
$path=str_replace("..","",$path); // disallow directory up.
$path=preg_replace("/\/+/", "/", $path); // remove duplicate slashes.
if($path == "/") { $path = ""; }
if($path[0]=="/"){ $path=substr($path,1,strlen($path)-1); } // Remove leading slash.
if(substr($path,strlen($path)-1,1) =="/"){ $path=substr($path,0,strlen($path)-1);} // Remove trailling slash.
$filerequest = $path;
if ( $filerequest == "" || $filerequest == "archive" ) { header("Location: /",302); }

include "assets/inc/00-functions.inc";
include "data.inc";
$browserreq = array_slice(explode("/",$filerequest),1,1);
$browsercode = $browserreq[0];
$site_name = "browsers.evolt.org";
$html_title = $browsers[$browsercode]["name"];
if ( $browsercode != "" ) {
	$page_title = $browsers[$browsercode]["name"];
} else {
	$page_title = $site_name;
}
$short_title = $browsers[$browsercode]["name"];
$page_type = "page";
$upstairs_uri = "/";
$upstairs_title = "Browser Archive";
include "assets/inc/10-header.inc";
include "assets/inc/20-message.inc";

  function getFileList($dir)
  {
    // array to hold return value
    $retval = array();

    // add trailing slash if missing
    if(substr($dir, -1) != "/") $dir .= "/";

    // open pointer to directory and read list of files
    $d = @dir($dir) or die("getFileList: Failed opening directory $dir for reading");
    while(false !== ($entry = $d->read())) {
      // skip hidden files
      if($entry[0] == ".") continue;
      if(is_dir("$dir$entry")) {
        $retval[] = array(
          "name" => "$dir$entry/",
          "type" => filetype("$dir$entry"),
          "size" => 0,
          "lastmod" => filemtime("$dir$entry")
        );
      } elseif(is_readable("$dir$entry")) {
        $retval[] = array(
          "name" => "$dir$entry",
          "type" => mime_content_type("$dir$entry"),
          "size" => filesize("$dir$entry"),
          "lastmod" => filemtime("$dir$entry")
        );
      }
    }
    $d->close();

    return $retval;
  }

?>
<div class="wrapper">
    <section id="content" class="full-width" role="main">
    	<div class="p100">
			<p class="notice error"><strong>Pardon our dust!</strong> This iteration of <strong>browsers.evolt.org</strong> is under test, containing content which has not yet been finalized.</p>
		</div>
		<div class="p66">
			<h2><?php echo $filerequest ?></h2>
<table>
	<tr><td><img src="/assets/img/null.png" style="vertical-align:middle" height="32" width="32" alt="[ UP]" /></td><td><a href="../">..</a></td><td></td><td></td></tr>
<?php
$dirlist = getFileList($_SERVER['DOCUMENT_ROOT']."/".$filerequest);
//echo "<pre>".print_r($dirlist)."</pre>";
foreach($dirlist as $file) {
	if ( $file['type'] == "dir" ) {
		$file['name'] = str_replace($_SERVER['DOCUMENT_ROOT'],"",$file['name']);
	    ?>
	    <tr>
	    <td><img src="/assets/img/null.png" style="vertical-align:middle" height="32" width="32" alt="[DIR]" /></td>
	    <td><a href="<?php echo "/browsers".$file['name'] ?>"><?php 
	    $display_name = explode("/",$file['name']);
	    end($display_name);
	    echo prev($display_name);
	    ?></a><br /><small class="small"><font color="#888888"><?php echo date('Y-m-d H:m', $file['lastmod']) ?></font></small></td>
	    <td>&nbsp;</td>
	    <td></td>
	    </tr>
	    <?php
	}
}
foreach($dirlist as $file) {
	if ( $file['type'] != "dir" ) {
		$file['name'] = str_replace($_SERVER['DOCUMENT_ROOT'],"",$file['name']);
	    ?>
	    <tr>
	    <td><?php 
	    $fileext = end(explode(".",$file['name']));
	    if ( file_exists($_SERVER['DOCUMENT_ROOT']."/assets/img/mime-icons/file_extension_".$fileext.".png") ) {
	    	?><img src="/assets/img/mime-icons/file_extension_<?php echo $fileext ?>.png" style="vertical-align:middle" height="32" width="32" alt="[<?php echo strtoupper($fileext) ?>]" /><?php
	    } else {
	    	?><img src="/assets/img/mime-icons/file_extension_unknown.png" style="vertical-align:middle" height="32" width="32" alt="[???]" /><?php
	    }
	    ?></td>
	    <td><a href="<?php echo $file['name'] ?>"><?php 
	    $display_name = explode("/",$file['name']);
	    echo end($display_name);
	    ?></a><br /><small class="small"><font color="#888888"><?php echo date('Y-m-d H:m', $file['lastmod']) ?>&nbsp;<?php echo $file['size'] ?></font></small></td>
	    <td>&nbsp;</td>
	    <td></td>
	    </tr>
	    <?php
	}
}
?>
</table>

		</div>
		<?php include "assets/inc/30-adsense.inc" ?>
	</section>
</div>
<?
include "assets/inc/99-footer.inc";
?>
