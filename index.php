<?php get_header(); ?>
	
	<div id="contenu">
		<?php 
		
			// S'il y a des articles mis en avant, on les affiche
			$sticky = get_option('sticky_posts');
			// S'il s'agit de la frontpage, on affiche une mise en page spécifique
			if (is_home()) {
			
				// On affiche les articles mis en avant
				if (get_option('sticky_posts')) {
					get_template_part('featured-content');
				}
				
				
				// On fait la liste des deux articles mis en avant
				$args = array(	'showposts'				=>	2,
								'post__in'				=>	$sticky,
								'ignore_sticky_posts'	=>	2,
								'orderby'				=>	'date');
							  
				$stickys = new WP_Query($args);
				
				while ( $stickys->have_posts() ) : $stickys->the_post();
					$sticky_affiches[] = get_the_ID();
				endwhile; wp_reset_query();


				// On affiche ensuite le bloc Késako // Évents à venir
				
				get_template_part('bloc-presentation');
				
				
				// On affiche la liste des derniers posts
				
				echo "<section id=\"content-area\">";
				
					echo "<h2 class=\"lettrine\">Les dernières publications</h2>";
					
					// Liste des catégories n'ayant pas à être en première page
					$cat_not_in = array(	447,		// La revue de presse
										450);	// Les communiqués de presse

					// On fait la liste des deux articles mis en avant
					$args = array(	'showposts'			=>	5,
									'post__not_in'		=>	$sticky_affiches,
									'category__not_in'	=>	$cat_not_in,
									'caller_get_posts'	=>	1,
									'orderby'			=>	'date');
								  
					$article = new WP_Query($args);

					// S'il y a des messages, on commence la boucle
					if ($article->have_posts()) {
						while ($article->have_posts()) {
							$article->the_post();
							
							get_template_part('content', get_post_format());
						}
					} else {
						get_template_part('content', 'none');
					}
					
					wp_reset_query();
				
				echo "</section>";
			}
		?>
	</div>
	
<?php get_footer(); ?>