<?php

get_header(); ?>

<section class="section my-5 py-5 flex-grow-1">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <h1><?php the_title(); ?></h1>
                        <br>
                        <div class="post-content">
                            <?php the_content(); ?>
                        </div>

                        <?php
                            // Example of ACF fields: library_files, library_video, library_event
                            $library_files = get_field('library_files');
                            $library_video = get_field('library_video');
                            $library_event = get_field('library_event');

                            if( $library_files ) {
                                // Display a download button for files
                                
                                echo '<br><a href="' . esc_url($library_files) . '" class="btn btn-primary" download>Download File</a>';
                            } elseif( $library_video ) {
                                // Display an embedded video
                                echo '<br><div class="video-wrapper">';
                                echo '<div class="ratio ratio-16x9">';
                                echo '<video  src="'. $library_video .'"  title="" controls muted playsinline class="rounded-video" > Your browser does not support the video tag. </video>';
                                echo '</div>';
                                echo '</div>';
                            } elseif( $library_event ) {
                                // Display event content (modify as needed)
                                echo '<br><p>Join the event: ' . esc_html($library_event) . '</p>';
                            } 
                        ?>

                    </article>

                <?php endwhile; endif; ?>
                <div class="d-flex justify-content-between my-5">
                    <div class="previous-post">
                        <?php previous_post_link('%link', '<button class="btn btn-sm btn-primary">&laquo; %title</button>'); ?>
                    </div>
                    <div class="next-post">
                        <?php next_post_link('%link', '<button class="btn btn-sm btn-primary">%title &raquo;</button>'); ?>
                    </div>
                </div>
            </div>
            <div class="offset-md-1 col-md-4">
                <h3>Category</h3>
                <div class="category-wrapper">
                    <?php
                        // Get the categories for the current post or page
                        $categories = get_the_category();

                        if ( ! empty( $categories ) ) {
                            foreach ( $categories as $category ) {
                                echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" class="btn btn-sm btn-primary m-1">' . esc_html( $category->name ) . '</a>';
                            }
                        } else {
                            echo '<p>No categories assigned.</p>';
                        }
                    ?>
                </div>

                <h3 class="mt-5">Tags</h3>
                <?php
                    // Get the tags for the current post
                    $tags = get_the_tags();

                    if ( ! empty( $tags ) ) {
                        foreach ( $tags as $tag ) {
                            echo '<a href="javascript:void(0);" class="btn btn-sm btn-primary m-1">' . esc_html( $tag->name ) . ' </a>';
                        }
                    } else {
                        echo '<p>No tags assigned.</p>';
                    }
                ?>
            </div>
        </div>
    </div>
    
</section>             



<?php get_footer(); ?>
