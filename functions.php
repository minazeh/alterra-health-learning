<?php

add_filter( 'learn-press/override-templates', function(){ return true; } );

// Enqueue styles and scripts
function alterra_learning_enqueue_assets() {

    // Enqueue Bootstrap JS and dependencies
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);

    // Enqueue Font Awesome CSS
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/node_modules/@fortawesome/fontawesome-free/css/all.min.css');

    // Enqueue compiled CSS
    wp_enqueue_style('alterra-learning-style', get_template_directory_uri() . '/css/style.css', array(), '1.0', 'all');

    // Fancybox
    wp_enqueue_script('fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js', array('jquery'), null, true);
    wp_enqueue_style('fancybox-css', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css');

    // Enqueue custom JS
     wp_enqueue_script('alterra-learning-calendar', 'https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js', array('jquery'), '1.0', true);
    // Enqueue custom JS
    wp_enqueue_script('alterra-learning-script', get_template_directory_uri() . '/js/main.js', array('jquery', 'bootstrap-js'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'alterra_learning_enqueue_assets');

// Theme setup
function alterra_learning_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('customize-selective-refresh-widgets');
}
add_action('after_setup_theme', 'alterra_learning_setup');

// Register menus
function alterra_learning_menus() {
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'alterra-learning'),
        'footer-menu' => __('Footer Menu', 'alterra-learning'),
    ));
}
add_action('init', 'alterra_learning_menus');

function alterra_learning_widgets_init() {
    register_sidebar(array(
        'name'          => __('My Custom Section Widget Area', 'alterra_learning'),
        'id'            => 'custom-section-widget-area',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'alterra_learning_widgets_init');


// Optional: Disable the admin bar for non-admin users
if (!current_user_can('administrator')) {
    add_filter('show_admin_bar', '__return_false');
}

// Include the WP Bootstrap Navwalker class
require_once get_template_directory() . '/includes/class-wp-bootstrap-navwalker.php';

function alterra_learning_register_menus() {
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'alterra-learning'),
    ));
}
add_action('init', 'alterra_learning_register_menus');

function add_custom_menu_item_class($classes, $item, $args) {
    if ($args->theme_location == 'primary-menu') {
        $classes[] = 'me-3';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_custom_menu_item_class', 10, 3);

function alterra_learning_customize_register($wp_customize) {
    // Add a section for color schemes
    $wp_customize->add_section('alterra_learning_color_scheme', array(
        'title'       => __('Color Scheme', 'alterra_learning'),
        'priority'    => 30,
    ));

    // Add settings and controls for primary color
    $wp_customize->add_setting('alterra_learning_primary_color', array(
        'default'     => '#007bff',
        'transport'   => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'alterra_learning_primary_color', array(
        'label'       => __('Primary Color', 'alterra_learning'),
        'section'     => 'alterra_learning_color_scheme',
        'settings'    => 'alterra_learning_primary_color',
    )));

    // Add settings and controls for secondary color
    $wp_customize->add_setting('alterra_learning_secondary_color', array(
        'default'     => '#6c757d',
        'transport'   => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'alterra_learning_secondary_color', array(
        'label'       => __('Secondary Color', 'alterra_learning'),
        'section'     => 'alterra_learning_color_scheme',
        'settings'    => 'alterra_learning_secondary_color',
    )));

    // Add settings and controls for accent color
    $wp_customize->add_setting('alterra_learning_accent_color', array(
        'default'     => '#ffc107',
        'transport'   => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'alterra_learning_accent_color', array(
        'label'       => __('Link Hover Color', 'alterra_learning'),
        'section'     => 'alterra_learning_color_scheme',
        'settings'    => 'alterra_learning_accent_color',
    )));

    // Add settings and controls for background color
    $wp_customize->add_setting('alterra_learning_background_color', array(
        'default'     => '#f8f9fa',
        'transport'   => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'alterra_learning_background_color', array(
        'label'       => __('Tertiary Color', 'alterra_learning'),
        'section'     => 'alterra_learning_color_scheme',
        'settings'    => 'alterra_learning_background_color',
    )));

    // Add settings and controls for link color
    $wp_customize->add_setting('alterra_learning_link_color', array(
        'default'     => '#007bff',
        'transport'   => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'alterra_learning_link_color', array(
        'label'       => __('Link Color', 'alterra_learning'),
        'section'     => 'alterra_learning_color_scheme',
        'settings'    => 'alterra_learning_link_color',
    )));

    // Add settings and controls for text color
    $wp_customize->add_setting('alterra_learning_text_color', array(
        'default'     => '#212529',
        'transport'   => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'alterra_learning_text_color', array(
        'label'       => __('Text Color', 'alterra_learning'),
        'section'     => 'alterra_learning_color_scheme',
        'settings'    => 'alterra_learning_text_color',
    )));
}

add_action('customize_register', 'alterra_learning_customize_register');


function alterra_learning_adjust_brightness($hex, $steps) {
    // Steps should be between -255 and 255. Negative = darker, positive = lighter
    $steps = max(-255, min(255, $steps));

    // Format the hex color
    $hex = str_replace('#', '', $hex);

    if (strlen($hex) === 3) {
        $hex = str_repeat(substr($hex, 0, 1), 2) . str_repeat(substr($hex, 1, 1), 2) . str_repeat(substr($hex, 2, 1), 2);
    }

    // Convert to RGB
    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));

    // Adjust brightness
    $r = max(0, min(255, $r + $steps));
    $g = max(0, min(255, $g + $steps));
    $b = max(0, min(255, $b + $steps));

    return '#' . str_pad(dechex($r), 2, '0', STR_PAD_LEFT) . str_pad(dechex($g), 2, '0', STR_PAD_LEFT) . str_pad(dechex($b), 2, '0', STR_PAD_LEFT);
}

