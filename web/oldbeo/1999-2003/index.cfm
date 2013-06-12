<!doctype html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="en-us">
  <head>

    <title>evolt.org - Browser Archive</title>
    <base href="http://browsers.evolt.org/">
    <META name="description" lang="en-us" content="A world community for web developers, evolt.org promotes the mutual free exchange of ideas, skills and experiences.">
    <META name="copyright" content="&copy; 1998-2002 evolt.org and its members">
    <META name="keywords" lang="en-us" content="1st Choice Software, 1x, Adrian Roselli, aardvark,
	Advanced Multimedia System Design, Air Mosaic Demo,
	Alexander Clauss & iCab Company, Alis Technologies,
	Amaya, Antique Browsers, Apple Computer, inc.,
	Applications, Arachne, Ariadna, Arlington Technology,
	Attachmate, Be, Inc., Bernd Richter, Blue Squirrel,
	Bobby, Bohemian Net Browser, BohemianNet, Branded
	Browser Technologies, BrownIE, Browse2000, Browser
	Archive, Caldera, Cello, Center for Applied Special
	Technology, Charlie, ChiBrow, Circle Group Internet,
	Inc., Compunet, Corporation for National Research
	Initiatives, Custom Browser, Cyber Passage, CyberGate,
	Cyberdog, DR-WebSpyder, Dean Software Design, DigiBand,
	DigiCams, Distributed Computing Group, Emacs-W3,
	Emissary, EnReach Technology, Escape, ExCITE,
	FreeWebBrowser, G.O.International, Galahad, Grail,
	Grover Industries, HandWeb, Harmony International,
	HexaBit Junior, HexaBit, HotJava, I-O-D-4 - The Web
	Stalker, I-View, I-comm, InterCon, Internet Explorer,
	Internet Plus, Internet WorkHorse, Jean van Waterschoot,
	KCS & Associates, KidNet Explorer, KidSafe Explorer,
	LION, LIS Web Browser, Lahman Internet Services, Lynx,
	MacLynx, MacWWW (Samba), MacWeb, Maciej Wisniewski,
	MacroByte, MarketNet, MathBrowser, MathSoft, MediaLive,
	MicroMind, Microsoft, Minuet, Mosaic, Mozilla, MultiWeb
	Viewer, Multilingual Mosaic, Mundial Avenue, MyBrowser,
	NCompass, Natdat, National Center for Supercomputing,
	Navigator, Need Archive, Need Manufacturer Name,
	NeoPlanet, Net M@anager, Net-Tamer, NetCaptor,
	NetCruiser, NetForKids, NetManage, NetPositive,
	NetSentry, NetShark, NetShift Software, NetShift,
	Netcom, Netomat, Netscape Communications Corporation,
	Nuthin' But Net, Olivier Gutknecht, Opera Software,
	Opera, Oracle, PAKSoft Productions, PIC, PS Group,
	Pixelogic, PowerBrowser, ProStream Browser, ProVisio
	GmbH, Pythia, QuarterDeck, QuickScape, Quickscape,
	Resource Communications, Santa's Browser, Science
	Traveller International, Seaglass Software, SerWeb,
	SimulBrowse, SiteKiosk, SlipKnot, Softerm Plus,
	Softorange, Softronics, Software Savvy, SpryNet,
	Sprynet, SpyCatcher, Spyglass, Stilesoft, Sun
	Microsystems, SuperHighway Browser, SurfMonkey, Surfin'
	Annette, Talent Communications, Talva Document Explorer,
	Talva, Tango Multilingual, The Mozilla Organization, The
	Other Browser-Emailer, The Productivity Works, Thomas
	Bruce, Tim Berners-Lee, ToolPool, TradeWave, UdiWWW,
	University of Minnesota, Untested , Video On Line
	Browser, Video On Line, Virtual Innovations, W3C, Web
	SurfACE, Web-O-Matic Digital Browser, Web-Talkit,
	WebData Communications, WebProwler, WebRacer, WebTV
	Networks, WebTV Viewer, WebView, WebWhacker, Websurfer,
	Wildcat Navigator, William M. Perry, WinWEB,
	WorldWideWeb (Nexus), Yellow Tree Services, iCab,
	pwWebSpeak Plus, xChaos">
    <META http-equiv="Content-Style-Type" content="text/css">
    <META http-equiv="Content-Script-Type" content="text/javascript">
    <META http-equiv="Content-Language" content="en-us">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<script language="JavaScript" type="text/javascript">
	<!--
   	function validateLogin(form)
		{
			if(!form.username.value || form.username.value == 'username')
			{
				alert('Username is required to login.');
				form.username.focus();
				return false;
			}
			if(!form.password.value)
			{
				alert('Password is required to login.');
				form.password.focus();
				return false;
			}
			return true;
		}
  //-->
  </script>
  
  
    <link rel="STYLESHEET" type="text/css" href="http://browsers.evolt.org/slate.css">
  
  </head>

