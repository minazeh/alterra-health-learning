<?php

get_header(); 
?>

<div class="container hero-banner mb-5">
    
    <div class="row">
        <div class="col-12 p-4 section-type-1">
            <h1>Library</h1>
            <div class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </div>
            <div class="mb-3"></div>
            <div class="">
                <div class="row align-items-center">
                    <!-- Search Bar -->
                    <form method="GET" action="">
                        <div class="row d-flex justify-content-center align-items-center">
                            <?php if (!empty($_GET['search_query'])) : ?>
                                <div class="col-lg-11">
                            <?php else : ?>
                                <div class="col-lg-12">
                            <?php endif; ?>
                                <div class="form-floating position-relative">
                                    <input type="text" name="search_query" class="form-control form-control-lg" id="floatingSearch" placeholder="Search" value="<?php echo esc_attr(get_query_var('search_query')); ?>">
                                    <label for="floatingSearch">Search</label>
                                    <!-- Make the search icon clickable by placing it inside a button -->
                                    <button type="submit" class="position-absolute top-50 end-0 translate-middle-y me-3 border-0 bg-transparent">
                                        <span class="fa fa-search"></span>
                                    </button>
                                </div>
                            </div>
                            <?php if (!empty($_GET['search_query'])) : ?>
                                <div class="col-lg-1">
                                    <button type="submit" class="btn btn-outline-secondary">Clear Search</button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-12">
            <div class="mb-3"></div>
            
            <div class="container-fluid">
                <?php if ( isset($_GET['search_query']) && !empty($_GET['search_query']) ) : ?>
                    <div class="small mb-3">
                        Showing results for <strong><?php echo esc_html( $_GET['search_query'] ); ?></strong>
                    </div>
                <?php endif; ?>               
                <div class="row">
                <?php
                // Query arguments
                $search_query = isset($_GET['search_query']) ? sanitize_text_field($_GET['search_query']) : '';

                $args = array(
                    'post_type' => 'library',
                    'posts_per_page' => -1,
                    's' => $search_query, // Use the new query parameter
                );

                // The Query
                $library_query = new WP_Query($args);

                // The Loop
                if ($library_query->have_posts()) : while ($library_query->have_posts()) : $library_query->the_post(); ?>

                    <div class="col-lg-3 mb-4">
                        <div class="card">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php echo get_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="<?php the_title(); ?>"></a>
                            <?php else : ?>
                                <img src="https://puente.co/alterra-lms/wp-content/uploads/2024/08/exercise-1.png" class="card-img-top" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                            <div class="card-body p-4">
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
                                <?php
                                $library_files = get_field('library_files');
                                $library_video = get_field('library_video');
                                $library_event = get_field('library_event'); // This is the date

                                $button_text = 'Read more';
                                $button_link = get_permalink();
                                $button_target = '';
                                $button_class = '';

                                if (!empty($library_files)) {
                                    if (is_array($library_files)) {
                                        $button_link = $library_files['url']; // Use the URL from the array
                                    } else {
                                        $button_link = $library_files; // If it's a string, use it directly
                                    }
                                    $button_text = 'View more';
                                    $button_target = '_blank'; // Open in a new tab
                                } elseif (!empty($library_video)) {
                                    if (is_array($library_video)) {
                                        $button_link = $library_video['url']; // Use the URL from the array
                                    } else {
                                        $button_link = $library_video; // If it's a string, use it directly
                                    }
                                    $button_text = 'Watch video';
                                    $button_class = 'open-lightbox'; // Add a class to trigger the lightbox
                                } elseif (!empty($library_event)) {
                                    $button_link = get_permalink();
                                    $button_text = 'Join event';
                                }
                                ?>
                                <a href="<?php echo esc_url($button_link); ?>" target="<?php echo esc_attr($button_target); ?>" class="btn btn-primary <?php echo esc_attr($button_class); ?>">
                                    <?php echo esc_html($button_text); ?>  <i class="fas fa-arrow-right btn-arrow"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                <?php endwhile; wp_reset_postdata(); else : ?>
                    <p><?php _e('No posts found.'); ?></p>
                <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>