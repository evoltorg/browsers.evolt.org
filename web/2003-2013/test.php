<?php

// [PHP_UK] Directory browser script by Paul Macdonald, Chris James, Patrick Bierans 
// Based on code by Paul Macdonald. Extended by Chris James. Assisted by Patrick Bierans.
// paul@ifdnrg.com, chris.james@gmx.co.uk, pbierans@lynet.de		
// http://www.chrisjames.co.uk/php-stuff/

// release 12th April 2002.

// Note: you'll also need the files in the (hidden) picons.dir directory.

	// Prevent caching.
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past 
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified 
    header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1 
    header("Pragma: no-cache"); 

include("beodl/beo-header.mirrors.html");
?>

<table width="100%" border="0" cellpadding="4" cellspacing="0">
<tr>
        <!-- Page Title -->
        <td align="right" class="pageTitle1" colspan=2 nowrap valign="middle"><h1>browser&nbsp;</h1></td>
        <td class="pageTitle2" valign="middle"><h1>&nbsp;archive</h1></td>
        <!-- /Page Title -->
</tr>
<tr>
  <td valign="top" align="right">
  </td>
  <td valign="top" class="content">



 <tr>
  <td colspan="4"><img src="http://leo.evolt.org/images/spacer.gif" width="1" height="5" alt=""></td>
 </tr>
<tr>
  <td>&nbsp;</td>


