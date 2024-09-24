<?php
get_header(); 
?>

<div class="container hero-banner mb-5">
    
    <div class="row">
        <div class="col-12 p-4 section-type-1">
            <h1><?php single_cat_title(); ?></h1>
            <div class="mb-3"></div>
            <div class="">
                <div class="row align-items-center">
                    <!-- Search Bar -->
                    <div class="col-lg-12">
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
                        <br>
                        <div id="tags-filter">
                            <?php
                            $category_id = get_queried_object_id(); // Get the current category ID

                            // Step 1: Query Posts in the Specific Category
                            $args = array(
                                'post_type' => 'library', // Change 'library' to your custom post type if needed
                                'posts_per_page' => -1,
                                'category__in' => $category_id, // Get posts from the specific category
                            );

                            $query = new WP_Query($args);

                            // Step 2: Loop Through Posts and Collect Tags
                            $tag_ids = array();

                            if ($query->have_posts()) {
                                while ($query->have_posts()) {
                                    $query->the_post();
                                    $post_tags = get_the_tags(); // Get tags for the current post

                                    if ($post_tags) {
                                        foreach ($post_tags as $tag) {
                                            $tag_ids[] = $tag->term_id; // Store the tag IDs
                                        }
                                    }
                                }
                                wp_reset_postdata(); // Reset query
                            }

                            // Remove duplicate tag IDs
                            $unique_tag_ids = array_unique($tag_ids);

                            // Step 3: Retrieve Tag Information
                            if (!empty($unique_tag_ids)) {
                                $tags = get_terms(array(
                                    'taxonomy' => 'post_tag', // Get terms from the 'post_tag' taxonomy
                                    'include'  => $unique_tag_ids, // Include only the collected tags
                                ));

                                // Display the tags as Bootstrap buttons (no links)
                                if (!is_wp_error($tags) && !empty($tags)) {
                                    foreach ($tags as $tag) {
                                        echo '<button class="btn btn-primary m-1 btn-sm filter-tag" data-tag="tag-' . esc_attr($tag->slug) . '">' . esc_html($tag->name) . '</button>';
                                    }
                                } else {
                                    echo 'No tags found.';
                                }
                            } else {
                                echo 'No tags found in this category.';
                            }
                            ?>
                            <button class="btn  m-1 btn-sm" id="clear-filter" style="display: none;">Clear Filter</button>
                        </div>
                    </div>
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
                    's' => $search_query, // Search query
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',  // The taxonomy to query (category in this case)
                            'field'    => 'slug',      // Use 'slug' or 'term_id' depending on your need
                            'terms'    => get_queried_object()->slug, // Automatically get the current category slug
                        ),
                    ),
                );

                // The Query
                $library_query = new WP_Query($args);

                // The Loop
                if ($library_query->have_posts()) : while ($library_query->have_posts()) : $library_query->the_post(); 
                    $post_tags = get_the_tags();
                    $tag_classes = '';
        
                    if ($post_tags) {
                        foreach ($post_tags as $tag) {
                            $tag_classes .= ' tag-' . esc_attr($tag->slug);
                        }
                    }
                ?>

                    <div class="col-lg-3 col-md-6 col-12 mb-4 post-item <?php echo esc_attr($tag_classes); ?>">
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


                <?php endwhile; wp_reset_postdata(); else : ?>
                    <p><?php _e('No posts found.'); ?></p>
                <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-tag');
    const clearButton = document.getElementById('clear-filter');
    const posts = document.querySelectorAll('.post-item');

    // Tag filtering
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const tag = this.getAttribute('data-tag');
            
            // Filter posts
            posts.forEach(post => {
                if (post.classList.contains(tag)) {
                    post.style.display = 'block'; // Show the post
                } else {
                    post.style.display = 'none'; // Hide the post
                }
            });

            // Remove 'active' class from all buttons and add to clicked one
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            // Show the "Clear Filter" button when a tag is clicked
            clearButton.style.display = 'inline-block';
        });
    });

    // Clear filter functionality
    clearButton.addEventListener('click', function() {
        // Show all posts
        posts.forEach(post => {
            post.style.display = 'block';
        });

        // Remove active state from all buttons
        filterButtons.forEach(btn => btn.classList.remove('active'));

        // Hide the "Clear Filter" button
        clearButton.style.display = 'none';
    });
});
</script>

<?php get_footer(); ?>