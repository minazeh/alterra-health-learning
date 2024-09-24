<?php
/*
Template Name: Home Page
*/
get_header(); 
?>

<section class="hero-banner d-flex section">
    <div class="container py-4 px-5 section-type-1">
        <div class="row d-flex align-items-center">
            <div class="col-lg-7">
                <h1 class="display-5"><?php the_field('hero_header_text'); ?></h1>
                <p class="lead lh-sm"><?php the_field('hero_sub_text'); ?></p>
                <div class="mt-4">
                    <a href="<?php the_field('hero_primary_button_url'); ?>" class="btn btn-primary btn-lg me-1"><?php the_field('hero_primary_button_text'); ?></a>
                </div>
            </div>
            <div class="col-lg-5">
                <img src="<?php the_field('hero_banner_image'); ?>" class="hero-image" alt="">
            </div>
        </div>
    </div>
</section>

<section class="d-flex my-5">
    <div class="container my-5">
        <div class="row text-center">
            <div class="col-md-3 offset-md-2">
                <div class="stat-item">
                    <i class="fas <?php the_field('icon_code_one'); ?> fa-2x mb-3"></i>
                    <h3 class="fs-3"><?php the_field('icon_heading_one'); ?></h3>
                    <p class="fs-6"><?php the_field('icon_sub_text_one'); ?></p>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="stat-item">
                    <i class="fas <?php the_field('icon_code_two'); ?> fa-2x mb-3"></i>
                    <h3 class="fs-3"><?php the_field('icon_heading_two'); ?></h3>
                    <p class="fs-6"><?php the_field('icon_sub_text_two'); ?></p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-item">
                    <i class="fas <?php the_field('icon_code_three'); ?> fa-2x mb-3"></i>
                    <h3 class="fs-3"><?php the_field('icon_heading_three'); ?></h3>
                    <p class="fs-6"><?php the_field('icon_sub_text_three'); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="d-flex section-colored align-items-center">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-7">
                <h2 class="fs-3"><?php the_field('home_section_heading_1'); ?></h2>
                <p class="lead lh-sm"><?php the_field('home_section_text_1'); ?></p>
                <div class="my-4">
                    <a href="<?php the_field('home_section_link_1'); ?>" class="btn btn-primary me-1"><?php the_field('home_section_button_text_1'); ?></a>
                </div>
                <div class="row pt-5">
                    <div class="col-md-6">
                        <i class="fas <?php the_field('icon_code_two'); ?> fa-2x mb-3"></i>
                        <h3 class="fs-3">Lorem Ipsum</h3>
                        <p class="fs-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        <div class="my-4">
                            <a href="<?php the_field('home_section_link_1'); ?>" class="btn btn-primary me-1">Learn more</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <i class="fas <?php the_field('icon_code_two'); ?> fa-2x mb-3"></i>
                        <h3 class="fs-3">Lorem Ipsum </h3>
                        <p class="fs-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        <div class="my-4">
                            <a href="<?php the_field('home_section_link_1'); ?>" class="btn btn-primary me-1">Learn more</a>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="offset-lg-1 col-lg-4">
                <div>
                    <?php
                    // Get the video URL from ACF
                    $video_url = get_field('home_section_video_1'); // Replace 'video_url' with your actual field name
                    // Get the image URL from ACF
                    $image_url = get_field('home_section_image_1'); // Replace 'image_url' with your actual field name

                    if ($video_url) : ?>
                        <!-- If video URL is present, display the video -->
                        <div class="ratio ratio-16x9">
                            <iframe src="<?php echo esc_url($video_url); ?>" title="YouTube video" allowfullscreen></iframe>
                        </div>
                        
                    <?php else : ?>
                        <!-- If video URL is not present, display the image -->
                         <div class="highlight-image">
                            <img src="<?php echo esc_url($image_url); ?>" alt="Image" class="image-fluid object-fit-cover border rounded">
                         </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="d-flex align-items-center min-vh-100 py-5">
    <div class="container p-4">
        <div class="row d-flex align-items-center">
            <div class="col-lg-8 mb-5">
                <h2 class="fs-3"><?php the_field('guided_education'); ?></h2>
                <div class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque volutpat, lectus at consequat gravida, odio erat fermentum urna, eget dictum velit risus id metus.</div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <?php
                        $current_user_id = get_current_user_id(); // Get the current user ID
                        $user_data = learn_press_get_user($current_user_id);

                        // Access the global database object
                        global $wpdb;

                        // Query to retrieve all published courses
                        $all_courses_query = "
                            SELECT ID 
                            FROM {$wpdb->posts} 
                            WHERE post_type = 'lp_course' AND post_status = 'publish'
                        ";

                        $all_course_ids = $wpdb->get_col($all_courses_query);

                        if ($user_data && $all_course_ids) {
                            // Query to retrieve course IDs where the user is enrolled
                            $enrolled_course_id_query = $wpdb->prepare("
                                SELECT item_id 
                                FROM {$wpdb->prefix}learnpress_user_items 
                                WHERE user_id = %d AND item_type = %s AND status = %s",
                                $current_user_id, 'lp_course', 'enrolled'
                            );

                            $enrolled_course_ids = $wpdb->get_col($enrolled_course_id_query);

                            foreach ($all_course_ids as $course_id) {
                                $course_post = get_post($course_id);
                                $course_name = $course_post->post_title;

                                $is_enrolled = in_array($course_id, $enrolled_course_ids);

                                if ($is_enrolled) {
                                    // Fetch the user's progress in the course
                                    $course_info = $user_data->get_course_info($course_id);
                                    $lessons_completed = $course_info ? $course_info['items']['lesson']['completed'] : 0;
                                    $total_lessons = $course_info ? $course_info['items']['lesson']['total'] : 0;

                                    // Calculate progress percentage
                                    $progress_percentage = $total_lessons > 0 ? ($lessons_completed / $total_lessons) * 100 : 0;
                                }

                                // Get the featured image URL
                                $featured_image_url = get_the_post_thumbnail_url($course_id, 'full') ?: 'path/to/default/image.jpg'; // Use a default image if none is set

                                // Get the course permalink
                                $course_link = get_permalink($course_id);

                                // Get the excerpt
                                $excerpt = $course_post->post_excerpt;
                                if (empty($excerpt)) {
                                    $excerpt = wp_trim_words($course_post->post_content, 10, '...');
                                }
                                ?>
                                <div class="col-6 py-3">
                                    <div class="card">
                                        <div class="row g-0">
                                            <div class="col-md-5">
                                                <img src="<?php echo esc_url($featured_image_url); ?>" class="img-fluid rounded-start" alt="<?php echo esc_attr($course_name); ?>">
                                            </div>
                                            <div class="col-md-7 p-2">
                                                <div class="card-body">
                                                    <h5 class="card-title lh-sm"><a href="<?php echo esc_url($course_link); ?>"><?php echo esc_html($course_name); ?></a></h5>
                                                    <?php if ($is_enrolled) { ?>
                                                        <div class="progress my-4">
                                                            <div class="progress-bar" role="progressbar" style="width: <?php echo esc_attr($progress_percentage); ?>%;" aria-valuenow="<?php echo esc_attr($progress_percentage); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="progress my-4">
                                                            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="<?php echo esc_attr($progress_percentage); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    <?php }  ?>
                                                    <p class="card-text lh-sm"><?php echo esc_html($excerpt); ?></p>
                                                    <div class="mt-4 d-flex justify-content-end">
                                                        <a href="<?php echo esc_url($course_link); ?>" class="btn btn-primary">Access now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            echo "No courses found.";
                        }
                    ?>
                </div>
                
            </div>
            


        </div>
    </div>
</section>

<section class="d-flex mt-5 section-colored-light min-vh-100">
    <div class="container p-4 d-flex align-items-center">
        <div class="row py-5">
            <div class="col-lg-8 mb-5">
                <h2 class="fs-3"><?php the_field('library_nutrition'); ?></h2>
                <div class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque volutpat, lectus at consequat gravida, odio erat fermentum urna, eget dictum velit risus id metus.</div>
                <div class="mt-3">
                    <a href="#" class="btn btn-primary">Explore more</a>
                </div>
            </div>
           
            <div class="col-lg-12">
                <div class="row">
                    <?php
                        // Query arguments
                        $args = array(
                            'post_type' => 'library',
                            'posts_per_page' => 4,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category',
                                    'field'    => 'slug',
                                    'terms'    => 'nutrition',
                                ),
                            ),
                        );

                        // The Query
                        $nutrition_query = new WP_Query($args);

                        // The Loop
                        if ($nutrition_query->have_posts()) : while ($nutrition_query->have_posts()) : $nutrition_query->the_post(); ?>

                            <div class="col-3 mb-4">
                                <div class="card">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="<?php the_title(); ?>">
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
                                        // Check the ACF fields
                                        $library_files = get_field('library_files');
                                        $library_video = get_field('library_video');
                                        $library_event = get_field('library_event'); // This is the date

                                        // Determine button text and behavior
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
                                            <?php echo esc_html($button_text); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        <?php endwhile; wp_reset_postdata(); else : ?>
                            <p><?php _e('No nutrition posts found.'); ?></p>
                        <?php endif; ?>
                </div>

            </div>
            
        </div>
    </div>
