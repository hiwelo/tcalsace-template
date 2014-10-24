<?php if (is_single() || is_page()) : ?>
	<article id="article-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="couverture" style="background-image: url('<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0]; ?>');">
			<header>
				<h1><?php the_title(); ?></h1>
				<aside>
					<span class="auteur"><?php the_author_posts_link(); ?></span>
					<span class="date"><?php the_date(); ?></span>
					<?php if ( !is_page() ) : ?><span class="categories"><?php the_category(); ?></span><?php endif; ?>
				</aside>
			</header>
			<div class="legende-thumbnail"><?php echo get_post_field('post_excerpt', get_post_thumbnail_id()); ?></div>
		</div>
		
		<?php
			// On regarde s'il existe un message d'information et on l'affiche
	
			// Le contenu est-il archivé ?
			if (get_post_meta(get_the_ID(), 'archive', true) && is_single()) :
			
				get_template_part('contenu-archive');
			
			else :
				// Le contenu est-il partisan ?
				if (get_post_meta(get_the_ID(), 'partisan', true) && is_single()) :
				
					get_template_part('contenu-partisan');
				
				// Le contenu est-il alors juste âgé ?
				else :
				
					// On calcule le nombre de secondes entre maintenant et la date de l'article
					$date['secParJours'] = 60*60*24;
					$date['article'] = strtotime(get_the_date('Y-m-d'));
					$date['now'] = time();
					$date['diff'] = $date['now'] - $date['article'];
					$date['jours'] = round($date['diff'] / $date['secParJours']);
					$date['annees'] = floor($date['jours'] / 365);
					
					if ($date['annees'] >= 1 && is_single()	) :
					
						get_template_part('contenu-vieux');
					
					endif;
					
				endif;
			
			endif;
		?>
	
		<div class="contenu-principal"><?php echo the_content(); ?></div>
	
	</article>
<?php else : ?>
	<article id="article-<?php the_ID(); ?>" <?php post_class(); ?>>
		<a href="<?php echo the_permalink(); ?>"><div class="miniature-article" style="background-image: url('<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0]; ?>');"></div></a>
		<header>
			<h3><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<aside>
				<span class="auteur"><?php the_author_posts_link(); ?></span>
				<span class="date"><?php the_date(); ?></span>
				<span class="categories"><?php the_category(); ?></span>
			</aside>
		</header>
		
		<?php echo the_excerpt(); ?>
	
	</article>
<?php endif; ?>