<body bgcolor="#cccccc" text="#000000">
<!-- # Close Top Navigation Tab -->

<cfinclude template="../includes/dsp_header.cfm">

<!-- ## Start Content Table -->
<table bgcolor="#ffffff" width="98%" border="0" cellpadding="0" cellspacing="0" align="center" class="blackSides">
  <tr>
    <td width="75%" valign="top" class="main">
    <!-- ## Insert Content -->
  	<!-- app_chooser -->

 <!-- OK -->
			
<table width="98%" border="0" cellpadding="4" cellspacing="0">
<tr>
	<!-- Page Title -->
	<td align="right" class="pageTitle1" colspan=2 nowrap valign="middle"><h1>browser&nbsp;</h1></td>
	<td class="pageTitle2" valign="middle"><h1>&nbsp;archive</h1></td>
	<!-- /Page Title -->
</tr>
 <tr>
  <td colspan="4"><img src="http://leo.evolt.org/images/spacer.gif" width="1" height="5" alt=""></td>
 </tr>
<tr>
  <td>&nbsp;</td>
  

<CFIF len(cgi.path_info)>
		<CFSET thispath = ExpandPath(".")>
		<CFSET thisdir = "/home/evolt/archive_html/">
		<CFSET length = len(thisdir)>
		<CFSET lengthnew = len(cgi.path_info)>
		<CFSET dirlen = val(length - 23)>
		<CFSET dirname = right(thisdir, dirlen)>
    <cfset mypath = mid(cgi.path_info, len(left(cgi.path_info, 6)), len(cgi.path_info) - 3)>
		<CFIF cgi.path_info contains "..">
		<!-- take out classic unix directory walking hack -->
			No soup for you!
		<CFELSE>
		<tr>
	<!-- Page Title -->
	
	<td class="pageTitle2" valign="middle" colspan="2"><h1>&nbsp;</h1></td>
	<td valign="top" colspan="2">
		<CFDIRECTORY action="list" directory="/home/evolt/archive_html/#mypath#/" name="this" sort="type ASC">
			<P><STRONG class="title"><a href="http://browsers.evolt.org" title="Home">browsers.evolt.org</a> / <CFOUTPUT>#mypath#</CFOUTPUT></STRONG>:</P>
			
				<TABLE border="0">
					<TR>
						<TD>&nbsp;
						</TD>
						<TD>Name
						</TD>
						<TD>Size
						</TD>
						<TD width="20">&nbsp;
						</TD>
						<TD>Last Modified
						</TD>
					</TR><CFOUTPUT query="this">
					<TR>
						<TD align="left" valign="top">
						<CFIF type is "dir">
							<IMG src="/dir.gif" vspace="5" height="22" width="20">
						<CFELSE>
							<IMG src="/cube.gif"vspace="5" height="16" width="15">
						</CFIF>
						&nbsp;
						</TD>
						<TD align="left">
							<CFIF type is "dir">
							<P><a href="/index.cfm/dir/#mypath##Name#/">#name#</A></P>
							<CFELSE>
							<P><A href="/download.php?/#mypath##Name#">#name#</A></P>
							</CFIF>
						</TD>
						<TD align="left">
							<CFIF type is "dir">
								&nbsp;
							<CFELSE>
								<P>#NumberFormat(Val(Round(size / 1024)))#Kb</P>
							</CFIF>
						</TD>
						
						<TD width="20">&nbsp;</TD>
						
						<TD align="left" >
							<P>#DateFormat(datelastmodified, "mmmm d, yyyy")#</P>
						</TD>
					</TR>
				</CFOUTPUT>
			</TABLE>
		</CFIF>
	</td>



	<CFELSE>


	
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
<a href="/index.cfm/dir/1x/"><strong class="title">1x</strong></a><br>
&nbsp;Science Traveller International
</p>

