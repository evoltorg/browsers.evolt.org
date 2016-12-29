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
	pwWebSpeak Plus, xChaos, evolt.org, Evolt, browsers, archive">
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
Welcome to <strong>browsers.evolt.org</strong>, the premier web browser
archive, hosted by <a href="http://evolt.org/">evolt.org</a>.  Our thanks
to evolt.org member <a href="http://roselli.org/adrian">Adrian Roselli</a>
(aka <a href="http://evolt.org/user/aardvark/88/"><em>aardvark</em></a>),
who <a href="http://evolt.org/article/beo/21/352/">set up the archive way
back in August 1999</a>, 
for providing the initial (huge!) basis for the archive, and for maintaining
&mdash; and continuing to maintain &mdash; this important resource.
If you have a new browser to submit to the archive, please 
<a href="http://evolt.org/contact/">let us know</a>.
</p>
<p>
We currently store 2.2 gigabytes of browsers for a wide variety of platforms,
including Windows, Mac OS, OS/2, Un*x, Linux, RiscOS and more!
</p>
<p><div align="right">
<a href="/archive.cfm"><strong>Browse the complete archive &raquo;</strong></a>
</div></p>
<p>
Our latest additions as of November 15th 2002 include:
<ul>
<li> Opera 7.0 beta1 (<a href="/index.cfm/dir/opera/32bit/7.0/beta1/">Win32</a>)
<li> IE 4.01 SP2 (<a href="/index.cfm/dir/ie/32bit/4.01_SP2/">Win32</a>)
<li> IE 4.01 SP1 (<a href="/index.cfm/dir/ie/32bit/4.01_SP1/">Win32</a>)
</ul>
You may never have heard of some of the more esoteric or rare 
browsers we have archived ...
<ul>
<li> W3C Amaya (<a href="/index.cfm/dir/amaya/">mixed platforms</a>)
<li> Mosaic Netscape 0.4 (<a href="/index.cfm/dir/navigator/16bit/0.4/">Win32</a>)
<li> IBM WebExplorer 1.1 (<a href="/index.cfm/dir/webexplorer/OS2/1.1h/">OS/2</a>)
</ul>
</p>

		<! -- /Browser Archive About -->

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

