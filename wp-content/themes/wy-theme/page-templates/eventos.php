<?php
/**
 * Template Name: Eventos
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('understrap_container_type');

if (is_front_page()) {
    // Handle front page specifics if needed
}
?>

<div id="eventos">
    <div class="<?php echo esc_attr($container); ?>" id="content">
		 <!-- Custom content -->
		 <?php
                // Get custom fields for title and text
                $title = get_field('title');
                $text = get_field('text');
                ?>

		<?php get_template_part('template-parts/top_image'); ?>


		<div class="row">
			<div class="col-12 spacer">
				<div class="row">
					<div class="col-12 col-md-8 offset-md-2 mt-5 mb-5">
						<h2><?php echo esc_html($title); ?></h2>
						<p><?php echo esc_html($text); ?></p>
					</div>
				</div>

				<?php
				// Custom query to get eventos
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

				$args = array(
					'post_type'      => 'eventos',
					'posts_per_page' => 3,  // Number of posts per page
					'paged'          => $paged,
				);

				// Custom WP_Query
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
	

						<!-- Pagination -->
						<div class="pagination d-flex flex-row align-items-center justify-content-center">
							<?php
							echo paginate_links(array(
								'total'   => $query->max_num_pages,
								'current' => $paged,
								'format'  => '?paged=%#%',
								'prev_text' => __('Anterior', 'text_domain'),
								'next_text' => __('Próximo ', 'text_domain') ,
							));
							?>
						</div>

					</div>
					<?php wp_reset_postdata(); // Reset the query ?>
				<?php else : ?>
					<p><?php _e('Nenhum evento encontrado.', 'text_domain'); ?></p>
				<?php endif; ?>
			</div>
		</div>
          
    </div><!-- #content -->
</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
?>
