	</div><!-- #main -->
	<div id="footer" role="contentinfo">
		<div id="footer_twitter">
			<span class="home_title">Twitter</span>
		</div>
		<div id="footer_instagram">
			<span class="home_title">Facebook Gallery</span>
 			<?php //echo do_shortcode('[instapress piccount="3" userid="mateuszwilanowicz" size="200" title="1" effect="fancybox"]'); ?>
 			<?php 
			
				//echo do_shortcode('[fbAlbum]158703440813262[/fbAlbum]'); 
				echo fbAlbumGrabber();
			
			?>
			
			
			
		</div>
		<div id="footer_social">
			<div id="footer_signup">
				<a href="https://www.anyahindmarch.com/SignUp/default">
					<img src="<?php bloginfo('template_directory');?>/images/signup.png" alt="Sign Up" />
				</a>
			</div>
			<h3>Explore More</h3>
			<div id="footer_social_links">
				<a href="http://www.facebook.com/AnyaHindmarch" target="_blank">
					<img src="<?php bloginfo('template_directory');?>/images/social/fb.png" alt="Facebook" />
				</a>
				<a href="http://twitter.com/anyahindmarch" target="_blank">
					<img src="<?php bloginfo('template_directory');?>/images/social/twitter.png" alt="Twitter" />
				</a>
				<!-- <a href="" target="_blank">
					<img src="<?php //bloginfo('template_directory');?>/images/social/instagram.png" alt="Instagram" />
				</a> -->
				<a href="http://www.youtube.com/user/anyahindmarchmovies" target="_blank">
					<img src="<?php bloginfo('template_directory');?>/images/social/youtube.png" alt="YouTube" />
				</a>
				<a href="http://ahscrapbook.tumblr.com/" target="_blank">
					<img src="<?php bloginfo('template_directory');?>/images/social/tumblr.png" alt="tumblr" />
				</a>

			</div>
		</div>
	</div><!-- #footer -->
	<div class="global_footer">
		<a href="http://www.anyahindmarch.com/page/CustomerServices">Customer Services</a>
		<a href="http://www.anyahindmarch.com/about_us/terms">Terms &amp; Conditions</a>
		<a href="http://www.anyahindmarch.com/about_us/PrivacyPolicy">Privacy &amp; Cookie Policy</a>
		<a href="http://www.anyahindmarch.com/about_us/careers_listing">Careers</a>
		<a href="http://www.anyahindmarch.com/sitemap">Site Map</a>
		<a href="http://www.anyahindmarch.com/about_us/store_locator">Store Guide</a><br />
		<span class="copyright">
			&copy; Anya Hindmarch 2012
		</span>
	</div>
	<div class="clearer"></div>
</div><!-- #wrapper -->
<div class="clearer"></div>
	<?php wp_footer(); ?>
	<script type="text/javascript">
		var instagrams = [];
		var currentInstagram = 0;
		var fb_thumbs = [];
		var currentFb = 0;
		
		/*
		function rotate() {
			jQuery(instagrams[currentInstagram]).closest('div').fadeOut();
			++currentInstagram;
			if(currentInstagram == instagrams.length) {
				currentInstagram = 0;
			}
			jQuery(instagrams[currentInstagram]).closest('div').fadeIn();
			setTimeout('rotate()', 10000);
		}
		*/
		
		jQuery(document).ready(function() {
			jQuery.getJSON("http://api.twitter.com/1/statuses/user_timeline.json?screen_name=anyahindmarch&count=3&include_rts=1&page=1&include_entities=1&callback=?", function(data) {
				jQuery.each(data, function() {
					var tweet = this.text;
					var tweetDate = parseInt(Date.parse(this.created_at) / 1000);
					var thisDate = parseInt(new Date().valueOf() / 1000);
					var timeDifference = thisDate - tweetDate;

					var timeString = 'Posted ';

					if(timeDifference >= 86400) {
						var days = Math.floor(timeDifference / 86400);
						timeString += days + ' day';
						if(days > 1)
							timeString += 's';
						timeDifference = timeDifference % 86400;
					}
					if(timeDifference >= 3600) {
						if(timeString.length > 8)
							timeString += ', ';
						var hours = Math.floor(timeDifference / 3600);
						timeString += hours + ' hour';
						if(hours > 1)
							timeString += 's';
						timeDifference = timeDifference % 3600;
					}
					if(timeDifference >= 60) {
						if(timeString.length > 8)
							timeString += ', ';
						var mins = Math.floor(timeDifference / 60);
						timeString += mins + ' minute';
						if(mins > 1)
							timeString += 's';
						timeDifference = timeDifference % 60;
					}

					if(timeString.length > 8)
						timeString += ' ago';
					else
						timeString = 'just now';

					jQuery('#footer_twitter').append('<div class="tweet">' + tweet + '<div class="tweet_info">' + timeString + '</div></div>');

				});
			});
			jQuery('#menu-item-33>a').click(function() {
				jQuery('.sub-menu').slideToggle();
				return false;
			});
			if(location.href.indexOf('news') == -1) {
				jQuery('.sub-menu').hide();
			}
			
			//jQuery('.instapress-shortcode').css({ visibility: 'hidden', overflow: 'hidden', height: '250px' });
			/*
			setTimeout(function() {
				instagrams = jQuery('.instapress-shortcode-image a');
				jQuery.each(instagrams, function() {
					jQuery(this).parent().append('<span class="instatitle">' + this.title + '</span>').not(':first-child').hide();;
				});
				if(instagrams.length > 1) {
					setTimeout('rotate()', 8000);
				}
				jQuery('.instapress-shortcode').css({ visibility: 'visible', height: '250px' });
			}, 500);
			*/
			
		});
		
		function rotateFbImage() {
			jQuery(fb_thumbs[currentFb]).closest('div').fadeOut();
			++currentFb;
			if(currentFb == fb_thumbs.length) {
				currentFb = 0;
			}
			jQuery(fb_thumbs[currentFb]).closest('div').fadeIn();
			setTimeout('rotateFbImage()', 5000);
		}
	</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-11898418-1']);
  _gaq.push(['_setDomainName', 'anyahindmarch.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>