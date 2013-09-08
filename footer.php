<?php
/**
 * フッター
 *
 * class="main-container" div の閉じタグ以降のコンテンツ
 *
 * @package    WordPress
 * @subpackage Hoho
 */
?>

</div>
<!-- #main-container -->

<div class="footer-container">
	<footer class="wrapper">
		<h3>footer</h3>
	</footer>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/plugins.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/main.js"></script>

<script>
	var _gaq = [
		['_setAccount', 'UA-XXXXX-X'],
		['_trackPageview']
	];
	(function (d, t) {
		var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
		g.src = '//www.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g, s)
	}(document, 'script'));
</script>
</body>
</html>
