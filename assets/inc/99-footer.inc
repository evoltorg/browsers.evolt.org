<?php
// browserarchive.org aka browsers.evolt.org
// Copyright (c) 1999-2013 Adrian Roselli, William Anderson
?>

<a id="back-to-top" href="#" title="Back to top"><i class="fa fa-angle-up"></i></a>

<footer id="footer" role="contentinfo">
<div class="wrapper">
    <div class="p100">
        <div class="p10"><img src="/assets/img/small-evoltlogo.png" height="32" width="32" alt="" /></div>
        <div class="p90">
            <p class="left"><strong>Workers of the Web, Unite!</strong><br />
            Founded in 1998, evolt.org is a world community for web developers, promoting the mutual free exchange of ideas, skills and experiences</p>
        </div>
        <br class="clear" />
    </div>
</div>
</footer>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="/assets/js/jquery.easing.js"></script>
<script src="/assets/js/jquery.cycle.all.js"></script>
<script src="/assets/js/jquery.jcarousel.min.js"></script>
<script src="/assets/js/jquery.isotope.min.js"></script>
<script src="/assets/js/jquery.mixitup.min.js"></script>
<script src="/assets/js/jquery.magnific-popup.min.js"></script>
<script src="/assets/js/jquery.mobilemenu.js"></script>
<script src="/assets/js/scripts.js"></script>
<script>
jQuery(window).load(function() {
	// init Cycle for slider
	$('#slides').after('<div id="circle-pager">').cycle({
		fx:      'fade',
		speed:    800,
		timeout:  8000,
		cleartype:  true,
		cleartypeNoBg: false,
		pager: '#circle-pager',
		next:  '#slider .next1',
		prev:  '#slider .prev1',
		slideResize: false,
		fit: 0,
		width: '100%',
		before:  function(currSlideElement, nextSlideElement) {
			// hide elements and put them in start position
			$(this).find('.slide-image').css({
				'opacity': '0',
				'right': '-50px'
			});
			$(this).find('.slide-text').css({
				'opacity': '0',
				'left': '-50px'
			});
			$(this).find('.slide-text p').css({
				'opacity': '0',
				'left': '15px'
			});
			$(this).find('.slide-image img').css({
				'opacity': '0',
				'right': '-100px'
			});
		},
		after:  function(currSlideElement, nextSlideElement) {
			// fade in image
			$(this).find('.slide-image').animate({
				'opacity': '1',
				'right': '0'
			}, 500, 'linear');
			// bring the text box from top
			$(this).find('.slide-text').delay(500).animate({
				'opacity': '1',
				'left': '0'
			}, 500, 'easeOutBack');
			// bring the paragraphs in
			$(this).find('.slide-text p:eq(0)').delay(500).animate({
				'opacity': '1',
				'left': '0'
			}, 500, 'easeOutBack');
			$(this).find('.slide-text p:eq(1)').delay(700).animate({
				'opacity': '1',
				'left': '0'
			}, 500, 'easeOutBack');
			$(this).find('.slide-text p:eq(2)').delay(900).animate({
				'opacity': '1',
				'left': '0'
			}, 500, 'easeOutBack');
			$(this).find('.slide-text p:eq(3)').delay(1100).animate({
				'opacity': '1',
				'left': '0'
			}, 500, 'easeOutBack');
			// bring the front images in
			$(this).find('.slide-image img:eq(0)').delay(500).animate({
				'opacity': '1',
				'right': '0'
			}, 800, 'easeOutBack');
			$(this).find('.slide-image img:eq(1)').delay(700).animate({
				'opacity': '1',
				'right': '0'
			}, 800, 'easeOutBack');
			$(this).find('.slide-image img:eq(2)').delay(900).animate({
				'opacity': '1',
				'right': '0'
			}, 800, 'easeOutBack');
			$(this).find('.slide-image img:eq(3)').delay(1100).animate({
				'opacity': '1',
				'right': '0'
			}, 800, 'easeOutBack');

		}
	});


	// init jCarousel for portfolio pieces
	$('.sneakpeak-carousel').jcarousel({
		'wrap': 'both'
	});
	$('.sneakpeak-prev').click(function() {
		$('.sneakpeak-carousel').jcarousel('scroll', '-=1');
	});
	$('.sneakpeak-next').click(function() {
		$('.sneakpeak-carousel').jcarousel('scroll', '+=1');
	});

});
</script>
<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-25047390-2']);
	  _gaq.push(['_trackPageview']);

	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

</script>

</body>
</html>