</section>

<section class="d-flex min-vh-100">
    <div class="container p-4 d-flex align-items-center">
        <div class="row py-5 align-items-center">
            
            <div class="col-lg-8 mb-5">
                <h2 class="fs-3"><?php the_field('library_excercise'); ?></h2>
                <div class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque volutpat, lectus at consequat gravida, odio erat fermentum urna, eget dictum velit risus id metus.</div>
                <div class="mt-3">
                    <a href="#" class="btn btn-primary">Explore more</a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <?php
                    // Query arguments
                    $args = array(
                        'post_type' => 'library',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'slug',
                                'terms'    => 'exercise',
                            ),
                        ),
                    );

                    // The Query
                    $exercise_query = new WP_Query($args);

                    // The Loop
                    if ($exercise_query->have_posts()) : while ($exercise_query->have_posts()) : $exercise_query->the_post(); ?>

                        <div class="col-lg-3 mb-4">
                            <div class="card">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="<?php the_title(); ?>">
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
                                    // Check the ACF fields
                                    $library_files = get_field('library_files');
                                    $library_video = get_field('library_video');
                                    $library_event = get_field('library_event'); // This is the date

                                    // Determine button text and behavior
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
                                        <?php echo esc_html($button_text); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata(); else : ?>
                        <p><?php _e('No exercises found.'); ?></p>
                    <?php endif; ?>                    
                </div>
            </div>
           
        </div>
    </div>
