<?php
/**
 * UnderStrap functions and definitions
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = 'inc';

// Array of files to include.
$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

// Load WooCommerce functions if WooCommerce is activated.
if ( class_exists( 'WooCommerce' ) ) {
	$understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if ( class_exists( 'Jetpack' ) ) {
	$understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ( $understrap_includes as $file ) {
	require_once get_theme_file_path( $understrap_inc_dir . $file );
}


// register blocks


if (function_exists('acf_register_block_type')) {
    function my_acf_blocks_init() {
        // Bloco Hero
        acf_register_block_type(array(
            'name'              => 'hero',  
            'title'             => __('Hero'), 
            'description'       => __('Um bloco de Hero para a página inicial'),  // Descrição do bloco
            'render_template'   => 'template-parts/blocks/hero.php',  // Caminho para o template PHP
            'category'          => 'formatting',  // Categoria no editor Gutenberg
            'icon'              => 'cover-image',  // Ícone do bloco no editor
            'keywords'          => array('hero', 'banner', 'principal'),  // Palavras-chave para o bloco
            'supports'          => array('align' => true)  // Suporte para alinhamento
        ));

        // Bloco Slider
        acf_register_block_type(array(
            'name'              => 'slider',  
            'title'             => __('Slider'),  
            'description'       => __('Um bloco de Slider para imagens ou conteúdo'),  // Descrição do bloco
            'render_template'   => 'template-parts/blocks/slider.php',  // Caminho para o template PHP
            'category'          => 'formatting',  // Categoria no editor Gutenberg
            'icon'              => 'images-alt2',  // Ícone do bloco no editor
            'keywords'          => array('slider', 'carousel', 'imagens'),  // Palavras-chave para o bloco
            'supports'          => array('align' => true)  // Suporte para alinhamento
        ));
		// Bloco de Posts
		acf_register_block_type(array(
			'name'              => 'post_list',  
			'title'             => __('Posts'), 
			'description'       => __('Um bloco para mostrar uma lista de posts'),  
			'render_template'   => 'template-parts/blocks/posts.php',  // Caminho para o template PHP
			'category'          => 'formatting',  
			'icon'              => 'list-view',  
			'keywords'          => array('posts', 'list', 'blog'),  
			'supports'          => array('align' => true)  
		));


    }
    add_action('acf/init', 'my_acf_blocks_init');
}



// custom post type Eventos


// Registrar Custom Post Type para Eventos

function create_eventos_post_type() {
    $labels = array(
        'name'               => __('Eventos', 'text_domain'),
        'singular_name'      => __('Evento', 'text_domain'),
        'menu_name'          => __('Eventos', 'text_domain'),
        'name_admin_bar'     => __('Evento', 'text_domain'),
        'add_new'            => __('Adicionar Novo', 'text_domain'),
        'add_new_item'       => __('Adicionar Novo Evento', 'text_domain'),
        'new_item'           => __('Novo Evento', 'text_domain'),
        'edit_item'          => __('Editar Evento', 'text_domain'),
        'view_item'          => __('Ver Evento', 'text_domain'),
        'all_items'          => __('Todos os Eventos', 'text_domain'),
        'search_items'       => __('Pesquisar Eventos', 'text_domain'),
        'not_found'          => __('Nenhum evento encontrado.', 'text_domain'),
        'not_found_in_trash' => __('Nenhum evento encontrado na lixeira.', 'text_domain'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'eventos'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'), // 'editor' ativa o Gutenberg
        'show_in_rest'       => true, // Habilita o suporte ao editor Gutenberg
    );

    register_post_type('eventos', $args);
}

add_action('init', 'create_eventos_post_type');


function enqueue_assets() {
    // Register Bootstrap CSS from a different CDN
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', array(), '5.1.3');

    // Register Bootstrap JS
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.1.3', true);

    // Enqueue Block-Specific Styles
    if (has_block('acf/hero')) {
        wp_enqueue_style('hero-block-style', get_template_directory_uri() . '/template-parts/blocks/hero.css');
    }

    if (has_block('acf/slider')) {
        wp_enqueue_style('slider-block-style', get_template_directory_uri() . '/template-parts/blocks/slider.css');
    }
}

// Hook to enqueue scripts and styles on both front-end and block editor
add_action('wp_enqueue_scripts', 'enqueue_assets');
add_action('enqueue_block_editor_assets', 'enqueue_assets');


function change_read_more_text($more) {
    return '... <a class="more-link" href="' . get_permalink() . '">Ler mais</a>';
}
add_filter('excerpt_more', 'change_read_more_text');