<p>
<a href="/index.cfm/dir/airmosaicdemo/"><strong class="title">Air Mosaic Demo</strong></a><br>
&nbsp;Sprynet
</p>

<p>
<a href="/index.cfm/dir/allworld/"><strong class="title">AllWorld Explorer</strong></a><br>
&nbsp;G.O. International Air Service
</p>

<p>
<a href="/index.cfm/dir/amaya/"><strong class="title">Amaya</strong></a><br>
&nbsp;W3C
</p>

<p>
<a href="/index.cfm/dir/arachne/"><strong class="title">Arachne</strong></a><br>
&nbsp;xChaos
</p>

<p>
<a href="/index.cfm/dir/arcweb/"><strong class="title">ArcWeb</strong></a><br>
&nbsp;Stewart Brodie
</p>

<p>
<a href="/index.cfm/dir/ariadna/"><strong class="title">Ariadna</strong></a><br>
&nbsp;Advanced Multimedia System Design
</p>

<p>
<a href="/index.cfm/dir/atomnet/"><strong class="title">AtomNet</strong></a><br>
&nbsp;Change 7
</p>

<p>
<a href="/index.cfm/dir/aweb/"><strong class="title">AWeb</strong></a><br>
&nbsp;AmiTrix
</p>

<p>
<a href="/index.cfm/dir/beonex/"><strong class="title">Beonex</strong></a><br>
&nbsp;Ben Bucksch
</p>

<p>
<a href="/index.cfm/dir/bobby/"><strong class="title">Bobby</strong></a><br>
&nbsp;Center for Applied Special Technology
</p>

<p>
<a href="/index.cfm/dir/bohemian/"><strong class="title">Bohemian Net Browser</strong></a><br>
&nbsp;BohemianNet
</p>

<p>
<a href="/index.cfm/dir/brownie/"><strong class="title">BrownIE</strong></a><br>
&nbsp;Compunet
</p>

<p>
<a href="/index.cfm/dir/browse2000/"><strong class="title">Browse2000</strong></a><br>
&nbsp;1st Choice Software
</p>

<p>
<a href="/index.cfm/dir/cab/"><strong class="title">CAB</strong></a><br>
&nbsp;Alexander Clauss
</p>

<p>
<a href="/index.cfm/dir/cello/"><strong class="title">Cello</strong></a><br>
&nbsp;Thomas Bruce
</p>

<p>
<a href="/index.cfm/dir/charlie/"><strong class="title">Charlie</strong></a><br>
&nbsp;Mundial Avenue
</p>

<p>
<a href="/index.cfm/dir/chibrow/"><strong class="title">ChiBrow</strong></a><br>
&nbsp;KCS & Associates
</p>

<p>
<a href="/index.cfm/dir/chimera/"><strong class="title">Chimera</strong></a><br>
&nbsp;University of Nevada Las Vegas
</p>

<p>
<a href="/index.cfm/dir/lion-custom/"><strong class="title">Custom Browser</strong></a><br>
&nbsp;LION
</p>

<p>
<a href="/index.cfm/dir/cyberdog/"><strong class="title">Cyberdog</strong></a><br>
&nbsp;Apple Computer, inc.
</p>

<p>
<a href="/index.cfm/dir/cybergate/"><strong class="title">CyberGate</strong></a><br>
&nbsp;BlackSun Interactive
</p>

<p>
<a href="/index.cfm/dir/cyberpassage/"><strong class="title">Cyber Passage</strong></a><br>
&nbsp;Sony
</p>

