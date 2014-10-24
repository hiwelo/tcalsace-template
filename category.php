<?php get_header(); ?>

	<div id="categorie">
		<h2 class="lettrine">Catégorie &laquo;&nbsp;<?php echo single_cat_title('', false); ?>&nbsp;&raquo;</h2>
		
		<?php
			// On affiche la description de la catégorie si elle existe
			$description = term_description();
			if (!empty($description)) {
				echo '<div id="description-categorie">'.$description.'</div>';
			}
		?>
		
		<section id="content-area">
			<?php
				// S'il y a des messages, on commence la boucle
				if (have_posts()) :
				
					while (have_posts()) : the_post();
						
						get_template_part('content', get_post_format());
						
					endwhile;
					
				else :
				
					get_template_part('content', 'none');
					
				endif;
				
				wp_reset_query();
			?>
		</section>
	</div>

<?php get_footer(); ?>