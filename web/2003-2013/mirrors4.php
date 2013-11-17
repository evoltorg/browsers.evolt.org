<?php
error_reporting(E_ALL);
ini_set('display_errors','1');
include "assets/inc/functions.inc";
// include "assets/inc/mysql.inc";
include "assets/inc/page-start.inc";
include "assets/inc/page-header.inc";
include "assets/inc/menu-evolt.inc";
include "assets/inc/page-content-open.inc";
?>

<?php

// mirrors.php
// 
// (c) 2003, 2012 William Anderson <neuro@well.com> 
//          http://neuro.me.uk/projects/evolt.org/

?>
<h1>Browser Mirrors</h1>

<h2>
Archive Size: 
<?php 
// scotty, how big is the archive?
include "archivesize.inc";
$archivesizeMB = $archivesize;
$archivesizeGB = number_format($archivesize / 1024,2);
// cap'n, the FPU canna tak' it - she's bypassed like a christmas tree!
$dateformat = "Y-m-d H:i:s T";
$lastsized = date($dateformat,filemtime('archivesize.inc'))
?>
<?php echo $archivesizeMB; ?>MB
(<?php echo $archivesizeGB; ?>GB)
in <?php include "archivecount.inc" ?> directories.
</h2>
<p>
Archive last updated: <?php echo $archivelastupdated; ?><br>
Archive last checked: <?php echo $lastsized; ?>
</p>

<p>
We are always on the lookout for new mirror sites to help us distribute
the load of hosting the Archive.  If you're interested in hosting an
evolt.org Browser Archive Mirror, you should be aware of the following
requirements:
</p>
<ul>
<li> You must be able to host a complete mirror of the Archive &mdash;
we are working on the next generation of interface to the Archive which
will allow mirror hosters to store only a part of the archive to reduce
the disk space they need to use, but this is not available yet. &dagger;</li>
<li> You should be able to provide around 10 to 15 gigabytes of free disk 
space. </li>
<li> You should be able to cope with at least 50 to 100 gigabytes of 
traffic / bandwidth per month </li>
<li> You should be able to keep your mirror up-to-date using
<a href="http://rsync.samba.org/">rsync</a> &mdash; we do not support
any other method of mirror updates at this time. </li>
<li> Your mirror's filesystem should be able to handle symbolic links, which 
we use within the Archive for organisational purposes.  Windows does not
support symbolic links, Mac OS X, Linux and most UNIX platforms do. </li>
</ul>
<p>
&dagger; Related to this point, we don't recommend complete mirrors be
hosted using residential access methods, such as dial-up, cable or DSL,
as you would likely find your upstream connection swamped and unusable.
</p>
<p>
If you're still interested in hosting an evolt.org Browser Archive Mirror,
or have any further questions, please <a href="http://evolt.org/contact/">get
in touch</a>.
</p>

<hr>

<p><strong class="title">Mirror Status</strong></p>

<p>
<table border="0" cellpadding="3" cellspacing="0">
<tr><td>&nbsp;</td><td align="left"><strong>Last updated</strong></td></tr>
<!-- this section will eventually be driven by db -->
<tr><td align="right" valign="middle"><strong>Master (TX,US)</strong></td>
    <td align="left" valign="middle" nowrap><? include "mirrors/checks/master-http.inc"; ?></td></tr>
<tr><td align="right" valign="middle" nowrap><strong>mirrorservice.org (UK) (HTTP)</strong></td>
    <td align="left" valign="middle" nowrap><? include "mirrors/checks/mirrorservice.org-http.inc"; ?></td></tr>
<tr><td align="right" valign="middle" nowrap><strong>zensoft.net (FR) (HTTP)</strong></td>
    <td align="left" valign="middle" nowrap><? include "mirrors/checks/browsers-fr.mirrors.zensoft.net-http.inc"; ?></td></tr>
<tr><td align="right" valign="middle" nowrap><strong>zensoft.net (US) (HTTP)</strong></td>
    <td align="left" valign="middle" nowrap><? include "mirrors/checks/browsers-us.mirrors.zensoft.net-http.inc"; ?></td></tr>
<tr><td align="right" valign="middle" nowrap><strong>JISC NMS (UK) (HTTP)</strong></td>
    <td align="left" valign="middle" nowrap><? include "mirrors/checks/mirroracuk-http.inc"; ?></td></tr>
<tr><td align="right" valign="middle" nowrap><strong>Planetmirror (AU) (HTTP)</strong></td>
    <td align="left" valign="middle" nowrap><? include "mirrors/checks/planetmirror.com-http.inc"; ?></td></tr>
<tr><td align="right" valign="middle" nowrap><strong>evolt.winworldpc.com (US) (HTTP)</strong></td>
    <td align="left" valign="middle" nowrap><? include "mirrors/checks/evolt.winworldpc.com-http.inc"; ?></td></tr>
<tr><td align="right" valign="middle"><strong>Flirble (UK) (HTTP)</strong></td>
    <td align="left" valign="middle" nowrap><? include "mirrors/checks/flirble-http.inc"; ?></td></tr>
<tr><td align="right" valign="middle"><strong>Fuseware (TX,US) (HTTP)</strong></td>
    <td align="left" valign="middle" nowrap><? include "mirrors/checks/fuseware-http.inc"; ?></td></tr>
<tr><td align="right" valign="middle"><strong>Webhack (TX,US) (HTTP)</strong></td>
    <td align="left" valign="middle" nowrap><? include "mirrors/checks/webhack-http.inc"; ?></td></tr>
<tr><td align="right" valign="middle"><strong>2D Hosting (TX,US) (HTTP)</strong></td>
    <td align="left" valign="middle" nowrap><? include "mirrors/checks/2dhosting-http.inc"; ?></td></tr>
<tr><td align="right" valign="middle"><strong>Gosume (TX,US) (HTTP)</strong></td>
    <td align="left" valign="middle" nowrap><? include "mirrors/checks/gosume-http.inc"; ?></td></tr>

</table>
</p>


<?php
include "assets/inc/page-content-shut.inc";
include "assets/inc/page-footer.inc";
include "assets/inc/page-stop.inc";
?>