<p>
<a href="/index.cfm/dir/digicams/"><strong class="title">DigiCams</strong></a><br>
&nbsp;DigiBand
</p>

<p>
<a href="/index.cfm/dir/doslynx/"><strong class="title">DOSLynx</strong></a><br>
&nbsp;University of Kansas
</p>

<p>
<a href="/index.cfm/dir/dr-webspyder/"><strong class="title">DR-WebSpyder</strong></a><br>
&nbsp;Caldera
</p>

<p>
<a href="/index.cfm/dir/emacs-w3/"><strong class="title">Emacs-W3</strong></a><br>
&nbsp;William M. Perry
</p>

<p>
<a href="/index.cfm/dir/emissary/"><strong class="title">Emissary</strong></a><br>
&nbsp;Attachmate
</p>

<p>
<a href="/index.cfm/dir/freewebbrowser/"><strong class="title">FreeWebBrowser</strong></a><br>
&nbsp;Yellow Tree Services
</p>

<p>
<a href="/index.cfm/dir/galahad/"><strong class="title">Galahad</strong></a><br>
&nbsp;Jean van Waterschoot
</p>

<p>
<a href="/index.cfm/dir/goanywhere/"><strong class="title">goAnywhere!</strong></a><br>
&nbsp;Mikey LeBeau
</p>

<p>
<a href="/index.cfm/dir/grail/"><strong class="title">Grail</strong></a><br>
&nbsp;Corporation for National Research Initiatives
</p>

<p>
<a href="/index.cfm/dir/grasshopper/"><strong class="title">GrassHopper MDI Explorer</strong></a><br>
&nbsp;Santrim Software
</p>

<p>
<a href="/index.cfm/dir/handweb/"><strong class="title">HandWeb</strong></a><br>
&nbsp;Smartcode Software
</p>

<p>
<a href="/index.cfm/dir/hexabitjunior/"><strong class="title">HexaBit Junior</strong></a><br>
&nbsp;HexaBit
</p>

<p>
<a href="/index.cfm/dir/homepagereader/"><strong class="title">Home Page Reader</strong></a><br>
&nbsp;IBM
</p>

<p>
<a href="/index.cfm/dir/hotjava/"><strong class="title">HotJava</strong></a><br>
&nbsp;Sun Microsystems
</p>

<p>
<a href="/index.cfm/dir/i-comm/"><strong class="title">I-comm</strong></a><br>
&nbsp;Talent Communications
</p>

<p>
<a href="/index.cfm/dir/i-o-d-4/"><strong class="title">I-O-D-4 - The Web Stalker</strong></a><br>
&nbsp;Escape
</p>

<p>
<a href="/index.cfm/dir/i-view/"><strong class="title">I-View</strong></a><br>
&nbsp;EnReach Technology
</p>

<p>
<a href="/index.cfm/dir/ibrowse/"><strong class="title">iBrowse</strong></a><br>
&nbsp;Omnipresence International
</p>

<p>
<a href="/index.cfm/dir/icab/"><strong class="title">iCab</strong></a><br>
&nbsp;Alexander Clauss & iCab Company
</p>

<p>
<a href="/index.cfm/dir/ie-sprynet/"><strong class="title">Internet Explorer</strong></a><br>
&nbsp;Sprynet
</p>

<p>
<a href="/index.cfm/dir/ie/"><strong class="title">Internet Explorer</strong></a><br>
&nbsp;Microsoft
</p>

<p>
<a href="/index.cfm/dir/internet-plus/"><strong class="title">Internet Plus</strong></a><br>
&nbsp;Dean Software Design
</p>

<p>
<a href="/index.cfm/dir/internet-workhorse/"><strong class="title">Internet WorkHorse</strong></a><br>
&nbsp;MarketNet
</p>

<p>
<a href="/index.cfm/dir/kidnet/"><strong class="title">KidNet Explorer</strong></a><br>
&nbsp;Resource Communications
</p>

<p>
<a href="/index.cfm/dir/kidssafe-explorer/"><strong class="title">KidSafe Explorer</strong></a><br>
&nbsp;Arlington Technology
</p>

