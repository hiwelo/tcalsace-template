<h2 class="lettrine">À la une</h2>
<section id="featured-contents">
	<?php
		$sticky = get_option('sticky_posts');
		$args = array(	'showposts'			=>	2,
						'post__in'			=>	$sticky,
						'caller_get_posts'	=>	2,
						'orderby'			=>	'date');
					  
		$article = new WP_Query($args);
		
		while ( $article->have_posts() ) : $article->the_post();
		$url_miniature = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
	?><!--
 --><article id="article-<?php echo the_ID(); ?>" class="article-en-avant" style="background-image: url('<?php echo $url_miniature[0]; ?>');">
		<a href="<?php echo the_permalink(); ?>">
			<header>
				<h3><?php the_title(); ?></h3>
			</header>
		</a>
	</article><!--
 --><?php endwhile; wp_reset_query(); ?>
</section>