function alterra_learning_customizer_css() {
    // Get colors from theme
    $primary_color = get_theme_mod('alterra_learning_primary_color', '#007bff');
    $secondary_color = get_theme_mod('alterra_learning_secondary_color', '#6c757d');
    $accent_color = get_theme_mod('alterra_learning_accent_color', '#ffc107');
    $background_color = get_theme_mod('alterra_learning_background_color', '#f8f9fa');
    $link_color = get_theme_mod('alterra_learning_link_color', '#007bff');
    $text_color = get_theme_mod('alterra_learning_text_color', '#212529');

    // Adjust colors for different states
    $primary_sub_color = alterra_learning_adjust_brightness($primary_color, 50);
    $primary_lighter_color = alterra_learning_adjust_brightness($primary_color, 220);
    $secondary_sub_color = alterra_learning_adjust_brightness($secondary_color, 50);
    $secondary_lighter_color = alterra_learning_adjust_brightness($secondary_color, 230);
    $accent_sub_color = alterra_learning_adjust_brightness($accent_color, 50);
    $accent_lighter_color = alterra_learning_adjust_brightness($accent_color, 220);

    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_html($primary_color); ?>;
            --primary-sub-color: <?php echo esc_html($primary_sub_color); ?>;
            --primary-light-color: <?php echo esc_html($primary_lighter_color); ?>;
            --secondary-color: <?php echo esc_html($secondary_color); ?>;
            --secondary-sub-color: <?php echo esc_html($secondary_sub_color); ?>;
            --secondary-light-color: <?php echo esc_html($secondary_lighter_color); ?>;
            --accent-color: <?php echo esc_html($accent_color); ?>;
            --accent-sub-color: <?php echo esc_html($accent_sub_color); ?>;
            --accent-light-color: <?php echo esc_html($accent_lighter_color); ?>;
            --background-color: <?php echo esc_html($background_color); ?>;
            --link-color: <?php echo esc_html($link_color); ?>;
            --text-color: <?php echo esc_html($text_color); ?>;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
        }

        .btn-secondary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-secondary:hover {
            background-color: var(--secondary-sub-color);
            border-color: var(--secondary-sub-color);
        }

        .btn-accent {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
        }

        .btn-accent:hover {
            background-color: var(--accent-sub-color);
            border-color: var(--accent-sub-color);
        }

        /* Additional styles can be added here */
    </style>
    <?php
}

