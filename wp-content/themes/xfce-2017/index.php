<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>>
<head>
	<title><?php wp_title( '&laquo;', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<meta name="copyright" content="Copyright 2003–<?php echo date( 'Y' ); ?> Xfce Development Team" />
	<meta name="description" content="<?php bloginfo( 'name' ); ?><?php if( strlen( get_bloginfo( 'description' ) ) > 0 ) { ?> – <?php bloginfo( 'description' ); } ?>" />

	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri( ); ?>/images/favicon.ico">
	<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1" />

	<?php wp_head( ); ?>
</head>

<body <?php body_class( ); ?>>

	<?php get_template_part( 'xfce-header' ); ?>

	<div id="main">
		<div id="mainnav" class="group">
			<div>
				<?php wp_nav_menu( array( 'theme_location' => 'navi_main', 'fallback_cb' => FALSE ) ); ?>
			</div>
		</div>

		<div id="content">
			<div id="article">
			<?php
				if( have_posts( ) ) {
					while( have_posts( ) ) {
						the_post( );
						echo '<div class="single">';
						echo '<h1 class="xfce-title"><a href="' . get_the_permalink( ) . '" rel="bookmark" title="' . get_the_title( ) .'">' . get_the_title( ) . '</a></h1>';
						echo '<ul class="meta"><li class="date">' . date_i18n( get_option( 'date_format' ), get_the_time( 'U' ) ) . '</li><li class="author">' . get_the_author( ) . '</li></ul>';
						the_content( __( 'Read the rest of this article &raquo;', 'xfce' ) ); 
						echo '</div>';
					}
				} else {
					echo '<h1>' . __( 'Content not found.', 'xfce' ) . '</h1>';
					echo '<p>' . __( 'The content you were looking for was not found.', 'xfce' ) . '</p>';
				}
			?>
			<?php
				$next = get_next_posts_link( );
				$prev = get_previous_posts_link( );
				if( $next || $prev ) {
					echo '<div class="pagination">';
					if( $prev ) { echo '<div class="prev">' . $prev . '</div>'; }
					if( $next ) { echo '<div class="next">' . $next . '</div>'; }
					echo '</div>';
				}
			?>
		 	</div>
			<div id="related">
				<?php if( function_exists( 'dynamic_sidebar' ) ) {
					dynamic_sidebar( 'sidebar_main' );
				} ?>
			</div>
		</div>
	</div>

	<div id="footer" class="group">
		<p>Copyright 2003-2017 <a href="https://xfce.org/about/credits">Xfce Development Team</a>.</p>
		<?php wp_footer( ); ?>
	</div>

</body>
</html>