</section>

<section class="d-flex section-colored-light min-vh-100">
    <div class="container p-4  d-flex align-items-center">
        <div class="row py-5 align-items-center">
            <div class="col-lg-8 mb-5">
                <h2 class="fs-3"><?php the_field('library_mindset_self_care'); ?></h2>
                <div class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque volutpat, lectus at consequat gravida, odio erat fermentum urna, eget dictum velit risus id metus.</div>
                <div class="mt-3">
                    <a href="#" class="btn btn-primary">Explore more</a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                <?php
                // Query arguments
                $args = array(
                    'post_type' => 'library',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field'    => 'slug',
                            'terms'    => 'mindset-self-care',
                        ),
                    ),
                );

                // The Query
                $mindset_query = new WP_Query($args);

                // The Loop
                if ($mindset_query->have_posts()) : while ($mindset_query->have_posts()) : $mindset_query->the_post(); ?>

                    <div class="col-lg-3 mb-4">
                        <div class="card">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="<?php the_title(); ?>">
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
                                // Check the ACF fields
                                $library_files = get_field('library_files');
                                $library_video = get_field('library_video');
                                $library_event = get_field('library_event'); // This is the date

                                // Determine button text and behavior
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
                                    <?php echo esc_html($button_text); ?>
                                </a>
                            </div>
                        </div>
                    </div>

                <?php endwhile; wp_reset_postdata(); else : ?>
                    <p><?php _e('No mindset-self-care posts found.'); ?></p>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="d-flex  min-vh-100">
    <div class="container p-4 d-flex align-items-center">
        <div class="row py-5 align-items-center">
            <div class="col-lg-8 mb-5">
                <h2 class="fs-3"><?php the_field('library_community'); ?></h2>
                <div class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque volutpat, lectus at consequat gravida, odio erat fermentum urna, eget dictum velit risus id metus.</div>
                <div class="mt-3">
                    <a href="#" class="btn btn-primary">Explore more</a>
                </div>
            </div>
            
            <div class="col-lg-12">
                <div class="row">
                <?php
                // Query arguments
                $args = array(
                    'post_type' => 'library',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field'    => 'slug',
                            'terms'    => 'community',
                        ),
                    ),
                );

                // The Query
                $community_query = new WP_Query($args);

                // The Loop
                if ($community_query->have_posts()) : while ($community_query->have_posts()) : $community_query->the_post(); ?>

                    <div class="col-lg-3 mb-4">
                        <div class="card">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="<?php the_title(); ?>">
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
                                // Check the ACF fields
                                $library_files = get_field('library_files');
                                $library_video = get_field('library_video');
                                $library_event = get_field('library_event'); // This is the date

                                // Determine button text and behavior
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
                                    <?php echo esc_html($button_text); ?>
                                </a>
                            </div>
                        </div>
                    </div>

                <?php endwhile; wp_reset_postdata(); else : ?>
                    <p><?php _e('No community posts found.'); ?></p>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>