<p>
<a href="/index.cfm/dir/lis/"><strong class="title">LIS Web Browser</strong></a><br>
&nbsp;Lahman Internet Services
</p>

<p>
<a href="/index.cfm/dir/lynx/"><strong class="title">Lynx</strong></a><br>
&nbsp;Distributed Computing Group
</p>

<p>
<a href="/index.cfm/dir/maclynx/"><strong class="title">MacLynx</strong></a><br>
&nbsp;Olivier Gutknecht
</p>

<p>
<a href="/index.cfm/dir/macweb/"><strong class="title">MacWeb</strong></a><br>
&nbsp;TradeWave (EINet)
</p>

<p>
<a href="/index.cfm/dir/macwww/"><strong class="title">MacWWW (Samba)</strong></a><br>
&nbsp;CERN
</p>

<p>
<a href="/index.cfm/dir/mathbrowser/"><strong class="title">MathBrowser</strong></a><br>
&nbsp;MathSoft
</p>

<p>
<a href="/index.cfm/dir/microviet/"><strong class="title">Microviet First Explorer</strong></a><br>
&nbsp;Microviet
</p>

<p>
<a href="/index.cfm/dir/minuet/"><strong class="title">Minuet</strong></a><br>
&nbsp;University of Minnesota
</p>

<p>
<a href="/index.cfm/dir/mosiac-ncsa/"><strong class="title">Mosaic</strong></a><br>
&nbsp;National Center for Supercomputing Applications
</p>

<p>
<a href="/index.cfm/dir/mosiac-quarterdeck/"><strong class="title">Mosaic</strong></a><br>
&nbsp;QuarterDeck
</p>



<!-- ## End Column 1 -->
          </td>
          <td>&nbsp;&nbsp;</td>
          <td valign="top">
<!-- ## Start Column 2 -->


<p>
<a href="/index.cfm/dir/mosiac-spry/"><strong class="title">Mosaic</strong></a><br>
&nbsp;SpryNet
</p>

<p>
<a href="/index.cfm/dir/mosiac-spyglass/"><strong class="title">Mosaic</strong></a><br>
&nbsp;Spyglass
</p>

<p>
<a href="/index.cfm/dir/mozilla/"><strong class="title">Mozilla</strong></a><br>
&nbsp;The Mozilla Organization
</p>

<p>
<a href="/index.cfm/dir/multilingualmosaic/"><strong class="title">Multilingual Mosaic</strong></a><br>
&nbsp;Accent Software
</p>

<p>
<a href="/index.cfm/dir/multiwebviewer/"><strong class="title">MultiWeb Viewer</strong></a><br>
&nbsp;MultiSource
</p>

<p>
<a href="/index.cfm/dir/mybrowser/"><strong class="title">MyBrowser</strong></a><br>
&nbsp;Softorange
</p>

<p>
<a href="/index.cfm/dir/navigator/"><strong class="title">Navigator</strong></a><br>
&nbsp;Netscape Communications Corporation
</p>

<p>
<a href="/index.cfm/dir/ncompass/"><strong class="title">NCompass</strong></a><br>
&nbsp;ExCITE
</p>

<p>
<a href="/index.cfm/dir/neoplanet/"><strong class="title">NeoPlanet</strong></a><br>
&nbsp;NeoPlanet
</p>

<p>
<a href="/index.cfm/dir/net-tamer/"><strong class="title">Net-Tamer</strong></a><br>
&nbsp;Net-Tamer
</p>

<p>
<a href="/index.cfm/dir/netcaptor/"><strong class="title">NetCaptor</strong></a><br>
&nbsp;Stilesoft
</p>

<p>
<a href="/index.cfm/dir/netcruiser/"><strong class="title">NetCruiser</strong></a><br>
&nbsp;Netcom
</p>

<p>
<a href="/index.cfm/dir/netforkids/"><strong class="title">NetForKids</strong></a><br>
&nbsp;WebData Communications
</p>

<p>
<a href="/index.cfm/dir/netmanager/"><strong class="title">Net M@anager</strong></a><br>
&nbsp;Virtual Innovations
</p>

