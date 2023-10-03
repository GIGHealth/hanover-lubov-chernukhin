<?php
/**
 * Author: Robert DeVore | @deviorobert
 * URL: html5blank.com | @html5blank
 * Custom functions, support, custom post types and more.
 */

require_once 'modules/is-debug.php';

/*------------------------------------*\
    External Modules/Files
\*------------------------------------*/

// Load any external files you have here
if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
  // File does not exist... return an error.
  return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
  // File exists... require it.
  require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}

/*------------------------------------*\
    Theme Support
\*------------------------------------*/

if ( ! isset( $content_width ) ) {
    $content_width = 900;
}

if ( function_exists( 'add_theme_support' ) ) {

    // Add Thumbnail Theme Support.
    add_theme_support( 'post-thumbnails' );
    // add_image_size( 'post-thumbnail', 300, 300, true ); // Post Thumbnail.
    // add_image_size( 'video-thumbnail', 640, 360, true ); // Post Thumbnail.
    // add_image_size( 'medium-thumb', 571, 285, true ); // Medium Thumbnail.
    // add_image_size( 'small-thumb', 370, 285, true ); // Small Thumbnail.
    // add_image_size( 'hero-banner', 1440, 400, true ); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use.
    /*add_theme_support('custom-background', array(
    'default-color' => 'FFF',
    'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use.
    /*add_theme_support('custom-header', array(
    'default-image'          => get_template_directory_uri() . '/img/headers/default.jpg',
    'header-text'            => false,
    'default-text-color'     => '000',
    'width'                  => 1000,
    'height'                 => 198,
    'random-default'         => false,
    'wp-head-callback'       => $wphead_cb,
    'admin-head-callback'    => $adminhead_cb,
    'admin-preview-callback' => $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Enable HTML5 support.
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

    // Localisation Support.
    load_theme_textdomain( 'html5blank', get_template_directory() . '/languages' );
}

/*------------------------------------*\
    Functions
\*------------------------------------*/

// HTML5 Blank navigation
function main_nav() {
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
        'items_wrap'      => '<ul class="main-menu list-unstyled d-flex flex-row mb-0 align-items-center text-center justify-content-center">%3$s</ul>',
        'depth'           => 0,
        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
        'walker'          => new WP_Bootstrap_Navwalker(),
        )
    );
}

// HTML5 Blank navigation
function footer_nav() {
    wp_nav_menu(
    array(
        'theme_location'  => 'footer-menu',
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
        'items_wrap'      => '<ul class="footer-menu list-unstyled d-flex flex-column flex-md-row align-items-center text-center justify-content-center mb-1">%3$s</ul>',
        'depth'           => 0,
        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
        'walker'          => new WP_Bootstrap_Navwalker(),
        )
    );
}

function top_nav() {
    wp_nav_menu(
    array(
        'theme_location'  => 'top-nav',
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
        'items_wrap'      => '<ul class="top-nav list-unstyled d-flex flex-row-reverse align-items-start text-right justify-content-start">%3$s</ul>',
        'depth'           => 0,
        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
        'walker'          => new WP_Bootstrap_Navwalker(),
        )
    );
}


//custom password protect page
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    // wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}



// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts() {
  if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
    wp_enqueue_script('conditionizr'); // Enqueue it!

    wp_register_script('countUp', get_template_directory_uri() . '/js/lib/jquery.countup.min.js', array( 'jquery' ), false, true );
    wp_enqueue_script('countUp'); // Enqueue it!

    wp_register_script('waypoints', get_template_directory_uri() . '/js/lib/jquery.waypoints.js', array( 'jquery' ), false, true );
    wp_enqueue_script('waypoints'); // Enqueue it!

    wp_register_script('bootstrap-popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js', array('jquery')); // Custom scripts
    wp_enqueue_script('bootstrap-popper'); // Enqueue it!

    wp_register_script('bootstrap-script', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js', array('jquery')); // Custom scripts
    wp_enqueue_script('bootstrap-script'); // Enqueue it!




    /*------------------------------------*\
    Owlcarousel
    \*------------------------------------*/
    // wp_enqueue_script( 'owl', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'owl', get_template_directory_uri() . '/js/lib/owl.carousel.min.js', array( 'jquery' ), false, true );
    // wp_enqueue_style( 'owl-style', get_template_directory_uri() . '/js/lib/owl.carousel.min.css' );
    // wp_enqueue_style( 'owl-theme', get_template_directory_uri() . '/js/lib/owl.theme.default.min.css' );

    wp_register_script('slb', get_template_directory_uri() . '/js/lib/simpleLightbox.min.js', array('jquery'));
    //TODO check before final testing if theres only one modal video on the site (homepage), if so move this enqueue to homepage
    wp_enqueue_script('slb'); // Enqueue it!

    wp_register_script('aosJs', get_template_directory_uri() . '/js/lib/aos.min.js', array('jquery')); 
    wp_enqueue_script('aosJs');

    wp_register_script('customScripts', get_template_directory_uri() . '/js/scripts-min.js', array('jquery')); // Custom scripts
    wp_enqueue_script('customScripts'); // Enqueue it!

    $translation_array = array( 'templateUrl' => get_stylesheet_directory_uri() );

    wp_localize_script( 'customScripts', 'template_dir', $translation_array );


      /*------------------------------------*\
        Simple Lightbox
      \*------------------------------------*/
      // https://dbrekalo.github.io/simpleLightbox/
      // wp_register_script('slb', get_template_directory_uri() . '/js/lib/simpleLightbox.min.js', array('jquery')); // Custom scripts
      // wp_enqueue_script('slb'); // Enqueue it!
      /*------------------------------------*\
        Isotope Filtering
      \*------------------------------------*/
      // https://dbrekalo.github.io/simpleLightbox/
      // wp_register_script('isotope', 'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', array('jquery')); // Custom scripts
      // wp_enqueue_script('isotope'); // Enqueue it!

        /*------------------------------------*\
        GSAP
      \*------------------------------------*/
    
      // wp_register_script('gsap', get_template_directory_uri() . '/js/lib/gsap/gsap.min.js', array('jquery'));
      // // wp_register_script('drawSVG', get_template_directory_uri() . '/js/lib/gsap/DrawSVGPlugin.min.js', array('jquery')); 
      // // wp_enqueue_script('drawSVG'); // Enqueue it!
      // wp_register_script('scrollTrigger', get_template_directory_uri() . '/js/lib/gsap/ScrollTrigger.min.js', array('jquery'));
      // wp_register_script('ScrollTo', get_template_directory_uri() . '/js/lib/gsap/ScrollToPlugin.min.js', array('jquery'));


  }
}

// Load HTML5 Blank conditional scripts
// function html5blank_conditional_scripts() {
//     if ( is_page( 'pagenamehere' ) ) {
//         // Conditional script(s)
//         wp_register_script( 'scriptname', get_template_directory_uri() . '/js/scriptname.js', array( 'jquery' ), '1.0.0' );
//         wp_enqueue_script( 'scriptname' );
//     }
// }

// Load HTML5 Blank conditional scripts
// function html5blank_conditional_scripts() {
//     if ( is_single() ) {
//         // Conditional script(s)
//         wp_register_script( 'addtoany', 'https://static.addtoany.com/menu/page.js', array( 'jquery' ), '1.0.0' );
//         wp_enqueue_script( 'addtoany' );
//     }
// }




// Load HTML5 Blank styles
// function html5blank_styles() {
//     if ( HTML5_DEBUG ) {
//         // normalize-css
//         wp_register_style( 'normalize', get_template_directory_uri() . '/css/lib/normalize.css', array(), '7.0.0' );