add_action('wp_head', 'alterra_learning_customizer_css');

function alterra_customize_register( $wp_customize ) {
    // Social Media Section
    $wp_customize->add_section('alterra_social_media_section', array(
        'title'    => __('Social Media Links', 'alterra'),
        'priority' => 30,
    ));

    // Facebook
    $wp_customize->add_setting('alterra_facebook_link', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('alterra_facebook_link', array(
        'label'    => __('Facebook URL', 'alterra'),
        'section'  => 'alterra_social_media_section',
        'settings' => 'alterra_facebook_link',
        'type'     => 'url',
    ));

    // Instagram
    $wp_customize->add_setting('alterra_instagram_link', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('alterra_instagram_link', array(
        'label'    => __('Instagram URL', 'alterra'),
        'section'  => 'alterra_social_media_section',
        'settings' => 'alterra_instagram_link',
        'type'     => 'url',
    ));

    // YouTube
    $wp_customize->add_setting('alterra_youtube_link', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('alterra_youtube_link', array(
        'label'    => __('YouTube URL', 'alterra'),
        'section'  => 'alterra_social_media_section',
        'settings' => 'alterra_youtube_link',
        'type'     => 'url',
    ));

    // Email
    $wp_customize->add_setting('alterra_email_link', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('alterra_email_link', array(
        'label'    => __('Email Address', 'alterra'),
        'section'  => 'alterra_social_media_section',
        'settings' => 'alterra_email_link',
        'type'     => 'email',
    ));

    // Support Group
    $wp_customize->add_setting('alterra_support_link', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('alterra_support_link', array(
        'label'    => __('Support Group', 'alterra'),
        'section'  => 'alterra_social_media_section',
        'settings' => 'alterra_support_link',
        'type'     => 'url',
    ));
}
add_action('customize_register', 'alterra_customize_register');



function wpac_check_enrolled_user($user_id) {
    if (is_numeric($user_id)) {
        // Global WordPress DB object
        global $wpdb;

        // User ID to check, use get_current_user_id() if you want to fetch current logged-in user's ID
        $user_id = intval($user_id);

        // Table name of LearnPress user items
        $table_name = $wpdb->prefix . 'learnpress_user_items';

        // Database Query to count the results
        $check_enrollment = $wpdb->get_var( $wpdb->prepare(
            "SELECT COUNT(*) FROM `$table_name` WHERE user_id = %d",
            $user_id
        ) );

        print_r($check_enrollment);

        if ($check_enrollment > 0) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function register_library_post_type() {
    $labels = array(
        'name'                  => _x('Libraries', 'Post type general name', 'textdomain'),
        'singular_name'         => _x('Library', 'Post type singular name', 'textdomain'),
        'menu_name'             => _x('Library', 'Admin Menu text', 'textdomain'),
        'name_admin_bar'        => _x('Library', 'Add New on Toolbar', 'textdomain'),
        'add_new'               => __('Add New', 'textdomain'),
        'add_new_item'          => __('Add New Library Item', 'textdomain'),
        'new_item'              => __('New Library Item', 'textdomain'),
        'edit_item'             => __('Edit Library Item', 'textdomain'),
        'view_item'             => __('View Library Item', 'textdomain'),
        'all_items'             => __('All Library Items', 'textdomain'),
        'search_items'          => __('Search Library Items', 'textdomain'),
        'parent_item_colon'     => __('Parent Library Items:', 'textdomain'),
        'not_found'             => __('No library items found.', 'textdomain'),
        'not_found_in_trash'    => __('No library items found in Trash.', 'textdomain'),
        'featured_image'        => _x('Library Item Cover Image', 'Overrides the “Featured Image” phrase for this post type.', 'textdomain'),
        'set_featured_image'    => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type.', 'textdomain'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type.', 'textdomain'),
        'use_featured_image'    => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type.', 'textdomain'),
        'archives'              => _x('Library archives', 'The post type archive label used in nav menus. Default “Post Archives”.', 'textdomain'),
        'insert_into_item'      => _x('Insert into library item', 'Overrides the “Insert into post”/“Insert into page” phrase (used when inserting media into a post).', 'textdomain'),
        'uploaded_to_this_item' => _x('Uploaded to this library item', 'Overrides the “Uploaded to this post”/“Uploaded to this page” phrase (used when viewing media attached to a post).', 'textdomain'),
        'filter_items_list'     => _x('Filter library items list', 'Screen reader text for the filter links heading on the post type listing screen.', 'textdomain'),
        'items_list_navigation' => _x('Library items list navigation', 'Screen reader text for the pagination heading on the post type listing screen.', 'textdomain'),
        'items_list'            => _x('Library items list', 'Screen reader text for the items list heading on the post type listing screen.', 'textdomain'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'library'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'revisions'),
        'taxonomies'         => array('category', 'post_tag'), // Add categories and tags support
        'menu_icon'          => 'dashicons-book', // Choose an icon for the post type
    );

    register_post_type('library', $args);
}

add_action('init', 'register_library_post_type');

function add_learnpress_profile_to_menu( $items, $args ) {
    // Check if the primary menu is being processed and if the user is logged in
    if ( $args->theme_location == 'primary-menu' && is_user_logged_in() ) {
        $profile_url = get_permalink( learn_press_get_page_id( 'profile' ) ); // Get LearnPress profile page URL
        $profile_link = '<li class="menu-item"><a class="nav-link" href="' . esc_url( $profile_url ) . '">Profile</a></li>';
        $items .= $profile_link; // Append the profile link to the menu items
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'add_learnpress_profile_to_menu', 10, 2 );

function redirect_after_login( $user_login, $user ) {
    // Redirect to the home page
    wp_redirect( home_url() );
    exit;
}
add_action( 'wp_login', 'redirect_after_login', 10, 2 );



function load_more_posts() {
    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $search_query = isset($_POST['search_query']) ? sanitize_text_field($_POST['search_query']) : '';

    $args = array(
        'post_type' => 'library',
        'posts_per_page' => 20,
        'paged' => $paged,
        's' => $search_query,
        'post_status' => 'publish', // Only show published posts
    );
    

    $library_query = new WP_Query($args);

    if ($library_query->have_posts()) {
        while ($library_query->have_posts()) : $library_query->the_post(); 
            // Your HTML template for posts (same as your loop)
            ?>
            <div class="col-3 mb-4">
                <div class="card">
                    <?php
                    // Retrieve ACF fields
                    $library_files = get_field('library_files');
                    $library_video = get_field('library_video');
                    $library_event = get_field('library_event');
                    $view_option = get_field('view_option'); // true (1) for single page, false (0) for lightbox
                    $library_external_link = get_field('library_external_link');
                    $library_external_link_action = get_field('library_external_link_action');

                    // Default values
                    $button_text = 'Read more';
                    $button_link = get_permalink(); // Default to single page
                    $button_target = '';
                    $button_class = '';
                    $button_data_fancybox = '';

                    // If external link exists, override the link behavior
                    if (!empty($library_external_link)) {
                        $button_text = 'See more';
                        $button_link = $library_external_link;

                        if ($library_external_link_action === 'New tab') {
                            $button_target = '_blank'; // Open in new tab
                        } elseif ($library_external_link_action === 'Lightbox') {
                            $button_class = 'open-lightbox'; // Add lightbox class
                            $button_data_fancybox = 'data-fancybox'; // Fancybox attribute
                        }
                    }
                    // Determine button text and behavior for other content
                    elseif (!empty($library_files)) {
                        $file_link = is_array($library_files) ? $library_files['url'] : $library_files;

                        if (strpos($file_link, '.pdf') !== false) {
                            $button_text = 'View PDF';
                            if ($view_option) {
                                $button_link = get_permalink(); // Link to the single page
                            } else {
                                $button_link = $file_link; // Link to the PDF file
                                $button_class = 'open-lightbox'; // Add a class to trigger the lightbox
                                $button_data_fancybox = 'data-fancybox'; // FancyBox for iframe (PDF)
                            }
                        } else {
                            $button_text = 'View more';
                            if ($view_option) {
                                $button_link = get_permalink(); // Link to the single page
                            } else {
                                $button_link = $file_link; // Link to the file
                            }
                        }
                    } elseif (!empty($library_video)) {
                        $video_link = is_array($library_video) ? $library_video['url'] : $library_video;
                        $button_text = 'Watch video';
                        if ($view_option) {
                            $button_link = get_permalink(); // Link to the single page
                        } else {
                            $button_link = $video_link; // Link to the video file
                            $button_class = 'open-lightbox'; // Add a class to trigger the lightbox
                            $button_data_fancybox = 'data-fancybox="video"'; // FancyBox attribute for the video
                        }
                    } elseif (!empty($library_event)) {
                        $button_link = get_permalink();
                        $button_text = 'Join event';
                    }
                    ?>

                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php echo esc_url($button_link); ?>" target="<?php echo esc_attr($button_target); ?>" class="<?php echo esc_attr($button_class); ?>" <?php echo $button_data_fancybox; ?>>
                            <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                        </a>
                    <?php else : ?>
                        <img src="https://puente.co/alterra-lms/wp-content/uploads/2024/08/exercise-1.png" class="card-img-top" alt="<?php the_title(); ?>">
                    <?php endif; ?>

                    <div class="card-body p-4 library-card d-flex flex-column">
                        <h5 class="card-title"><?php the_title(); ?></h5>
                        <p class="card-text lh-sm">
                            <?php
                            $content = wp_strip_all_tags(get_the_content());
                            if (strlen($content) > 100) {
                                $content = substr($content, 0, 100);
                                $content = substr($content, 0, strrpos($content, ' ')); // Ensure not cutting mid-word
                                $content .= '...';
                            }
                            echo $content;
                            ?>
                        </p>
                        <div class="mt-auto">
                            <a href="<?php echo esc_url($button_link); ?>" target="<?php echo esc_attr($button_target); ?>" class="btn btn-primary <?php echo esc_attr($button_class); ?>" <?php echo $button_data_fancybox; ?>>
                                <?php echo esc_html($button_text); ?> <i class="fas fa-arrow-right btn-arrow"></i>
                            </a>
                        </div>    
                    </div>
                </div>
            </div>
            <?php
        endwhile;
    }

    wp_die(); // Prevent WordPress from returning 0
}
add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');


function enqueue_lazy_load_script() {
    wp_enqueue_script('lazy-load-posts', get_template_directory_uri() . '/js/lazy-load-posts.js', array('jquery'), null, true);

    // Pass AJAX URL to the script
    wp_localize_script('lazy-load-posts', 'ajax_vars', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_lazy_load_script');

function create_demo_role() {
    // Get the capabilities of the 'subscriber' role
    $subscriber_role = get_role('subscriber');
    
    // Add a new role 'demo' with the same capabilities as 'subscriber'
    add_role('demo', 'Demo', $subscriber_role->capabilities);
}
add_action('init', 'create_demo_role');


function execute_for_demo_role() {
    if (is_user_logged_in() && current_user_can('demo')) {
        echo '
        <style>
            #section-12, #section-13, #section-14, #section-15, 
            #section-16, #section-17, #section-18, #section-19, 
            #section-20, #section-21 {
                display: none;
            }
        </style>
        ';
    }
}
add_action('wp_head', 'execute_for_demo_role');

add_action( 'learn_press_before_user_register', 'validate_terms_conditions' );

function validate_terms_conditions() {
    if ( ! isset( $_POST['terms_conditions'] ) || $_POST['terms_conditions'] != '1' ) {
        learn_press_add_message( __( 'You must agree to the Terms and Conditions to register.', 'learnpress' ), 'error' );
        return false;
    }
}

// Function to get permalink by slug
function get_permalink_by_slug($slug) {
    // Get the post by slug
    $post = get_page_by_path($slug);
    
    // If post exists, return the permalink
    if ($post) {
        return get_permalink($post->ID);
    }
    
    return false; // Return false if no post found
}

?>