<p>
<a href="/index.cfm/dir/netomat/"><strong class="title">Netomat</strong></a><br>
&nbsp;Maciej Wisniewski
</p>

<p>
<a href="/index.cfm/dir/netpositive/"><strong class="title">NetPositive</strong></a><br>
&nbsp;Be, Inc.
</p>

<p>
<a href="/index.cfm/dir/netsentry/"><strong class="title">NetSentry</strong></a><br>
&nbsp;Natdat
</p>

<p>
<a href="/index.cfm/dir/netshark/"><strong class="title">NetShark</strong></a><br>
&nbsp;InterCon
</p>

<p>
<a href="/index.cfm/dir/netshift/"><strong class="title">NetShift</strong></a><br>
&nbsp;NetShift Software
</p>

<p>
<a href="/index.cfm/dir/nothin-but-net/"><strong class="title">Nuthin' But Net</strong></a><br>
&nbsp;PAKSoft Productions
</p>

<p>
<a href="/index.cfm/dir/offbyone/"><strong class="title">Off By One</strong></a><br>
&nbsp;Home Page Software
</p>

<p>
<a href="/index.cfm/dir/omniweb/"><strong class="title">OmniWeb</strong></a><br>
&nbsp;OmniGroup
</p>

<p>
<a href="/index.cfm/dir/opera/"><strong class="title">Opera</strong></a><br>
&nbsp;Opera Software
</p>

<p>
<a href="/index.cfm/dir/powerbrowser/"><strong class="title">PowerBrowser</strong></a><br>
&nbsp;Oracle
</p>

<p>
<a href="/index.cfm/dir/prostream/"><strong class="title">ProStream Browser</strong></a><br>
&nbsp;PS Group
</p>

<p>
<a href="/index.cfm/dir/pwwebspeak/"><strong class="title">pwWebSpeak Plus</strong></a><br>
&nbsp;The Productivity Works
</p>

<p>
<a href="/index.cfm/dir/pythia/"><strong class="title">Pythia</strong></a><br>
&nbsp;Appian Interactive
</p>

<p>
<a href="/index.cfm/dir/quickscape/"><strong class="title">QuickScape</strong></a><br>
&nbsp;Quickscape
</p>

<p>
<a href="/index.cfm/dir/santasbrowser/"><strong class="title">Santa's Browser</strong></a><br>
&nbsp;Branded Browser Technologies
</p>

<p>
<a href="/index.cfm/dir/simulbrowse/"><strong class="title">SimulBrowse</strong></a><br>
&nbsp;Seaglass Software
</p>

<p>
<a href="/index.cfm/dir/sitekiosk/"><strong class="title">SiteKiosk</strong></a><br>
&nbsp;ProVisio GmbH
</p>

<p>
<a href="/index.cfm/dir/slipknot/"><strong class="title">SlipKnot</strong></a><br>
&nbsp;MicroMind
</p>

<p>
<a href="/index.cfm/dir/softerm-plus/"><strong class="title">Softerm Plus</strong></a><br>
&nbsp;Softronics
</p>

<p>
<a href="/index.cfm/dir/superhighway/"><strong class="title">SuperHighway Browser</strong></a><br>
&nbsp;Frontier Technologies
</p>

<p>
<a href="/index.cfm/dir/surfin-annette/"><strong class="title">Surfin' Annette</strong></a><br>
&nbsp;SpyCatcher
</p>

<p>
<a href="/index.cfm/dir/surfmonkey/"><strong class="title">SurfMonkey</strong></a><br>
&nbsp;MediaLive
</p>

<p>
<a href="/index.cfm/dir/talking_browser/"><strong class="title">Talking Browser</strong></a><br>
&nbsp;WeMedia
</p>

<p>
<a href="/index.cfm/dir/talva/"><strong class="title">Talva Document Explorer</strong></a><br>
&nbsp;Talva
</p>

<p>
<a href="/index.cfm/dir/tango/"><strong class="title">Tango Multilingual</strong></a><br>
&nbsp;Alis Technologies
</p>

