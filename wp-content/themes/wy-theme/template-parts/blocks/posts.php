	<!-- POSTS -->
	<?php
		$title = get_field('title');
		$text = get_field('text');
	?>

	<div class="row">
		<div class="col-12 spacer"></div>
	</div>

	<div class="row">
		<div class="col-12">

			<div class="row">
				<div class="col-12 col-md-8 offset-md-2 mt-5 mb-5">
					<h2><?php echo $title;?></h2>
					<p><?php echo $text;?></p>
				</div>
			</div>



		<?php
			// Get the number of posts from ACF fields
			$number_of_posts = get_field('numero_de_posts');
			$post_type = get_field('post_type') ?: 'post'; // Default to 'post' if not set

			// Query the posts
			$args = array(
				'post_type'      => $post_type,
				'posts_per_page' => $number_of_posts,
			);

			// Executa a consulta para buscar os posts
			$query = new WP_Query($args);

			// Verifica se há posts para exibir
			if ($query->have_posts()) :?>

				<div class="row">
					<div class="col-12 col-lg-10 offset-lg-1">
						<div class="row">

				<?php
				while ($query->have_posts()) : $query->the_post(); ?>

					<div class="col-12 col-md-4">
					
					<!-- HTML e PHP para exibir cada post -->
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="entry-content">
							<?php the_excerpt(); // Exibe o resumo do post ?>
						</div>
					</article>

					</div>

				<?php endwhile;?>


						</div>
					</div>

				</div>

				<?php
				// Restaura a query global do WordPress
				wp_reset_postdata();
			else :
				// Caso não haja posts, exibe uma mensagem
				echo '<p>Sem posts para exibir.</p>';
			endif;
			?>


			<div class="row">
				<div class="col-12 spacer"></div>
			</div>


			<div class="row">
				<div class="col-12 d-flex flex-column align-items-center justify-content-center pt-5 pb-5 bg-search">
					
					<div class="footer-search">
						<h3 class="search-title">Procurar artigo</h3> 
						<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
							<input type="hidden" name="post_type" value="post" /> 
							<label>
								<span class="screen-reader-text"><?php echo _x('Search for:', 'label'); ?></span>
								<input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search …', 'placeholder'); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x('Search for:', 'label'); ?>" />
							</label>
							<button type="submit" class="search-submit"><?php echo esc_html_x('Search', 'submit button'); ?></button>
						</form>
					</div>
				</div>
			</div>


		</div>
	</div>