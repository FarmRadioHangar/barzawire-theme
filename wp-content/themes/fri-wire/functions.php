<?php

class Theme
{
    /**
     * Constructor
     */
    function __construct()
    {
        add_action( 'init', array( $this, 'init' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_theme_styles' ), PHP_INT_MAX );
        add_action( 'after_setup_theme', array( $this, 'remove_parent_filters' ) );
        add_action( 'after_setup_theme', array( $this, 'remove_parent_actions' ) );
        add_action( 'after_setup_theme', array( $this, 'child_theme_slug_setup' ) );
        add_action( 'loop_start', array( $this, 'jetpack_remove_share' ) );
        add_action( 'pre_get_posts', array( $this, 'custom_post_types_archive' ) );
        add_action( 'pre_get_posts', array( $this, 'exclude_pages_from_search' ) );
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
        $this->add_taxonomy ( 'countries', 'Country', 'country' );

        $this->register_widget_areas();

        add_theme_support( 'infinite-scroll', array(
            'container' => 'content-row',
            'render'    => array( $this, 'infinite_scroll_render' ),
            'wrapper'   => false,
            'footer'    => 'page'
        ) );

        add_filter( 'infinite_scroll_credit', array( $this, 'infinite_scroll_credit' ) );
    }

    function thumbnail_url()
    {
        if ( has_post_thumbnail() ) {
            echo get_the_post_thumbnail_url();
        } else {
            echo get_stylesheet_directory_uri() . '/images/post-default.jpeg';
        }
    }

    function thumbnail_country( $post_id = NULL )
    {
        if ( NULL === $post_id ) {
            $post_id = get_the_ID();
        }

        $taxonomies = get_the_terms( $post_id, 'countries' );
        if ( !$taxonomies->errors && $taxonomies[0] ) {
            $country = $taxonomies[0];
            echo '<a href="/?countries=' . $country->slug . '"><div class="wire-country-tag">' . $country->name . '</div></a>';
        }
    }

    function frontpage_category_posts( $options = array() )
    {
        $defaults = array(
            'limit'          => 1,
            'before'         => '<div>',
            'after'          => '</div>',
            'before_article' => '<div>',
            'after_article'  => '</div>',
            'show_thumbnail' => true,
            'show_excerpt'   => true,
            'show_tags'      => true,
            'image_height'   => 280
        );

        $opts = array_merge( $defaults, $options );

        $posts = get_posts( array(
            'post_type'   => $opts['post_type'],
            'numberposts' => $opts['limit']
        ));

        foreach ($posts as $post)
        {
            $thumbnail_url = get_the_post_thumbnail_url( $post->ID );

            if ( empty( $thumbnail_url ) ) {
                $thumbnail_url = get_stylesheet_directory_uri() . '/images/post-default.jpeg';
            }

            set_query_var( 'thumbnail_url', $thumbnail_url );
            set_query_var( 'image_height', $opts['image_height'] );
            set_query_var( 'show_thumbnail', $opts['show_thumbnail'] );
            set_query_var( 'show_tags', $opts['show_tags'] );
            set_query_var( 'tags', Theme::get_tags( $post->ID ) );
            set_query_var( 'title', $post->post_title );
            set_query_var( 'excerpt', Theme::get_excerpt( $post->ID ) );
            set_query_var( 'show_excerpt', $opts['show_excerpt'] );
            set_query_var( 'guid', $post->guid );
            set_query_var( 'before_article', $opts['before_article'] );
            set_query_var( 'after_article', $opts['after_article'] );
            set_query_var( 'post_id', $post->ID );

            echo $opts['before'];
            get_template_part( 'front-page-category-story' );
            echo $opts['after'];
        }
    }

    function get_excerpt( $post_id = NULL)
    {
        if ( empty( $post_id ) ) {
            $post_id = get_the_ID();
        }

        add_filter( 'excerpt_length', 'Theme::excerpt_length' );

        $output = get_the_excerpt( $post_id );
        $output = apply_filters('wptexturize', $output);
        $output = apply_filters('convert_chars', $output);

        return $output;
    }

    function excerpt_length()
    {
        return 20;
    }

    function get_tags( $post_id = NULL )
    {
        if ( empty( $post_id ) ) {
            $post_id = get_the_ID();
        }

        return wp_get_post_tags( $post_id );
    }

    function get_country( $post_id = NULL )
    {
        if ( empty( $post_id ) ) {
            $post_id = get_the_ID();
        }

        return get_post_meta( $post_id, 'Country', true );
    }

    function excerpt()
    {
        echo Theme::get_excerpt();
    }

    function carousel()
    {
        $posts = get_posts( array(
            'post_type'   => 'farmer-stories',
            'numberposts' => 3,
            'post_type'   => Theme::post_types()
        ));

        $i = 0;

        foreach ($posts as $post)
        {
            $thumbnail_url = get_the_post_thumbnail_url( $post->ID );

            if ( empty( $thumbnail_url ) ) {
                $thumbnail_url = get_stylesheet_directory_uri() . '/images/carousel-default.jpeg';
            }

            set_query_var( 'active_class', 0 === $i++ ? 'active' : '' );
            set_query_var( 'thumbnail_url', $thumbnail_url );
            set_query_var( 'guid', $post->guid );
            set_query_var( 'title', $post->post_title );

            get_template_part( 'carousel-item' );
        }
    }

    function infinite_scroll_render()
    {
        if ( is_search() ) {
            get_template_part( 'searchloop' );
        } else {
            get_template_part( 'loop' );
        }
    }

    function infinite_scroll_credit()
    {
        return '<div>' . __( 'A service of Farm Radio International' ) . '</div>';
    }

    function custom_post_types_archive( $query )
    {
        if ( ( $query->is_tag() || $query->is_author() ) && $query->is_main_query() ) {
            $query->set( 'post_type', array_merge( array( 'post', 'object' ), Theme::post_types() ) );
        }
    }

    function exclude_pages_from_search( $query )
    {
        if ( $query->is_main_query() && $query->is_search() ) {
            $query->set( 'post__not_in', get_all_page_ids() );
        }
    }

    /**
     * Register widget areas used for sidebars and various elements of the
     * page footer.
     */
    function register_widget_areas()
    {
        if ( function_exists( 'register_sidebar' ) )
        {
            register_sidebar(array(
                'name'              => __('Barza Contact Info', 'wire'),
                'before_widget'     => '<div id="%1$s" class="%2$s">',
                'after_widget'      => '</div>',
                'before_title'      => '<h5>',
                'after_title'       => '</h5>'
            ));

            register_sidebar(array(
                'name'              => __('Barza Site Info', 'wire'),
                'before_widget'     => '<div id="%1$s" class="%2$s">',
                'after_widget'      => '</div>',
                'before_title'      => '<h5>',
                'after_title'       => '</h5>'
            ));

            register_sidebar(array(
                'name'              => __('Barza Copyright', 'wire'),
                'before_widget'     => '<span>',
                'after_widget'      => '</span>',
                'before_title'      => '',
                'after_title'       => ''
            ));

            register_sidebar(array(
                'name'              => __('Barza Front Sidebar', 'wire'),
                'before_widget'     => '<span>',
                'after_widget'      => '</span>',
                'before_title'      => '',
                'after_title'       => ''
            ));
        }
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
        register_taxonomy_for_object_type( 'category', $post_type );
        register_taxonomy_for_object_type( 'post_tag', $post_type );
        register_post_type( $post_type,
            array(
                'labels' => array(
                    'name'          => __( $name ),
                    'singular_name' => __( $singular_name )
                ),
                'public'            => true,
                'show_ui'           => true,
                'has_archive'       => true,
                'rewrite'           => array( 'slug' => $post_type ),
                'taxonomies'        => array( 'category', 'post_tag' ),
                'show_in_rest'      => true,
                'show_in_nav_menus' => true,
                'supports'          => array( 'title', 'editor', 'thumbnail', 'author', 'excerpt', 'custom-fields', 'page-attributes' )
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
        register_taxonomy( $taxonomy, Theme::post_types(),
            array(
                'label'             => __( $label ),
                'rewrite'           => array( 'slug' => $slug ),
                'public'            => true,
                'show_admin_column' => true,
                'show_in_rest'      => true,
                'query_var'         => true,
                'hierarchical'      => true
            )
        );
    }

    /**
     * Language menu
     */
    function language_nav()
    {
        if ( function_exists( 'pll_current_language' ) ) {
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

    function jetpack_remove_share()
    {
        remove_filter( 'the_content', 'sharing_display', 19 );
        remove_filter( 'the_excerpt', 'sharing_display', 19 );

        if ( class_exists( 'Jetpack_Likes' ) ) {
            remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
        }
    }

    function child_theme_slug_setup()
    {
        load_child_theme_textdomain( 'html5blank', get_stylesheet_directory() . '/languages' );
        load_theme_textdomain( 'wire', get_stylesheet_directory() . '/languages' );
    }

    function remove_parent_actions()
    {
        remove_action( 'init', 'create_post_type_html5' );
    }

    function remove_parent_filters()
    {
        remove_filter( 'excerpt_more', 'html5_blank_view_article' );
    }

    function post_types()
    {
        return array( 'farmer-stories', 'resources', 'weeks-script', 'opportunities', 'archives', 'spotlights', 'news', 'yenkasa' );
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
