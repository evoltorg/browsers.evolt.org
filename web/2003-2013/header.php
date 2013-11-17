<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"

	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en-GB" xml:lang="en-GB">

  <head>

    <!-- $Id: page.tpl.php,v 1.136 2005/08/15 12:45:39 martin Exp $ -->

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <title>evolt.org | Workers of the Web, Evolt!</title>

    <meta name="Copyright" content="&copy; evolt.org and its members" />

    <meta name="Keywords" content="web, internet, design, technology, interface, multimedia, script, commentary, hardware, software, articles, news" />

    <meta name="Description" content="A world community for web developers, evolt.org promotes the mutual free exchange of ideas, skills and experiences." />

    <meta http-equiv="Content-Style-Type" content="text/css" />	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<base href="http://evolt.org/" />
<style type="text/css" media="all">@import "misc/drupal.css";</style><style type="text/css">@import url(http://evolt.org/modules/codefilter/codefilter.css);</style>
<link rel="alternate" type="application/rss+xml" title="RSS" href="http://evolt.org/rss/articles.rss">


    <!--    ####     # The following CSS is IE only, as per	# http://virtuelvis.com/archives/2004/02/css-ie-only    ####    -->

	<!--[if IE]>

  		<link rel="stylesheet" href="themes/evolt/structure_ie.css" type="text/css" />

	<![endif]-->

    <style type="text/css" media="all">@import "themes/evolt/style.css";</style>
    <!--    ####     # the following print CSS needs to be moved into the $styles php above - here for now for testing purposes    ####    -->

 	<link rel="stylesheet" href="themes/evolt/print.css" media="print" type="text/css"/>
    <!-- Javascript for login form select. A smarter person would conditionalise this on whether there's a logged in user... -->
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
	  </head>  <body >

		<!-- start accessibility skip to content -->

		<div id="access-skip" class="access">

				<a href="/#main-page-content" accesskey="2">Skip to page content</a> or

 				<a href="/#accesskey-list" accesskey="0">skip to Accesskey List.</a>

		</div>

		<!-- end accessibility skip -->

		<div id="header"><h2 class="access">Start of page header</h2>

		  <a href="" title="Return to the home page" accesskey="1" ><img src="themes/evolt/evoltorg.gif" alt="evolt.org" title="Welcome to evolt.org" id="logo" /></a>

		   <h2 class="access"><a name="other-sites">Other Fine Evolt.org Sites</a></h2>

		   <ul id="sections">

		    
		    <li id="sectionwork"><a href="/" title="list and articles">Work</a>
		      <p>list and articles</p>

		    </li>

		    
		    <li id="sectiontest"><a href="http://browsers.evolt.org/" title="browser archive">Test</a>
		      <p>browser archive</p>

		    </li>

		    
		    <li id="sectiondonate"><a href="/help_support_evolt" title="keep evolt.org alive">Donate</a>
		      <p>keep evolt.org alive</p>

		    </li>

		    
		   </ul>

		</div>
     <form method="post" action="/search/node" id="searchform"> 

				<fieldset>
			
				  <legend>Search evolt.org</legend>
			
				  <label for="searchbox" class="faux-legend">search:</label>
			
				  <input type="text" name="edit[keys]" id="searchbox" size="12" maxlength="50" accesskey="4" value="" /><input type="submit" id="searchevolt" class="form-submit" name="op" value="Search" />
			
				</fieldset>

     </form>



<!--      <form action="user/login" method="post" id="login">

 	<fieldset>

 	  <legend>evolt.org login:</legend>

 	  <label for="login-name" class="faux-legend"><!-- evolt.org -->login:</label><input type="text" maxlength="64" class="form-text" name="edit[name]" id="login-name" size="15" value="username" accesskey="3" onFocus="if(this.value && this.value == 'username') { this.value = ''; this.form.password.value = ''; } else { this.select(); }" />

 	  <label for="login-pass">password:</label><input type="password" class="form-password" maxlength="64" name="edit[pass]" id="login-pass" size="15" value="password" onFocus="this.select()" />

 	  <input type="hidden" name="edit[destination]" value="user" />

 	  <input type="submit" class="form-submit" name="op" value="Log in"  />

    or <a href="user/register">register</a>

 	</fieldset>

      </form> -->




<div id="content"><div id="channel">

    <!-- this item really shouldn't be done this way -->

  <p class="work-title"><a href="http://browsers.evolt.org/">Test</a></p>

  <ul id="secondary">

    <li><a href="http://browsers.evolt.org/">Browser Archive</a></li>
  </ul>

  <ul id="secondary-constants">

    <li><a href="/faq" accesskey="5">FAQ</a></li>

    <li><a href="/contact" accesskey="9">Contact</a></li>

  </ul>

</div>




  <div class="sidebar" id="sidebar-left"><h2 class="access"><a name="content-categories">Navigation Starts</a></h2>

    <!-- $Id: block.tpl.php,v 1.3 2005/02/01 19:06:25 neuro Exp $ -->
<div class="block">
  <h4>Article Categories</h4>
  <div class="menu">
<ul>
<li class="leaf"><a href="backend" title="">Backend</a></li>
<li class="leaf"><a href="code" title="">Code</a></li>
<li class="leaf"><a href="commentary_and_society" title="">Commentary &amp; Society</a></li>
<li class="leaf"><a href="community_news" title="">Community News</a></li>
<li class="leaf"><a href="ia_usability" title="">IA/Usability</a></li>
<li class="leaf"><a href="jobs" title="">Jobs</a></li>
<li class="leaf"><a href="news" title="">News</a></li>
<li class="leaf"><a href="reviews_and_links" title="">Reviews &amp; Links</a></li>
<li class="leaf"><a href="site_development" title="">Site Development</a></li>
<li class="leaf"><a href="software" title="">Software</a></li>
<li class="leaf"><a href="suggestions" title="">Suggestions</a></li>
<li class="leaf"><a href="visual_design" title="">Visual Design</a></li>

</ul>
</div></div>
<!-- $Id: block.tpl.php,v 1.3 2005/02/01 19:06:25 neuro Exp $ -->
<div class="block">
  <h4></h4>
  <!-- Donations block for logged in members only-->

<!-- Donations Block --></div>
<!-- $Id: block.tpl.php,v 1.3 2005/02/01 19:06:25 neuro Exp $ -->
<div class="block">
  <h4>Highest rated articles</h4>
  <ul>
<li><a href="/node/60261">Where / What Vision Systems and Visual Design</a> (4.61)</li><li><a href="/node/60384">PHP Login System with Admin Features</a> (4.59)</li><li><a href="/node/22700">Regular Expression Basics</a> (4.53)</li><li><a href="/node/28241">Style Switcher in ASP</a> (4.37)</li><li><a href="/node/454">Workaround for radio-button color problem</a> (4.37)</li></ul></div>
<!-- $Id: block.tpl.php,v 1.3 2005/02/01 19:06:25 neuro Exp $ -->
<div class="block">
  <h4>Submit</h4>
  
<a href="/submit">Submit articles, news or reviews for publication on evolt</a>

</div>
<!-- $Id: block.tpl.php,v 1.3 2005/02/01 19:06:25 neuro Exp $ -->
<div class="block">
  <h4>Recent comments</h4>
  <!-- $Id: item_list.tpl.php,v 1.6 2005/02/22 20:17:58 elfur Exp $ -->
<div class="item-list"><ul><li><a href="PHP-Login-System-with-Admin-Features#comment-66331">xss</a><br />8 hours 39 min ago</li><li><a href="PHP-Login-System-with-Admin-Features#comment-66330">@ skinbug</a><br />13 hours 20 min ago</li><li><a href="PHP-Login-System-with-Admin-Features#comment-66329">@ skinbug</a><br />15 hours 6 min ago</li><li><a href="PHP-Login-System-with-Admin-Features#comment-66328">@Bman</a><br />18 hours 49 min ago</li><li><a href="PHP-Login-System-with-Admin-Features#comment-66327">@ skinbug</a><br />1 day 44 min ago</li><li><a href="PHP-Login-System-with-Admin-Features#comment-66326">@ Bman for useredit</a><br />1 day 6 hours ago</li><li><a href="PHP-Login-System-with-Admin-Features#comment-66325">UserEdit.php</a><br />1 day 12 hours ago</li><li><a href="PHP-Login-System-with-Admin-Features#comment-66324">cross site scripting update</a><br />1 day 14 hours ago</li><li><a href="PHP-Login-System-with-Admin-Features#comment-66321">Cross site scripting vulnerability</a><br />2 days 10 hours ago</li><li><a href="PHP-Login-System-with-Admin-Features#comment-66320">using new database</a><br />3 days 13 hours ago</li></ul></div></div>

  </div><!-- /sidebar left -->





  <div class="sidebar" id="sidebar-right">

    <!-- $Id: block.tpl.php,v 1.3 2005/02/01 19:06:25 neuro Exp $ -->
<div class="block">
<?php include "beodl/beo-footer.adsense.php" ?>
  <h4>Our Mailing Lists</h4>
  <p>Subscribe or change your preferences:</p>
<ul>
<li><a href="http://lists.evolt.org/mailman/listinfo/thelist">thelist</a> <br />(ask questions)</li>
<li><a href="http://lists.evolt.org/mailman/listinfo/thechat">thechat</a>  <br />(socialise)</li>
<li><a href="http://lists.evolt.org/mailman/listinfo/theforum">theforum</a>  <br />
(help run evolt.org)</li>

</ul></div>
<!-- $Id: block.tpl.php,v 1.3 2005/02/01 19:06:25 neuro Exp $ -->
<div class="block">
  <h4>Our Directory of Links</h4>
  <ul>
<li><a href="http://dir.evolt.org/coding/">Coding</a></li>
<li><a href="http://dir.evolt.org/community/">Community</a></li>
<li><a href="http://dir.evolt.org/design/">Design</a></li>
<li><a href="http://dir.evolt.org/distractions/">Distractions</a></li>
<li><a href="http://dir.evolt.org/issues/">Issues</a></li>
<li><a href="http://dir.evolt.org/os_specific/">OS Specific</a></li>
<li><a href="http://dir.evolt.org/privacy_and_legal/">Privacy and Legal</a></li>
<li><a href="http://dir.evolt.org/resources/">Resources</a></li>
<li><a href="http://dir.evolt.org/tools/">Tools</a></li>
<li><a href="http://dir.evolt.org/tutorials/">Tutorials</a></li>
</ul></div>
<!-- $Id: block.tpl.php,v 1.3 2005/02/01 19:06:25 neuro Exp $ -->
<!-- <div class="block">
  <h4>Syndicate</h4>
  <div class="xml-icon"><a href="rss/articles.rss"><img src="misc/xml.png" width="36" height="14" alt="XML feed" title="XML feed" /></a></div></div> -->

  </div><!-- /sidebar right -->



