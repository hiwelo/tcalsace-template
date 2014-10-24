<?php error_reporting(E_ALL);
ini_set('error_reporting', E_ALL); ?>
<?php get_header(); ?>

	<div id="single">
		<?php 
			// Start the Loop.
			while ( have_posts() ) : the_post();
				/*
				 * Include the post format-specific template for the content. If you want to
				 * use this in a child theme, then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( 'content' );
				
			endwhile;
		?>
	</div>

<?php get_footer(); ?>