//         // Custom CSS
//         wp_register_style( 'html5blank', get_template_directory_uri() . '/style.css', array( 'normalize' ), '1.0' );

//         // Register CSS
//         wp_enqueue_style( 'html5blank' );
//     } else {
//         // Custom CSS
//         wp_register_style( 'html5blankcssmin', get_template_directory_uri() . '/style.css', array(), '1.0' );
//         // Register CSS
//         wp_enqueue_style( 'html5blankcssmin' );
//     }



// Register HTML5 Blank Navigation
function register_html5_menu() {
    register_nav_menus( array( // Using array to specify more menus if needed
        'header-menu'  => esc_html( 'Header Menu', 'html5blank' ), // Main Navigation
        'footer-menu'  => esc_html( 'Footer Menu', 'html5blank' ), // Main Navigation
        'top-nav'  => esc_html( 'Top Menu', 'html5blank' ), // Main Navigation
    ) );
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args( $args = '' ) {
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter( $var ) {
    return is_array( $var ) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list( $thelist ) {
    return str_replace( 'rel="category tag"', 'rel="tag"', $thelist );
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class( $classes ) {
    global $post;
    if ( is_home() ) {
        $key = array_search( 'blog', $classes, true );
        if ( $key > -1 ) {
            unset( $classes[$key] );
        }
    } elseif ( is_page() ) {
        $classes[] = sanitize_html_class( $post->post_name );
    } elseif ( is_singular() ) {
        $classes[] = sanitize_html_class( $post->post_name );
    }

    return $classes;
}

// Remove the width and height attributes from inserted images
function remove_width_attribute( $html ) {
    $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
    return $html;
}


// If Dynamic Sidebar Exists
if ( function_exists( 'register_sidebar' ) ) {
    // Define Sidebar Widget Area 1
    register_sidebar( array(
        'name'          => esc_html( 'Widget Area 1', 'html5blank' ),
        'description'   => esc_html( 'Description for this widget-area...', 'html5blank' ),
        'id'            => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );

    // Define Sidebar Widget Area 2
    register_sidebar( array(
        'name'          => esc_html( 'Widget Area 2', 'html5blank' ),
        'description'   => esc_html( 'Description for this widget-area...', 'html5blank' ),
        'id'            => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style() {
    global $wp_widget_factory;

    if ( isset( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'] ) ) {
        remove_action( 'wp_head', array(
            $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
            'recent_comments_style'
        ) );
    }
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination() {
  global $wp_query;
 
  $big = 999999999; // need an unlikely integer
  $translated = __( 'Page', 'mytextdomain' ); // Supply translatable string
   
  echo paginate_links( array(
      'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
      'format' => '?paged=%#%',
      'prev_text'          => __('Prev'),
      'next_text'          => __('Next'),
      'current' => max( 1, get_query_var('paged') ),
      'total' => $wp_query->max_num_pages,
          'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>'
  ) );
}

add_post_type_support( 'page', 'excerpt' );

// Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
function html5wp_index( $length ) {
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post( $length ) {
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt( $length_callback = '', $more_callback = '' ) {
    global $post;
    if ( function_exists( $length_callback ) ) {
        add_filter( 'excerpt_length', $length_callback );
    }
    if ( function_exists( $more_callback ) ) {
        add_filter( 'excerpt_more', $more_callback );
    }
    $output = get_the_excerpt();
    $output = apply_filters( 'wptexturize', $output );
    $output = apply_filters( 'convert_chars', $output );
    $output = '<p>' . $output . '</p>';
    echo esc_html( $output );
}

// Custom View Article link to Post
function html5_blank_view_article( $more ) {
    global $post;
    return '... <a class="view-article" href="' . get_permalink( $post->ID ) . '">' . esc_html_e( 'View Article', 'html5blank' ) . '</a>';
}

// Remove Admin bar
// function remove_admin_bar() {
//     return true;
// }

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove( $tag ) {
    return preg_replace( '~\s+type=["\'][^"\']++["\']~', '', $tag );
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', '', $html );
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ( $avatar_defaults ) {
    $myavatar                   = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = 'Custom Gravatar';
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments() {
    if ( ! is_admin() ) {
        if ( is_singular() AND comments_open() AND ( get_option( 'thread_comments' ) == 1 ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }
}

// Custom Comments Callback
function html5blankcomments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    extract( $args, EXTR_SKIP );

    if ( 'div' == $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
?>
<!-- heads up: starting < for the html tag (li or div) in the next line: -->
<?php echo esc_html( $tag ) ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?>
id="comment-<?php comment_ID(); ?>">
<?php if ( 'div' != $args['style'] ) : ?>
<div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
  <?php endif; ?>
  <div class="comment-author vcard">
    <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
    <?php printf( esc_html( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ) ?>
  </div>
  <?php if ( $comment->comment_approved == '0' ) : ?>
  <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.' ) ?></em>
  <br />
  <?php endif; ?>

  <div class="comment-meta commentmetadata"><a
      href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
      <?php
            printf( esc_html( '%1$s at %2$s' ), get_comment_date(), get_comment_time() ) ?></a><?php edit_comment_link( esc_html_e( '(Edit)' ), '  ', '' );
        ?>
  </div>

  <?php comment_text() ?>

  <div class="reply">
    <?php comment_reply_link( array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?>
  </div>
  <?php if ( 'div' != $args['style'] ) : ?>
</div>
<?php endif; ?>
<?php }



/*------------------------------------*\
    Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action( 'wp_enqueue_scripts', 'html5blank_header_scripts' ); // Add Custom Scripts to wp_head
// add_action( 'wp_print_scripts', 'html5blank_conditional_scripts' ); // Add Conditional Page Scripts
add_action( 'get_header', 'enable_threaded_comments' ); // Enable Threaded Comments
// add_action( 'wp_enqueue_scripts', 'html5blank_styles' ); // Add Theme Stylesheet
add_action( 'init', 'register_html5_menu' ); // Add HTML5 Blank Menu
// add_action( 'init', 'create_post_type_html5' ); // Add our HTML5 Blank Custom Post Type
add_action( 'widgets_init', 'my_remove_recent_comments_style' ); // Remove inline Recent Comment Styles from wp_head()
add_action( 'init', 'html5wp_pagination' ); // Add our HTML5 Pagination

// Remove Actions
remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action( 'wp_head', 'rel_canonical' );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

// Add Filters
add_filter( 'avatar_defaults', 'html5blankgravatar' ); // Custom Gravatar in Settings > Discussion
add_filter( 'body_class', 'add_slug_to_body_class' ); // Add slug to body class (Starkers build)
add_filter( 'widget_text', 'do_shortcode' ); // Allow shortcodes in Dynamic Sidebar
add_filter( 'widget_text', 'shortcode_unautop' ); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' ); // Remove surrounding <div> from WP Navigation
// add_filter( 'nav_menu_css_class', 'my_css_attributes_filter', 100, 1 ); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter( 'nav_menu_item_id', 'my_css_attributes_filter', 100, 1 ); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter( 'page_css_class', 'my_css_attributes_filter', 100, 1 ); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter( 'the_category', 'remove_category_rel_from_category_list' ); // Remove invalid rel attribute
add_filter( 'the_excerpt', 'shortcode_unautop' ); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter( 'the_excerpt', 'do_shortcode' ); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
// add_filter( 'excerpt_more', 'html5_blank_view_article' ); // Add 'View Article' button instead of [...] for Excerpts
// add_filter( 'show_admin_bar', 'remove_admin_bar' ); // Remove Admin bar
add_filter( 'style_loader_tag', 'html5_style_remove' ); // Remove 'text/css' from enqueued stylesheet
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 ); // Remove width and height dynamic attributes to thumbnails
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 ); // Remove width and height dynamic attributes to post images
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 ); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter( 'the_excerpt', 'wpautop' ); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode( 'html5_shortcode_demo', 'html5_shortcode_demo' ); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode( 'html5_shortcode_demo_2', 'html5_shortcode_demo_2' ); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
    Custom Post Types
\*------------------------------------*/

// Create 1 Custom Post type for a Demo, called HTML5-Blank
// function create_post_type_html5() {
//     register_taxonomy_for_object_type( 'category', 'html5-blank' ); // Register Taxonomies for Category
//     register_taxonomy_for_object_type( 'post_tag', 'html5-blank' );
//     register_post_type( 'html5-blank', // Register Custom Post Type
//         array(
//         'labels'       => array(
//             'name'               => esc_html( 'HTML5 Blank Custom Post', 'html5blank' ), // Rename these to suit
//             'singular_name'      => esc_html( 'HTML5 Blank Custom Post', 'html5blank' ),
//             'add_new'            => esc_html( 'Add New', 'html5blank' ),
//             'add_new_item'       => esc_html( 'Add New HTML5 Blank Custom Post', 'html5blank' ),
//             'edit'               => esc_html( 'Edit', 'html5blank' ),
//             'edit_item'          => esc_html( 'Edit HTML5 Blank Custom Post', 'html5blank' ),
//             'new_item'           => esc_html( 'New HTML5 Blank Custom Post', 'html5blank' ),
//             'view'               => esc_html( 'View HTML5 Blank Custom Post', 'html5blank' ),
//             'view_item'          => esc_html( 'View HTML5 Blank Custom Post', 'html5blank' ),
//             'search_items'       => esc_html( 'Search HTML5 Blank Custom Post', 'html5blank' ),
//             'not_found'          => esc_html( 'No HTML5 Blank Custom Posts found', 'html5blank' ),
//             'not_found_in_trash' => esc_html( 'No HTML5 Blank Custom Posts found in Trash', 'html5blank' ),
//         ),
//         'public'       => true,
//         'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
//         'has_archive'  => true,
//         'supports'     => array(
//             'title',
//             'editor',
//             'excerpt',
//             'thumbnail'
//         ), // Go to Dashboard Custom HTML5 Blank post for supports
//         'can_export'   => true, // Allows export in Tools > Export
//         'taxonomies'   => array(
//             'post_tag',
//             'category'
//         ) // Add Category and Post Tags support
//     ) );
// }

/*------------------------------------*\
    ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
// function html5_shortcode_demo( $atts, $content = null ) {
//     return '<div class="shortcode-demo">' . do_shortcode( $content ) . '</div>'; // do_shortcode allows for nested Shortcodes
// }

// // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
// function html5_shortcode_demo_2( $atts, $content = null ) {
//     return '<h2>' . $content . '</h2>';
// }

//** */
//** => ACF OPTIONS */
//** */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	acf_add_options_page(array(
		'page_title' 	=> 'Pipeline Data',
		'menu_title'	=> 'Pipeline Data',
		'menu_slug' 	=> 'pipeline-data',
    'position'    => 7,
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
    'icon_url' => 'dashicons-images-alt2', // Add this line and replace the second inverted commas with class of the icon you like
	));
	
}


// function wpb_get_parent_terms($taxonomy = 'category'){
//     $currentPost = get_post();
//     $terms       = get_the_terms($currentPost->ID, $taxonomy);

//     if (is_wp_error($terms)) {
//         /** @var \WP_Error $terms */
//         throw new \Exception($terms->get_error_message());
//     }

//     $map = array_map(
//         function ($term) use ($taxonomy) {
//             return '<a href="' . esc_url(get_term_link($term->term_id,
//                     $taxonomy)) . '" title="' . esc_attr($term->name) . '">
//                 ' . $term->name . '
//                 </a>';
//         },
//         array_filter($terms, function ($term) {
//             return $term->parent == 0;
//         })
//     );

//     return implode(', ', $map);
// }


//** */
//** => POST TAGS AS COMMA'D LIST */
//** */
function handleTags($id){
  $tags = get_the_tags($id);
    if ( $tags ) {
      // echo count($tags);
      if(count($tags) > 1){
        foreach( $tags as $tag ) {
          echo $tag->name . '<span>, </span>'; 
        }
      } else {
        echo $tags[0]->name;
      }
      
  } 
}
function tagsAsClass($id){
  $tags = get_the_tags($id);
    if ( $tags ) {
      // echo count($tags);
      if(count($tags) > 1){
        foreach( $tags as $tag ) {
          echo $tag->slug . ' '; 
        }
      } else {
        echo $tags[0]->slug;
      }
      
  } 
}

//** */
//** => REDIRECT TEMPLATE */
//** */
// function my_page_template_redirect()
// {
//     if ( is_category()) {
//         $url = site_url( '/the-e3-competencies' );
//         wp_safe_redirect( $url, 301 );
//         exit();
//     }
// }
// add_action( 'template_redirect', 'my_page_template_redirect' );

//** */
//** => GENERATE IDS FOR ACCORDIONS */
//** */
// $VALID_ID_CHARS = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
// function makeId($desiredLen)
// {
//     global $VALID_ID_CHARS;
//     if ($desiredLen < 1) {
//         throw new \RangeException("Length must be a positive integer");
//     }
//     $vLen = 0;
//     if (function_exists('mb_strlen')) {
//         $vLen = mb_strlen($VALID_ID_CHARS, '8bit') - 1;
//     } else {
//         $vLen = strlen($VALID_ID_CHARS) - 1;
//     }
//     if (function_exists('random_int')) {
//         $pieces = [];
//         for ($i = 0; $i < $desiredLen; ++$i) {
//             $pieces[] = $VALID_ID_CHARS[random_int(0, $vLen)];
//         }
//         return implode('', $pieces);
//     }
//     if (function_exists('openssl_random_pseudo_bytes')) {
//         $random = openssl_random_pseudo_bytes($desiredLen);
//         $id = '';
//         for ($i = 0; $i < $desiredLen; ++$i) {
//             $id .= $VALID_ID_CHARS[ord($random[$i]) % $vLen];
//         }
//         return $id;
//     }
//     http_response_code(500);
//     die('random id generation failed. either random_int or openssl_random_pseudo_bytes is needed');
// }


/**
 * Helper function which will generate a valid CSS class 
 * from a breadcrumb link text name.
 *
 * @param string $string 
 * 
 * @return void 
 */
// function cleanString($string){
//   $string = remove_accents($string); // WordPress internal function
//   $string = strtolower($string); // convert to lower case
//   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
//   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

//   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
// }

/**
 * Modifies SEO Yeast breadcrumbs links through wpseo_breadcrumb_single_link filter
 *
 * @see https://stackoverflow.com/questions/42178688/how-to-add-a-class-to-the-a-tag-in-yoast-seo-breadcrumbs
 *
 */
// add_filter('wpseo_breadcrumb_single_link', 'ss_breadcrumb_single_link', 10, 2);
// function ss_breadcrumb_single_link($link_output, $link){
//   $classText = cleanString($link['text']);
//   return str_replace('<a', '<a class="breadcrumbs-' . $classText . '"', $link_output);
// }


//** THE MOBILE MENU */
// include_once( get_stylesheet_directory() .'/modules/slide-menu.php');

//Template in footer for admins
// function show_template() {
//     if( is_super_admin() ){
//         global $template;
//         print_r($template);
//     } 
// }
// add_action('wp_footer', 'show_template');

//search searches ACF also
function filter_search($query) {
  if ($query->is_search && !is_admin() ) {
    $query->set('post_type',array('post','page', 'investors-content'));
  }

  return $query;
}
add_filter('pre_get_posts','filter_search');

//CUSTOM LOGIN
include_once( get_stylesheet_directory() .'/modules/admin/custom_login.php');

//LOGOS
include_once( get_stylesheet_directory() .'/modules/icons/logos.php');
include_once( get_stylesheet_directory() .'/modules/icons/icons.php');

//INVESTORS CONTENT
// include_once( get_stylesheet_directory() .'/modules/CPTs/investors_content.php');


//https://docs.gravityforms.com/gform_submit_button/
/**
* Filters the next, previous and submit buttons.
* Replaces the form's <input> buttons with <button> while maintaining attributes from original <input>.
*
* @param string $button Contains the <input> tag to be filtered.
* @param object $form Contains all the properties of the current form.
*
* @return string The filtered button.
*/
add_filter( 'gform_next_button', 'input_to_button', 10, 2 );
add_filter( 'gform_previous_button', 'input_to_button', 10, 2 );
add_filter( 'gform_submit_button', 'input_to_button', 10, 2 );
function input_to_button( $button, $form ) {
     
    $dom = new DOMDocument();
    $dom->loadHTML( '<?xml encoding="utf-8" ?>' . $button );
$input = $dom->getElementsByTagName( 'input' )->item(0);
$new_button = $dom->createElement( 'button' );
$new_button->appendChild( $dom->createTextNode( $input->getAttribute( 'value' ) ) );
$input->removeAttribute( 'value' );
foreach( $input->attributes as $attribute ) {
$new_button->setAttribute( $attribute->name, $attribute->value );
}
$input->parentNode->replaceChild( $new_button, $input );

return $dom->saveHtml( $new_button );
}




function buttonLink($link_url, $link_target, $link_text){
echo '<a href="' . $link_url . '" target="' . $link_target . '" class="button link"><span class="link-text">' .
    $link_text . '</span><span class="arrow-right"><svg width="15" height="13" viewBox="0 0 15 13" fill="none"
      xmlns="http://www.w3.org/2000/svg">
      <path
        d="M8.62061 0.955078L13.7769 5.87695C13.9233 6.02344 14.0112 6.19922 14.0112 6.4043C14.0112 6.58008 13.9233 6.75586 13.7769 6.90234L8.62061 11.8242C8.35693 12.0879 7.88818 12.0879 7.62451 11.7949C7.36084 11.5312 7.36084 11.0625 7.65381 10.7988L11.5503 7.10742H1.58936C1.1792 7.10742 0.88623 6.78516 0.88623 6.4043C0.88623 5.99414 1.1792 5.70117 1.58936 5.70117H11.5503L7.65381 1.98047C7.36084 1.7168 7.36084 1.24805 7.62451 0.984375C7.88818 0.691406 8.32764 0.691406 8.62061 0.955078Z"
        fill="#BA4522" />
    </svg>
  </span></a>';
}

function arrowRight(){
echo '<span class="arrow-right"><svg width="15" height="13" viewBox="0 0 15 13" fill="none"
    xmlns="http://www.w3.org/2000/svg">
    <path
      d="M8.62061 0.955078L13.7769 5.87695C13.9233 6.02344 14.0112 6.19922 14.0112 6.4043C14.0112 6.58008 13.9233 6.75586 13.7769 6.90234L8.62061 11.8242C8.35693 12.0879 7.88818 12.0879 7.62451 11.7949C7.36084 11.5312 7.36084 11.0625 7.65381 10.7988L11.5503 7.10742H1.58936C1.1792 7.10742 0.88623 6.78516 0.88623 6.4043C0.88623 5.99414 1.1792 5.70117 1.58936 5.70117H11.5503L7.65381 1.98047C7.36084 1.7168 7.36084 1.24805 7.62451 0.984375C7.88818 0.691406 8.32764 0.691406 8.62061 0.955078Z"
      fill="#BA4522" />
  </svg>
</span>';
}

flush_rewrite_rules( false );