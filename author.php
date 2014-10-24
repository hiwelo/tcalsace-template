<?php get_header(); ?>

	<section id="author">
		<header id="author-desc">
			<?php echo get_avatar(get_the_author_meta('user_email'), '100'); ?>
			<h1><?php the_author(); ?></h1>
			<p><?php the_author_meta('description'); ?></p>
			<ul id="statistiques-auteur"><!--
			 --><li><?php echo count_user_posts(); ?> article<?php if (count_user_posts() > 1) : ?>s<?php endif; ?></li><!--
			 --><?php if (get_the_author_meta('user_url')) : ?><li><a href="<?php echo the_author_meta('user_url'); ?>"><?php the_author_meta('user_url'); ?></a></li><?php endif; ?><!--
		 --></ul>	
		</header>
		
		<div id="content-area">
		
		<?php if ( have_posts() ) :
	
			while ( have_posts() ) : the_post();
			
				get_template_part( 'content', get_post_format() );
			
			endwhile;
	
		else : ?>
		
			<p id="aucun-article">À l'heure actuelle, cet auteur n'a jamais rédigé d'articles.</p>
		
		<?php endif; ?>
		
		</div>

	</section>

<?php get_footer(); ?>