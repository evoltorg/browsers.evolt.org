<?php
// browserarchive.org aka browsers.evolt.org
// Copyright (c) 1999-2013 Adrian Roselli, William Anderson

if ( $_GET['dir'] != "" ) { 
	header("Location: /browsers/".$_GET['dir'],301);
	exit;
}
include "assets/inc/00-functions.inc";
include "data.inc";
$site_name = "browsers.evolt.org";
$page_title = "browsers.evolt.org";
$short_title = "Browser Archive";
$page_type = "page";
include "assets/inc/10-header.inc";
include "assets/inc/20-message.inc";
?>
<div class="wrapper">
    <section id="content" class="full-width" role="main">
    	<div class="p100">
			<p class="notice error"><strong>Pardon our dust!</strong> This iteration of <strong>browsers.evolt.org</strong> is under test, containing content which has not yet been finalized.</p>
		</div>
		<div class="p66">
			<h2>evolt.org Browser Archive</h2>
<h2>Who archived all these?</h2>
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
<!-- <p>A</p> -->
<ul>
<!--	<li style="list-style-image: url(/assets/img/uas-agent/1x.png)">1x</li>
	<li style="list-style-image: url(/assets/img/uas-agent/msie.png)"><a href="/browsers/archive/ie">Microsoft Internet Explorer</a></li> -->
<?php
	foreach ($browsers as &$browser) {
?>
	<li><a href="/browsers/archive/<?php echo $browser['code'] ?>"><?php echo $browser['name'] ?></a> &mdash; <?php echo $browser['vendor'] ?></li>
<?
	}
?>
</ul>
		</div>
		<?php include "assets/inc/30-adsense.inc" ?>
	</section>
</div>
<?
include "assets/inc/99-footer.inc";
?>