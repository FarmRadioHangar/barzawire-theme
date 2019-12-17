<?php

class Theme
{
    /**
     * Constructor
     */
    function __construct()
    {
        add_action( 'after_setup_theme', array( $this, 'init' ) );
        add_action( 'wp_enqueue_scripts', array ( $this, 'enqueue_theme_styles' ), PHP_INT_MAX );
    }

    /**
     * Initialize the theme
     */
    function init()
    {
        $this->add_post_type( 'farmer-stories', 'Farmer stories', 'Farmer story' );
        $this->add_post_type( 'news', 'News in brief' );
        $this->add_post_type( 'resources', 'Resources', 'Resource' );
        $this->add_post_type( 'spotlights', 'Spotlights', 'Spotlight' );
        $this->add_post_type( 'weeks-script', 'Script of the week' );
        $this->add_post_type( 'opportunities', 'Opportunities', 'Opportunity' );
        $this->add_post_type( 'archives', 'Archives', 'Archive' );
        $this->add_post_type( 'yenkasa', 'YenKasa' );

        $this->add_taxonomy ( 'issues', 'Issue', 'issue' );
        $this->add_taxonomy ( 'country', 'Country', 'country' );
    }

    /**
     * Create a custom post type using the theme's default settings
     *
     * @param string $post_type Internal key
     * @param string $name The post type's public name
     * @param string $singular_name An optional name used for singular entities
     */
    function add_post_type( $post_type, $name, $singular_name = NULL )
    {
        if ( NULL === $singular_name ) {
            $singular_name = $name;
        }
        register_post_type( $post_type,
            array(
                'labels' => array(
                    'name'          => __( $name ),
                    'singular_name' => __( $singular_name )
                ),
                'public'            => true,
                'has_archive'       => true,
                'taxonomies'        => array( 'post_tag' ),
                'show_in_rest'      => true,
                'show_in_nav_menus' => true,
                'supports'          => array( 'title', 'editor', 'thumbnail', 'author' )
            )
        );
    }

    /**
     * Create a taxonomy using the theme's default settings
     *
     * @param string $taxonomy Internal key
     * @param string $label The name of the taxonomy
     * @param string $slug Machine-friendly representation
     */
    function add_taxonomy( $taxonomy, $label, $slug )
    {
        register_taxonomy(
            $taxonomy,
            array(
                'farmer-stories',
                'news',
                'resources',
                'spotlights',
                'weeks-script',
                'opportunities',
                'archives',
                'yenkasa'
            ),
            array(
                'label'             => __( $label ),
                'rewrite'           => array( 'slug' => $slug ),
                'public'            => true,
                'show_admin_column' => true,
                'hierarchical'      => false
            )
        );
    }

    /**
     * Language menu
     */
    function language_nav()
    {
        wp_nav_menu(
            array(
              'theme_location'  => 'extra-menu',
              'menu'            => '',
              'container'       => 'div',
              'container_class' => 'menu-{menu slug}-container',
              'container_id'    => '',
              'menu_class'      => 'menu',
              'menu_id'         => '',
              'echo'            => true,
              'fallback_cb'     => 'wp_page_menu',
              'before'          => '',
              'after'           => '',
              'link_before'     => '',
              'link_after'      => '',
              'items_wrap'      => '<ul class="nav ml-auto">%3$s</ul>',
              'depth'           => 0,
              'walker'          => new Walker_Language_Menu()
            )
        );
    }

    /**
     * Site main navigation
     */
    function main_nav()
    {
        wp_nav_menu(
            array(
                'theme_location'  => 'header-menu',
                'menu'            => '',
                'container'       => 'div',
                'container_class' => 'menu-{menu slug}-container',
                'container_id'    => '',
                'menu_class'      => 'menu',
                'menu_id'         => '',
                'echo'            => true,
                'fallback_cb'     => 'wp_page_menu',
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'items_wrap'      => '<ul class="navbar-nav ml-auto mt-2 mt-lg-0">%3$s</ul>',
                'depth'           => 0,
                'walker'          => new Walker_Main_Menu()
            )
        );
    }

    /**
     * Register the theme's stylesheet
     */
    function enqueue_theme_styles()
    {
        wp_dequeue_style( 'html5blank' );
        wp_deregister_style( 'html5blank' );

        wp_enqueue_style( 'wire', get_stylesheet_directory_uri() . '/style.css' );
    }
}

class Walker_Language_Menu extends Walker_Nav_menu
{
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
    {
        $current = str_replace( '-', '_', $item->lang ) === pll_current_language( 'locale' );
        $output .= sprintf( '<li class="nav-item"><a href="%s"%s><span class="d-block d-md-none">%s</span><span class="d-none d-md-block">%s</span></a></li>',
            $item->url,
            ' class="nav-link' . ( $current ? ' current' : '' ) . '"',
            substr( $item->lang, 0, 2 ),
            $item->title
        );
    }
}

class Walker_Main_Menu extends Walker_Nav_menu
{
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
    {
        $output .= sprintf(
            '<li class="%s"><a class="nav-link" href="%s"%s>%s</a></li>',
            'nav-item' . ( $item->current ? ' active' : '' ),
            $item->url,
            $item->current ? ' class="current"' : '',
            $item->title
        );
    }
}

$theme = new Theme();

?>