<?
$line = getenv("QUERY_STRING");
if ( $line == "" ) {
?>

	
  <td valign="top" colspan="2">
		<! -- Browser Archive About -->
		<p>
		<strong>Who archived all these?</strong><br>
		One of the founding members of evolt.org, <a href="http://roselli.org/adrian" target="_new" title="Adrian's Personal Gallery">Adrian Roselli</a> (or <a href="http://evolt.org/user/aardvark/88/index.html" title="Link to Articles"><i>aardvark</i></a> for those of you who visit the site or are on the mailing list), has provided the archive as well as its support through his company, <a href="http://algonquinstudios.com" target="_new" title="Visit Algonquin Studios - Opens New Window">Algonquin Studios</a>.  You can see more information at his <a href="http://evolt.org/article/evolt/21/352/index.html" title="Article on evolt.org">archive announcement</a>.  Submissions should be sent to <a href="mailto:roselli@algonquinstudios.com">Adrian</a> in the form of a URL so that he may download it when he is at his DSL line.
		</p>
		<! -- /Browser Archive About -->

  </td>
</tr>
 <tr>
  <td colspan="4"><img src="http://leo.evolt.org/images/spacer.gif" width="1" height="5" alt=""></td>
 </tr>

	<!-- Browsers -->
<tr>
	<!-- Page Title -->
	<td align="right" class="pageTitle1" nowrap valign="middle"><h1>&nbsp;</h1></td>
	<td class="pageTitle2" valign="middle" colspan="2"><h1>&nbsp;browsers</h1></td>

	<!-- /Page Title -->
</tr>

<tr>
  <td>&nbsp;</td>
  <td valign="top" colspan="2">

<!-- Begin Two-Column Content Table(s) -->
        <table>
         <tr>
          <td valign="top">
		 
<!-- ## Start Column 1 -->

<p>
<a href="/?1x/"><strong class="title">1x</strong></a><br>
&nbsp;Science Traveller International
</p>

<p>
<a href="/?airmosaicdemo/"><strong class="title">Air Mosaic Demo</strong></a><br>
&nbsp;Sprynet
</p>

<p>
<a href="/?allworld/"><strong class="title">AllWorld Explorer</strong></a><br>
&nbsp;G.O. International Air Service
</p>

<p>
<a href="/?amaya/"><strong class="title">Amaya</strong></a><br>
&nbsp;W3C
</p>

<p>
<a href="/?arachne/"><strong class="title">Arachne</strong></a><br>
&nbsp;xChaos
</p>

<p>
<a href="/?arcweb/"><strong class="title">ArcWeb</strong></a><br>
&nbsp;Stewart Brodie
</p>

<p>
<a href="/?ariadna/"><strong class="title">Ariadna</strong></a><br>
&nbsp;Advanced Multimedia System Design
</p>

<p>
<a href="/?atomnet/"><strong class="title">AtomNet</strong></a><br>
&nbsp;Change 7
</p>

<p>
<a href="/?aweb/"><strong class="title">AWeb</strong></a><br>
&nbsp;AmiTrix
</p>

<p>
<a href="/?beonex/"><strong class="title">Beonex</strong></a><br>
&nbsp;Ben Bucksch
</p>

<p>
<a href="/?bobby/"><strong class="title">Bobby</strong></a><br>
&nbsp;Center for Applied Special Technology
</p>

<p>
<a href="/?bohemian/"><strong class="title">Bohemian Net Browser</strong></a><br>
&nbsp;BohemianNet
</p>

<p>
<a href="/?brownie/"><strong class="title">BrownIE</strong></a><br>
&nbsp;Compunet
</p>

<p>
<a href="/?browse2000/"><strong class="title">Browse2000</strong></a><br>
&nbsp;1st Choice Software
</p>

<p>
<a href="/?cab/"><strong class="title">CAB</strong></a><br>
&nbsp;Alexander Clauss
</p>

<p>
<a href="/?cello/"><strong class="title">Cello</strong></a><br>
&nbsp;Thomas Bruce
</p>

<p>
<a href="/?charlie/"><strong class="title">Charlie</strong></a><br>
&nbsp;Mundial Avenue
</p>

<p>
<a href="/?chibrow/"><strong class="title">ChiBrow</strong></a><br>
&nbsp;KCS & Associates
</p>

<p>
<a href="/?chimera/"><strong class="title">Chimera</strong></a><br>
&nbsp;University of Nevada Las Vegas
</p>

<p>
<a href="/?lion-custom/"><strong class="title">Custom Browser</strong></a><br>
&nbsp;LION
</p>

<p>
<a href="/?cyberdog/"><strong class="title">Cyberdog</strong></a><br>
&nbsp;Apple Computer, inc.
</p>

<p>
<a href="/?cybergate/"><strong class="title">CyberGate</strong></a><br>
&nbsp;BlackSun Interactive
</p>

<p>
<a href="/?cyberpassage/"><strong class="title">Cyber Passage</strong></a><br>
&nbsp;Sony
</p>

<p>
<a href="/?digicams/"><strong class="title">DigiCams</strong></a><br>
&nbsp;DigiBand
</p>

<p>
<a href="/?doslynx/"><strong class="title">DOSLynx</strong></a><br>
&nbsp;University of Kansas
</p>

<p>
<a href="/?dr-webspyder/"><strong class="title">DR-WebSpyder</strong></a><br>
&nbsp;Caldera
</p>

<p>
<a href="/?emacs-w3/"><strong class="title">Emacs-W3</strong></a><br>
&nbsp;William M. Perry
</p>

<p>
<a href="/?emissary/"><strong class="title">Emissary</strong></a><br>
&nbsp;Attachmate
</p>

<p>
<a href="/?freewebbrowser/"><strong class="title">FreeWebBrowser</strong></a><br>
&nbsp;Yellow Tree Services
</p>

<p>
<a href="/?galahad/"><strong class="title">Galahad</strong></a><br>
&nbsp;Jean van Waterschoot
</p>

<p>
<a href="/?goanywhere/"><strong class="title">goAnywhere!</strong></a><br>
&nbsp;Mikey LeBeau
</p>

<p>
<a href="/?grail/"><strong class="title">Grail</strong></a><br>
&nbsp;Corporation for National Research Initiatives
</p>

<p>
<a href="/?grasshopper/"><strong class="title">GrassHopper MDI Explorer</strong></a><br>
&nbsp;Santrim Software
</p>

<p>
<a href="/?handweb/"><strong class="title">HandWeb</strong></a><br>
&nbsp;Smartcode Software
</p>

<p>
<a href="/?hexabitjunior/"><strong class="title">HexaBit Junior</strong></a><br>
&nbsp;HexaBit
</p>

<p>
<a href="/?homepagereader/"><strong class="title">Home Page Reader</strong></a><br>
&nbsp;IBM
</p>

<p>
<a href="/?hotjava/"><strong class="title">HotJava</strong></a><br>
&nbsp;Sun Microsystems
</p>

<p>
<a href="/?i-comm/"><strong class="title">I-comm</strong></a><br>
&nbsp;Talent Communications
</p>

<p>
<a href="/?i-o-d-4/"><strong class="title">I-O-D-4 - The Web Stalker</strong></a><br>
&nbsp;Escape
</p>

<p>
<a href="/?i-view/"><strong class="title">I-View</strong></a><br>
&nbsp;EnReach Technology
</p>

<p>
<a href="/?ibrowse/"><strong class="title">iBrowse</strong></a><br>
&nbsp;Omnipresence International
</p>

<p>
<a href="/?icab/"><strong class="title">iCab</strong></a><br>
&nbsp;Alexander Clauss & iCab Company
</p>

<p>
<a href="/?ie-sprynet/"><strong class="title">Internet Explorer</strong></a><br>
&nbsp;Sprynet
</p>

<p>
<a href="/?ie/"><strong class="title">Internet Explorer</strong></a><br>
&nbsp;Microsoft
</p>

<p>
<a href="/?internet-plus/"><strong class="title">Internet Plus</strong></a><br>
&nbsp;Dean Software Design
</p>

<p>
<a href="/?internet-workhorse/"><strong class="title">Internet WorkHorse</strong></a><br>
&nbsp;MarketNet
</p>

<p>
<a href="/?kidnet/"><strong class="title">KidNet Explorer</strong></a><br>
&nbsp;Resource Communications
</p>

<p>
<a href="/?kidssafe-explorer/"><strong class="title">KidSafe Explorer</strong></a><br>
&nbsp;Arlington Technology
</p>

<p>
<a href="/?lis/"><strong class="title">LIS Web Browser</strong></a><br>
&nbsp;Lahman Internet Services
</p>

<p>
<a href="/?lynx/"><strong class="title">Lynx</strong></a><br>
&nbsp;Distributed Computing Group
</p>

<p>
<a href="/?maclynx/"><strong class="title">MacLynx</strong></a><br>
&nbsp;Olivier Gutknecht
</p>

<p>
<a href="/?macweb/"><strong class="title">MacWeb</strong></a><br>
&nbsp;TradeWave (EINet)
</p>

<p>
<a href="/?macwww/"><strong class="title">MacWWW (Samba)</strong></a><br>
&nbsp;CERN
</p>

<p>
<a href="/?mathbrowser/"><strong class="title">MathBrowser</strong></a><br>
&nbsp;MathSoft
</p>

<p>
<a href="/?microviet/"><strong class="title">Microviet First Explorer</strong></a><br>
&nbsp;Microviet
</p>

<p>
<a href="/?minuet/"><strong class="title">Minuet</strong></a><br>
&nbsp;University of Minnesota
</p>

<p>
<a href="/?mosiac-ncsa/"><strong class="title">Mosaic</strong></a><br>
&nbsp;National Center for Supercomputing Applications
</p>

<p>
<a href="/?mosiac-quarterdeck/"><strong class="title">Mosaic</strong></a><br>
&nbsp;QuarterDeck
</p>



<!-- ## End Column 1 -->
          </td>
          <td>&nbsp;&nbsp;</td>
          <td valign="top">
<!-- ## Start Column 2 -->


<p>
<a href="/?mosiac-spry/"><strong class="title">Mosaic</strong></a><br>
&nbsp;SpryNet
</p>

<p>
<a href="/?mosiac-spyglass/"><strong class="title">Mosaic</strong></a><br>
&nbsp;Spyglass
</p>

<p>
<a href="/?mozilla/"><strong class="title">Mozilla</strong></a><br>
&nbsp;The Mozilla Organization
</p>

<p>
<a href="/?multilingualmosaic/"><strong class="title">Multilingual Mosaic</strong></a><br>
&nbsp;Accent Software
</p>

<p>
<a href="/?multiwebviewer/"><strong class="title">MultiWeb Viewer</strong></a><br>
&nbsp;MultiSource
</p>

<p>
<a href="/?mybrowser/"><strong class="title">MyBrowser</strong></a><br>
&nbsp;Softorange
</p>

<p>
<a href="/?navigator/"><strong class="title">Navigator</strong></a><br>
&nbsp;Netscape Communications Corporation
</p>

<p>
<a href="/?ncompass/"><strong class="title">NCompass</strong></a><br>
&nbsp;ExCITE
</p>

<p>
<a href="/?neoplanet/"><strong class="title">NeoPlanet</strong></a><br>
&nbsp;NeoPlanet
</p>

<p>
<a href="/?net-tamer/"><strong class="title">Net-Tamer</strong></a><br>
&nbsp;Net-Tamer
</p>

<p>
<a href="/?netcaptor/"><strong class="title">NetCaptor</strong></a><br>
&nbsp;Stilesoft
</p>

<p>
<a href="/?netcruiser/"><strong class="title">NetCruiser</strong></a><br>
&nbsp;Netcom
</p>

<p>
<a href="/?netforkids/"><strong class="title">NetForKids</strong></a><br>
&nbsp;WebData Communications
</p>

<p>
<a href="/?netmanager/"><strong class="title">Net M@anager</strong></a><br>
&nbsp;Virtual Innovations
</p>

<p>
<a href="/?netomat/"><strong class="title">Netomat</strong></a><br>
&nbsp;Maciej Wisniewski
</p>

<p>
<a href="/?netpositive/"><strong class="title">NetPositive</strong></a><br>
&nbsp;Be, Inc.
</p>

<p>
<a href="/?netsentry/"><strong class="title">NetSentry</strong></a><br>
&nbsp;Natdat
</p>

<p>
<a href="/?netshark/"><strong class="title">NetShark</strong></a><br>
&nbsp;InterCon
</p>

<p>
<a href="/?netshift/"><strong class="title">NetShift</strong></a><br>
&nbsp;NetShift Software
</p>

<p>
<a href="/?nothin-but-net/"><strong class="title">Nuthin' But Net</strong></a><br>
&nbsp;PAKSoft Productions
</p>

<p>
<a href="/?offbyone/"><strong class="title">Off By One</strong></a><br>
&nbsp;Home Page Software
</p>

<p>
<a href="/?omniweb/"><strong class="title">OmniWeb</strong></a><br>
&nbsp;OmniGroup
</p>

<p>
<a href="/?opera/"><strong class="title">Opera</strong></a><br>
&nbsp;Opera Software
</p>

<p>
<a href="/?powerbrowser/"><strong class="title">PowerBrowser</strong></a><br>
&nbsp;Oracle
</p>

<p>
<a href="/?prostream/"><strong class="title">ProStream Browser</strong></a><br>
&nbsp;PS Group
</p>

<p>
<a href="/?pwwebspeak/"><strong class="title">pwWebSpeak Plus</strong></a><br>
&nbsp;The Productivity Works
</p>

<p>
<a href="/?pythia/"><strong class="title">Pythia</strong></a><br>
&nbsp;Appian Interactive
</p>

<p>
<a href="/?quickscape/"><strong class="title">QuickScape</strong></a><br>
&nbsp;Quickscape
</p>

<p>
<a href="/?santasbrowser/"><strong class="title">Santa's Browser</strong></a><br>
&nbsp;Branded Browser Technologies
</p>

<p>
<a href="/?simulbrowse/"><strong class="title">SimulBrowse</strong></a><br>
&nbsp;Seaglass Software
</p>

<p>
<a href="/?sitekiosk/"><strong class="title">SiteKiosk</strong></a><br>
&nbsp;ProVisio GmbH
</p>

<p>
<a href="/?slipknot/"><strong class="title">SlipKnot</strong></a><br>
&nbsp;MicroMind
</p>

<p>
<a href="/?softerm-plus/"><strong class="title">Softerm Plus</strong></a><br>
&nbsp;Softronics
</p>

<p>
<a href="/?superhighway/"><strong class="title">SuperHighway Browser</strong></a><br>
&nbsp;Frontier Technologies
</p>

<p>
<a href="/?surfin-annette/"><strong class="title">Surfin' Annette</strong></a><br>
&nbsp;SpyCatcher
</p>

<p>
<a href="/?surfmonkey/"><strong class="title">SurfMonkey</strong></a><br>
&nbsp;MediaLive
</p>

<p>
<a href="/?talking_browser/"><strong class="title">Talking Browser</strong></a><br>
&nbsp;WeMedia
</p>

<p>
<a href="/?talva/"><strong class="title">Talva Document Explorer</strong></a><br>
&nbsp;Talva
</p>

<p>
<a href="/?tango/"><strong class="title">Tango Multilingual</strong></a><br>
&nbsp;Alis Technologies
</p>

<p>
<a href="/?tobrowser-emailer/"><strong class="title">The Other Browser-Emailer</strong></a><br>
&nbsp;Pixelogic
</p>

<p>
<a href="/?udiwww/"><strong class="title">UdiWWW</strong></a><br>
&nbsp;Bernd Richter
</p>

<p>
<a href="/?videoonline/"><strong class="title">Video On Line Browser</strong></a><br>
&nbsp;Video On Line
</p>

<p>
<a href="/?voyager/"><strong class="title">Voyager</strong></a><br>
&nbsp;VaporWare
</p>

<p>
<a href="/?wannabe/"><strong class="title">WannaBe</strong></a><br>
&nbsp;David T. Pierson
</p>

<p>
<a href="/?web-o-matic/"><strong class="title">Web-O-Matic Digital Browser</strong></a><br>
&nbsp;Circle Group Internet, Inc.
</p>

<p>
<a href="/?web-surface/"><strong class="title">Web SurfACE</strong></a><br>
&nbsp;ToolPool
</p>

<p>
<a href="/?web-talkit/"><strong class="title">Web-Talkit</strong></a><br>
&nbsp;Grover Industries
</p>

<p>
<a href="/?webexplorer/"><strong class="title">WebExplorer</strong></a><br>
&nbsp;IBM
</p>

<p>
<a href="/?webprowler/"><strong class="title">WebProwler</strong></a><br>
&nbsp;MacroByte
</p>

<p>
<a href="/?webracer/"><strong class="title">WebRacer</strong></a><br>
&nbsp;Software Savvy
</p>

<p>
<a href="/?websurfer/"><strong class="title">Websurfer</strong></a><br>
&nbsp;NetManage
</p>

<p>
<a href="/?webtv/"><strong class="title">WebTV Viewer</strong></a><br>
&nbsp;WebTV Networks
</p>

<p>
<a href="/?webview/"><strong class="title">WebView</strong></a><br>
&nbsp;South Pacific Information Services
</p>

<p>
<a href="/?webwhacker/"><strong class="title">WebWhacker</strong></a><br>
&nbsp;Blue Squirrel
</p>

<p>
<a href="/?wildcat/"><strong class="title">Wildcat Navigator</strong></a><br>
&nbsp;Harmony International
</p>

<p>
<a href="/?winweb/"><strong class="title">WinWEB</strong></a><br>
&nbsp;TradeWave (EINet)
</p>

<p>
<a href="/?worldwideweb/"><strong class="title">WorldWideWeb (Nexus)</strong></a><br>
&nbsp;Tim Berners-Lee
</p>

<!-- ## End Column 2 -->
          </td>
         </tr>
        </table>
<!-- End Two-Column Content Table(s) -->
<!-- ################################################ -->



<!-- ############################### -->
<!-- ############################### -->
  </td>
</tr>
 <tr>
  <td colspan="4"><img src="http://leo.evolt.org/images/spacer.gif" width="1" height="5" alt=""></td>
 </tr>
<tr>
	<!-- Page Title -->
	<td align="right" class="pageTitle1" colspan=2 nowrap valign="middle"><h1>&nbsp;untested</h1></td>
	<td class="pageTitle2" valign="middle"><h1>&nbsp;browsers</h1></td>
	<!-- /Page Title -->
</tr>
 <tr>
  <td colspan="4"><img src="http://leo.evolt.org/images/spacer.gif" width="1" height="5" alt=""></td>
 </tr>

<tr>
  <td>&nbsp;</td>
  <td valign="top" colspan="2">
		<p>
		These browsers have not been tested, and are not documented.  Don't even think of downloading or installing them. If you have information on them, however, please contact Adrian Roselli (aardvark).
		</p>
        <table>
         <tr>
          <td valign="top">
<!-- ## Start Column 1 -->
<p>
<a href="/?unchecked/proxiweb/"><strong class="title">Proxiweb</strong></a><br>
&nbsp;ProxiNet, Inc.<br>
&nbsp;<em>Need Archive</em>
</p>
<!-- ## End Column 1 -->
          </td>
          <td>&nbsp;&nbsp;</td>
          <td valign="top">
<!-- ## Start Column 2 -->
<!-- ## End Column 2 -->
          </td>
         </tr>
        </table>
<?
} else {

?>
<td valign="top" colspan="2">
<?

// Set the page text
$headertext = "browsers.evolt.org:";
$footertext = "[PHP_UK] Directory browser script by Paul Macdonald, Chris James, Patrick Bierans";

// Set the URL to pass filenames to. Use this if you want to pass the filename to another php script.
$filepass = "";

// initialize arrays
$folders= array();
$files=array();

// Get and clean up the current path.
if (!$path && $QUERY_STRING!='') {  $path=current(split("&",$QUERY_STRING)); } //allow use of ?path
$path=urldecode($path); //remove url encoding.
$path=str_replace("..","",$path); // disallow directory up.
$path=preg_replace("/\/+/", "/", $path); // remove duplicate slashes.
if($path == "/") { $path = ""; }
if($path[0]=="/"){ $path=substr($path,1,strlen($path)-1); } // Remove leading slash.
if(substr($path,strlen($path)-1,1) =="/"){ $path=substr($path,0,strlen($path)-1);} // Remove trailling slash.

// Set the Date format
$dateformat = "F j Y h:i:s A"; 

// Document Root should only be above current root. Current dir = ""; 
$root="/.archivelist"; // No leading or trailling slashes

// If path is passed in get string then add it to docroot.
if ($root) { $root .= "/"; }
$docroot="./$root".$path."/"; // Actual Path
$sendroot="/";

// Open Directory - if the path is invalid then say so and exit.
if(!$handle=@opendir($docroot)) { 
	echo "Invalid Path";
	exit(); 
}

// Loop around $file array.
while (false !== ($file = readdir($handle))) { 
		
		if ($file=="."){}  // If the file is the current directory, then ignore
		elseif ($file=="picons.dir"){}  // If the file is the icons directory then ignore.
		elseif ($file==basename($PHP_SELF)){} // ignore this file in directory.
		elseif($file=="..") { // allow directory traversal only on dirs above root.
		if (($path)&&($path != ".")&&($path != "./")) {
			
			$updir=explode("/", $path); // explode the array.
			$updir[count($updir)-1] = ""; // set the last path to nothing
			$updir=implode("/",$updir); // implode the array
			if(substr($updir,strlen($updir)-1,1) =="/"){ $updir=substr($updir,0,strlen($updir)-1);} // Remove trailling slash.

			$folders[]="<tr><td><a href='?".$updir."'><img src='/icons/back.gif' border='0'></a></td><td><a href ='?".$updir."'>..</a></td><td></td></tr>\n";	
			} 
		}

		elseif (is_dir($docroot.$file)) // check if the file is directory
  		{
			
		// If it's a directory create a clickable link.
		if ($path) { $sep = "/"; }
		$folders[]="<tr><td><a href ='?".$path.$sep.$file."'><img src='/icons/dir.gif' border=0></a></td><td><a href ='?".$path.$sep.$file."'>".$file."</a><td><td>". date($dateformat,filemtime($docroot))."</td></tr>\n";	
		}

		else {
		if ($path) { $sep = "/"; }
			// Else file is just a normal file - so create a link with stats.
			$filesize= size4humans(filesize($docroot.$file));
			$files[]="<tr><td><a href='download.php?".$filepass.$sendroot.$path.$sep.$file."'><img src='/icons/generic.gif' border=0></a></td><td><a href='download.php?".$filepass.$sendroot.$path.$sep.$file."'>".$file."</a></td><td>$filesize</td><td>". date($dateformat,  filemtime($docroot.$file))."</td></tr>\n";
		}
	}

?>
<h1 class="pageTitle2"><?php echo $headertext ?> 

<?php  // Clickable directory links in the top path (breadcrumb style) as suggested by Patrick Bierans
$updir=explode("/", $path); // explode the array.
foreach($updir as $subpath) 
{
 if ($subpath) {
	 	$buildpath = $buildpath."/".$subpath;
		if (!$loop) { 
				echo "<A HREF=\"?\" class=\"pageTitle2\">/</A>&nbsp;";
				echo "<A HREF=\"?$subpath\" class=\"pageTitle2\">$subpath</A>&nbsp;";
		} else {
				echo "<A HREF=\"?$buildpath\" class=\"pageTitle2\">/&nbsp;$subpath</A>&nbsp;";
			}
  $loop++;
 }
} ?>

</h1>
<hr>
<table>
<tr><td></td>
<td width="200"><strong>Name</strong></td>
<td><strong>Size</strong></td>
<td><strong>Last Modified</strong></td></tr>

<?php 

foreach ($folders as $eachfolder)
{ echo $eachfolder;}
foreach ($files as $eachfile)
{ echo $eachfile;}
?>
</table>
<hr>
</td>
</td>

<?
}
?>


<?
include("beodl/beo-footer.html");
?>



<?php 

//  Convert file size (bytes) to something that us humans can make sense of!
//  courtesy of Patrick Bierans -  pbierans@lynet.de


  function size4humans($size=0,$aftercomma=2)
  {
    $aftercomma=pow(10,$aftercomma);
    $power=1024; // or do you prefer 1000
    $ext=array('b','Kb','Mb','Gb','Tb');
    $j=0;
    while ($size >= pow($power,$j))
      $j++;
    if ($j==0) $j=1;
    $size=round($size/pow($power,$j-1)*$aftercomma)/$aftercomma." ".$ext[$j-1];
    return $size;
  }
?>

