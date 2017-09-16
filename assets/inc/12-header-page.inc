<?php
// browserarchive.org aka browsers.evolt.org
// Copyright (c) 1999-2013 Adrian Roselli, William Anderson
?>
<header id="content-header">
    <div class="wrapper">
            <h1><?php echo $page_title ?></h1>
            <p itemscope itemtype="http://data-vocabulary.org/Breadcrumb" id="breadcrumbs">
            	<a href="/" rel="home" itemprop="url"><span itemprop="title">evolt.org</span></a> 
<?php if ( isset($upstairs_uri) ) { ?>
				<span class="divider">&gt;</span>
				<a href="<?php echo $upstairs_uri ?>" itemprop="url"><span itemprop="title"><?php echo $upstairs_title ?></span></a>
<?php } ?>
            	<span class="divider">&gt;</span> 
            	<?php echo $short_title ?>
            </p>
    </div>
</header>