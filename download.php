<?php

// beobrowser.php
// 
// (c) 2002 William Anderson <neuro@well.com> 
//          http://neuro.me.uk/projects/evolt.org/

// figure out what's being asked for
$filerequest = getenv("QUERY_STRING");

// hey, they didn't ask for anything!  gits!
if ($filerequest == "") 
{
	$errorText = <<< TEXTEND
<html>
<head>
<meta http-equiv="refresh" content="0; url=http://browsers.evolt.org/">
</head>
<body></body>
</html>
TEXTEND;

	//show the above text and get the hell outta here
	print($errorText);
}
else
// hey, they want stuff!  look lively!
{

	// start the skinning process mister spock
	include("beodl/beo-header.html");

	// this is probably an evil way to replicate the unix
	// basename function, which grabs the actual filename
	// from a full directory path, e.g. /usr/bin/ls would
	// return ls.
	for ($token = strtok($filerequest, "/");
		$token != "";
		$token = strtok("/"))
	{
		$dirstructure[] = $token;
	}
	$fileBasename = count($dirstructure) - 1;

	// hey, say thanks and kick off an unordered list would ya?
	$downloadText1 = <<< TEXTEND
    <table width="100%" border="0" cellpadding="4" cellspacing="0">
    <tr>
      <!-- Page Title -->
<td align="right" class="pageTitle1" nowrap valign="middle"><h1>browser&nbsp;</h1></td>
        <td class="pageTitle2" valign="middle"><h1>&nbsp;download</h1></td>

      <!-- /Page Title -->
    </tr>
    <tr>
      <td valign="top" align="right">
      
      </td>
      <td valign="top" class="content">
    
      <table align="right" border="0" cellpadding="10" cellspacing="0" class="border" style="margin: 0px 0px 10px 10px">
      <tr valign="top">
        <td class="side" align="left">
<strong>
The file you're after is available<br>
at the following locations:<br>
</strong>
        <img src="images/spacer.gif" height="5" width="170" border="0" alt=""><br>
        
        <hr noshade size="1">

	<br>

TEXTEND;

	$rawFilesize = filesize(substr($filerequest,1,strlen($filerequest)));
	$filesizeBits = $rawFilesize * 8;
	$filesizeBytes = number_format($rawFilesize);
	$filesizeKBytes = number_format($rawFilesize / 1024, 2);
	$filesizeMBytes = number_format($rawFilesize / 1024 / 1024, 2);

	// the +1 is just a crude uprounding method - if anyone
	// knows of a better way, do let me know ;)
	$time336 = ( $filesizeBits / 34406 ) + 1;
	$time56K = ( $filesizeBits / 57334 ) + 1;
	$timeISDN = ( $filesizeBits / 131072 ) + 1;
	$timeADSL = ( $filesizeBits / 524288 ) + 1;
	$timeT1 = ( $filesizeBits / 1572864 ) + 1;

	$downloadTime336 = number_format($time336, 0) . " secs";
	if ( $time336 > 60 ) { $downloadTime336 = number_format($time336 / 60, 0) . " mins"; }
	if ( $time336 > 3600 ) { $downloadTime336 = number_format($time336 / 60 / 60, 2) . " hrs"; }
	$downloadTime56K = number_format($time56K, 0) . " secs";
	if ( $time56K > 60 ) { $downloadTime56K = number_format($time56K / 60, 0) . " mins"; }
	if ( $time56K > 3600 ) { $downloadTime56K = number_format($time56K / 60 / 60, 2) . " hrs"; }
	$downloadTimeISDN = number_format($timeISDN, 0) . " secs";
	if ( $timeISDN > 60 ) { $downloadTimeISDN = number_format($timeISDN / 60, 0) . " mins"; }
	if ( $timeISDN > 3600 ) { $downloadTimeISDN = number_format($timeISDN / 60 / 60, 2) . " hrs"; }
	$downloadTimeADSL = number_format($timeADSL, 0) . " secs";
	if ( $timeADSL > 60 ) { $downloadTimeADSL = number_format($timeADSL / 60, 0) . " mins"; }
	if ( $timeADSL > 3600 ) { $downloadTimeADSL = number_format($timeADSL / 60 / 60, 2) . " hrs"; }
	$downloadTimeT1 = number_format($timeT1, 0) . " secs";
	if ( $timeT1 > 60 ) { $downloadTimeT1 = number_format($timeT1 / 60, 0) . " mins"; }
	if ( $timeT1 > 3600 ) { $downloadTimeT1 = number_format($timeT1 / 60, 2) . " hrs"; }

	$downloadText2= <<< TEXTEND

        <hr noshade size="1">

        <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr><td class="side"><strong>Filename:</strong></td>
	<td align="right" class="side"><strong>$dirstructure[$fileBasename]</strong></td></tr>
        <tr><td class="side" valign="top">Size:</td><td align="right" class="side">
<!-- $filesizeBytes bytes<br> -->
$filesizeKBytes KB<br>
$filesizeMBytes MB</td></tr>

        <tr><td class="side" valign="top">Download time:&nbsp;&nbsp;<br>(approx)</td>
	<td align="right" class="side">

	<table border="0" cellpadding="0" cellspacing="0">
	<tr><td nowrap class="side" align="right">$downloadTime336&nbsp;</td>
	    <td class="side" align="center">@</td>
	    <td nowrap class="side" align="left">&nbsp;33.6kbps</td></tr>
	<tr><td nowrap class="side" align="right">$downloadTime56K&nbsp;</td>
	    <td class="side" align="center">@</td>
	    <td nowrap class="side" align="left">&nbsp;56kbps</td></tr>
	<tr><td nowrap class="side" align="right">$downloadTimeISDN&nbsp;</td>
	    <td class="side" align="center">@</td>
	    <td nowrap class="side" align="left">&nbsp;128kbps</td></tr>
	<tr><td nowrap class="side" align="right">$downloadTimeADSL&nbsp;</td>
	    <td class="side" align="center">@</td>
	    <td nowrap class="side" align="left">&nbsp;512kbps</td></tr>
	<tr><td nowrap class="side" align="right">$downloadTimeT1&nbsp;</td>
	    <td class="side" align="center">@</td>
	    <td nowrap class="side" align="left">&nbsp;1.5mbps</td></tr>
	</table>

	</td></tr>
        </table>
	<br>
	Please note the download speed can<br>
	be dependant on the mirror that you<br>
	are downloading from.<br>

      </td>
      </tr>
      </table>

<p><strong class="title">
Thanks for using evolt.org's Browser Archive &#8212; the Internet's leading
source for web browsers, old and new.
</strong></p>

<p>
The file you have requested can be downloaded by clicking on one of the
mirror links in the box on the right.
</p>
<p>
These downloads are made available by our mirror providers who help us
deliver evolt.org services worldwide. Please support the individuals and
organisations who support evolt.org.
</p> <!-- 
<p>
If you would like to support evolt.org and have the resources to share
the Browser Archive load, you can read more about becoming a mirroring
sponsor: <a href="http://evolt.org/somewhere/">Mirror the Browser Archive</a>.
</p> -->
<p>
Testing with browsers from the archive keeps your clients happy and your
services professional. Read about <a href="http://evolt.org/help_support_evolt/">how you can support evolt.org</a>.
</p>
<p>
In addition to the Browser Archive, evolt.org also provides a number of
resources for the Web development community including our member-driven
email discussion list 
<a href="http://lists.evolt.org/index.cfm/a/listinfo">thelist</a>
and our Web site <a href="http://evolt.org/">evolt.org</a> containing
current articles, tutorials and news.
</p>
<p>
If you have any problems with the Browser Archive or any questions about
evolt.org, please <a href="http://evolt.org/contact/">let us know</a>.
</p>
TEXTEND;
	
	print($downloadText1);

	// hmmm, let's find out what mirrors we can use
	$dataFile = "beodl/mirrors.csv";
	// and let's play nice with the file system ...
	if (file_exists($dataFile))
	{
		$browserFileOK = "yes";
	}
	else
	{
		$browserFileOK = "no";
		$downloadError = "couldn't open data file for browsers";
	}
	
	// ok, if our mirror data file exists ...
	if ($browserFileOK == "yes")
	{
		// ... then let's take a peek ...
		if ($downloadFile = fopen($dataFile,"r"))
		{
			// ... and let's keep goin' until it's empty
			while(!feof($downloadFile))
			{
				// "Show me, what you're made of"
				$downloadField = fgetcsv($downloadFile,1024);
				
				// "I've seen things you people wouldn't believe"
				$downloadPath = $downloadField[2] . $filerequest;
				
				// "Attack ships on fire, off the shoulder of Orion"
				if ( $downloadField[1] != "" )
				{
					print "&raquo; <code>[$downloadField[3]]</code> <a href=\"$downloadPath\">$downloadField[1]</a><br>\n";
				}
			}
			// we don't need this stinking file anymore!!
			fclose($downloadFile);
		}
		else
		// bad things ...
		{
			print "&raquo; $downloadError<br>\n";
		}
	}

	// clear out of the unordered list
	print "<br>\n";
	//show the above text and get the hell outta here
	print($downloadText2);

	// awww, beo has feet?  how cute!
	include("beodl/beo-footer.html");
}

?>
