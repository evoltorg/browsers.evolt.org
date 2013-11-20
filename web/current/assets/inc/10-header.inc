<?php
// browserarchive.org aka browsers.evolt.org
// Copyright (c) 1999-2013 Adrian Roselli, William Anderson
?>
<!DOCTYPE html> 
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-style-type" content="text/css" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="generator" content="org.evolt.beo" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="copyright" content="&copy; evolt.org and it's members" />
	<meta name="keywords" content="web, internet, design, technology, interface, multimedia, script, commentary, hardware, software, articles, news, history, browsers, archive" />
	<meta name="description" content="A world community for web developers, evolt.org promotes the mutual free exchange of ideas, skills and experiences." />
	<link rel="shortcut icon" href="/favicon.ico" />
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="/assets/css/magnificpopup.css" media="screen" />
	<link rel="stylesheet" href="/assets/css/font-awesome.min.css" media="screen" />
	<link rel="stylesheet" href="/assets/css/style.css" media="screen" />
	<link rel="stylesheet" href="/assets/css/scheme-beo.css" media="screen" />
	<title><?php echo $page_title ?><?php if ( $page_title != $site_name ) { ?> | browsers.evolt.org<?php } ?></title>
	<!-- IE fixes -->
	<!-- [if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<link rel="stylesheet" href="/assets/css/ie.css" />
	<![endif] -->
	<!-- if IE 7]>
		<link rel="stylesheet" href="/assets/css/ie7.css" />
		<link rel="stylesheet" href="/assets/css/font-awesome-ie7.min.css" />
	<![endif] -->
</head>
<body<?php if ( $page_type == "splash" ) { ?> class="home"<?php } ?>>
<header role="banner" id="header">
	<div id="sticks-to-top">
		<div class="wrapper">
			<nav id="mainmenu" role="navigation">
			<ul>
				<li><a href="http://evoltorg.github.io/"<?php if ( $site_name == "evolt.org" ) { ?> class="active"<?php } ?>>evolt.org</a></li>
				<li><a href="http://evoltorg.github.io/archive.html">Articles</a></li>
				<li><a href="/"<?php if ( $site_name == "browsers.evolt.org" ) { ?> class="active"<?php } ?>>Browsers</a></li>
				<li><a href="http://leo.wpa.io/"<?php if ( $site_name == "lists.evolt.org" ) { ?> class="active"<?php } ?>>Lists</a></li>
			</ul>
			</nav>
			<h1 id="logo"><a href="http://evoltorg.github.io/" rel="home" title=""><img src="assets/img/top-evoltlogo.png" alt="" /></a></h1>
			<div id="address-block">
				<ul>
					<li><a href="http://evoltorg.github.io/colophon.html">Colophon</a></li>
					<li class="smaller-gap"><a href="http://twitter.com/evolt_org" title="Twitter"><i class="icon-twitter"></i></a></li>
					<li class="smaller-gap"><a href="https://plus.google.com/u/0/communities/114796678588081931900" title="Google+"><i class="icon-google-plus"></i></a></li>
					<li class="smaller-gap"><a href="http://www.linkedin.com/groups?gid=1019497" title="LinkedIn"><i class="icon-linkedin"></i></a></li>
					<li class="smaller-gap"><a href="http://github.com/evoltorg" title="GitHub"><i class="icon-github"></i></a></li>
					<li class="smaller-gap"><a href="http://www.flickr.com/groups/evolters/" title="Flickr"><i class="icon-flickr"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
<?php
	if ( $page_type == "splash" ) {
		include "assets/inc/11-header-splash.inc"; 
?>
</header>
<?php
	} else { 
?>
</header>
<?php
		include "assets/inc/12-header-page.inc";
	} 
?>