<p>
<a href="/index.cfm/dir/tobrowser-emailer/"><strong class="title">The Other Browser-Emailer</strong></a><br>
&nbsp;Pixelogic
</p>

<p>
<a href="/index.cfm/dir/udiwww/"><strong class="title">UdiWWW</strong></a><br>
&nbsp;Bernd Richter
</p>

<p>
<a href="/index.cfm/dir/videoonline/"><strong class="title">Video On Line Browser</strong></a><br>
&nbsp;Video On Line
</p>

<p>
<a href="/index.cfm/dir/voyager/"><strong class="title">Voyager</strong></a><br>
&nbsp;VaporWare
</p>

<p>
<a href="/index.cfm/dir/wannabe/"><strong class="title">WannaBe</strong></a><br>
&nbsp;David T. Pierson
</p>

<p>
<a href="/index.cfm/dir/web-o-matic/"><strong class="title">Web-O-Matic Digital Browser</strong></a><br>
&nbsp;Circle Group Internet, Inc.
</p>

<p>
<a href="/index.cfm/dir/web-surface/"><strong class="title">Web SurfACE</strong></a><br>
&nbsp;ToolPool
</p>

<p>
<a href="/index.cfm/dir/web-talkit/"><strong class="title">Web-Talkit</strong></a><br>
&nbsp;Grover Industries
</p>

<p>
<a href="/index.cfm/dir/webexplorer/"><strong class="title">WebExplorer</strong></a><br>
&nbsp;IBM
</p>

<p>
<a href="/index.cfm/dir/webprowler/"><strong class="title">WebProwler</strong></a><br>
&nbsp;MacroByte
</p>

<p>
<a href="/index.cfm/dir/webracer/"><strong class="title">WebRacer</strong></a><br>
&nbsp;Software Savvy
</p>

<p>
<a href="/index.cfm/dir/websurfer/"><strong class="title">Websurfer</strong></a><br>
&nbsp;NetManage
</p>

<p>
<a href="/index.cfm/dir/webtv/"><strong class="title">WebTV Viewer</strong></a><br>
&nbsp;WebTV Networks
</p>

<p>
<a href="/index.cfm/dir/webview/"><strong class="title">WebView</strong></a><br>
&nbsp;South Pacific Information Services
</p>

<p>
<a href="/index.cfm/dir/webwhacker/"><strong class="title">WebWhacker</strong></a><br>
&nbsp;Blue Squirrel
</p>

<p>
<a href="/index.cfm/dir/wildcat/"><strong class="title">Wildcat Navigator</strong></a><br>
&nbsp;Harmony International
</p>

<p>
<a href="/index.cfm/dir/winweb/"><strong class="title">WinWEB</strong></a><br>
&nbsp;TradeWave (EINet)
</p>

<p>
<a href="/index.cfm/dir/worldwideweb/"><strong class="title">WorldWideWeb (Nexus)</strong></a><br>
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
<a href="/index.cfm/dir/unchecked/proxiweb/"><strong class="title">Proxiweb</strong></a><br>
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
		  </cfif>
  </td>
</tr>
	<!-- /Browsers -->

 <tr>
  <td colspan="4"><img src="http://leo.evolt.org/images/spacer.gif" width="1" height="5" alt=""></td>
 </tr>
  </table>
  

  
 <!-- done -->
	


    <!-- ## End Insert Content -->
    </td>
    <td width="1%" class="border"><img src="http://leo.evolt.org/images/spacer.gif" width="1" height="1" alt=""></td>
     

<!-- ## Start SideNav -->

  <td width="23%" valign="top" class="side">
	&nbsp;
	<img src="http://leo.evolt.org/images/spacer.gif" width="1" height="400" alt="">
	<!---  <cfinclude template="../main_html/evolt/dsp_sidebar.cfm">  --->

  </td>
  <td width="1%" class="side"><img src="http://leo.evolt.org/images/spacer.gif" width="1" height="1" alt=""></td>


<!-- ## End SideNav -->

  </tr>
</table>
<!-- ## Close Content Table -->
<!-- ## Start Footer Table -->

<cfinclude template="../includes/dsp_footer.cfm">

