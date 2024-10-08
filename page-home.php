<?php
/*
Template Name: Home Page
*/
get_header(); 
?>

<section class="video-section">
    <div class="container position-relative">
        <div class="row">
            <div class="col-12">
                <!-- Video Background -->
                <div class="video-container">
                    <video autoplay muted loop id="background-video" class="w-100">
                        <source src="<?php the_field('hero_video'); ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>

                <!-- Content Overlay -->
                <div class="content-overlay text-center">
                    <div class="row">
                        <div class="col-lg-7 col-md-7 col-sm-10 mx-auto">
                            <h1><?php the_field('hero_headline'); ?></h1>
                            <a href="<?php the_field('hero_button_url'); ?>" class="btn btn-outline-light"><?php the_field('hero_button_text'); ?> <i class="fas fa-arrow-right btn-arrow"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="d-flex my-5">
    <div class="container py-4 section-type-1">
        <div class="row d-flex align-items-center">
            <div class="col-12">
                <h2 class="fs-3 mb-5"><?php the_field('hero_header_text'); ?></h2>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card hero-card" onclick="window.location.href='<?php the_field('cta_one'); ?>'" style="cursor: pointer;">
                    <img src="<?php the_field('box_image_one'); ?>" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <h5 class="card-title"><?php the_field('box_text_one'); ?></h5>
                        <a class="btn btn-trans-white" href="<?php the_field('cta_one'); ?>">Get started  <i class="fas fa-arrow-right btn-arrow"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card hero-card" onclick="window.location.href='<?php the_field('cta_two'); ?>'" style="cursor: pointer;">
                    <img src="<?php the_field('box_image_two'); ?>" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <h5 class="card-title"><?php the_field('box_text_two'); ?></h5>
                        <a class="btn btn-trans-white" href="<?php the_field('cta_two'); ?>">Get started  <i class="fas fa-arrow-right btn-arrow"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card hero-card" onclick="window.open('<?php the_field('cta_three'); ?>', '_blank')" style="cursor: pointer;">
                    <img src="<?php the_field('box_image_three'); ?>" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <h5 class="card-title var-color"><?php the_field('box_text_three'); ?></h5>
                        <a class="btn btn-trans-white" href="javascript:void(0);">Get started  <i class="fas fa-arrow-right btn-arrow"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="d-flex section-colored-light my-5 py-4">
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h2 class="fs-3 mb-5">Looking for something specific?</h2>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="<?php echo esc_url(get_field('grid_block_link_1')); ?>" class="text-decoration-none <?php echo (get_field('grid_block_action_1') === 'Lightbox') ? 'fancybox' : ''; ?>" <?php echo (get_field('grid_block_action_1') === 'New tab') ? 'target="_blank"' : ''; ?> <?php echo (get_field('grid_block_action_1') === 'Lightbox') ? 'data-fancybox="gallery"' : ''; ?>>
                    <div class= "card specific-card">
                        <div class="card-body">
                        <svg class="card-icons" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 93.38 93.38"><defs></defs><path class="cls-1" d="M74.32,37.77a17.29,17.29,0,0,0-7.59,1.75c-.19,0-.19,0-.39.19.58-2.33,2.34-6.42,8.17-8.36a2,2,0,1,0-1.36-3.7A16.05,16.05,0,0,0,62.06,39.91c-.19,0-.58-.2-.78-.2A18,18,0,0,0,53.7,38a17.71,17.71,0,0,0-7.79,1.95V30.57a7.8,7.8,0,0,0-7.78-7.78h-.77V14.62a1.84,1.84,0,0,0-2-1.95H26.66V7.23H32.1a1.84,1.84,0,0,0,1.95-1.95A1.83,1.83,0,0,0,32.1,3.34H17.32a1.83,1.83,0,0,0-2,1.94,1.84,1.84,0,0,0,2,2h5.45v5.44H13.82a1.84,1.84,0,0,0-2,1.95v8h-.78a7.8,7.8,0,0,0-7.78,7.78V88.93a7.8,7.8,0,0,0,7.78,7.78h27a7.85,7.85,0,0,0,6-2.92,18.89,18.89,0,0,0,9.54,2.92,16.6,16.6,0,0,0,6-1.17,12.37,12.37,0,0,1,8.36,0,15.83,15.83,0,0,0,6,1.17c12.45,0,22.57-13.23,22.57-29.57S86.57,37.77,74.32,37.77ZM15.76,16.56h17.9v6H15.76ZM7.2,30.18a3.9,3.9,0,0,1,3.89-3.89h27A3.9,3.9,0,0,1,42,30.18V42.05c-.19.19-2.91,2.92-3.69,3.89,0,.19-.2.19-.2.39H7.2Zm0,20H35.6c-.19.19-.19.58-.38.78-4.48,8.17-3.7,17.5-3.7,18.09H7.2Zm30.93,42.6h-27A3.9,3.9,0,0,1,7.2,88.93V73H31.91v.39c.19.78.58,9.34,9.14,18.09A3.79,3.79,0,0,1,38.13,92.82Zm36.19,0A12.91,12.91,0,0,1,69.65,92a18.19,18.19,0,0,0-5.64-1,19.27,19.27,0,0,0-5.65,1,18.93,18.93,0,0,1-4.66.78c-9.54-.39-14.4-8.95-14-8.95C27.24,58,44.75,44.77,44.94,44.58a14,14,0,0,1,8.76-2.92,13.66,13.66,0,0,1,6,1.36,9.49,9.49,0,0,0,8.56,0,13,13,0,0,1,6-1.36c10.11,0,18.48,11.48,18.48,25.68S84.43,92.82,74.32,92.82Z" transform="translate(-3.31 -3.34)"/><path class="cls-1" d="M53.89,44.19c-8.75,0-15.76,10.31-15.76,23a1.95,1.95,0,1,0,3.89,0C42,57,47.67,48.08,53.89,48.08a1.84,1.84,0,0,0,2-1.95A2,2,0,0,0,53.89,44.19Z" transform="translate(-3.31 -3.34)"/></svg>
                        <p><?php the_field('grid_block_text_1'); ?></p>  <i class="fas fa-arrow-right btn-arrow"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="<?php echo esc_url(get_field('grid_block_link_2')); ?>" class="text-decoration-none <?php echo (get_field('grid_block_action_2') === 'Lightbox') ? 'fancybox' : ''; ?>" <?php echo (get_field('grid_block_action_2') === 'New tab') ? 'target="_blank"' : ''; ?> <?php echo (get_field('grid_block_action_2') === 'Lightbox') ? 'data-fancybox="gallery"' : ''; ?>>
                    <div class="card specific-card">
                        <div class="card-body">
                        <svg class="card-icons" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 65.37 93.38"><defs></defs><path class="cls-1" d="M75.87,44.36a39.53,39.53,0,0,0,4.87-18.29c0-6.81-2.92-22.76-29.18-22.76s-29.18,16-29.18,22.76a40.49,40.49,0,0,0,3.69,16,32.09,32.09,0,0,0-8.75,22A32.68,32.68,0,1,0,75.87,44.36ZM50,92.8A28.85,28.85,0,0,1,21.21,64a28.12,28.12,0,0,1,8.36-20.24A2,2,0,0,0,30,41.44a35.4,35.4,0,0,1-3.89-15.56C26.07,17.32,30.55,7,51.36,7c21,0,25.29,10.31,25.29,18.87a35.4,35.4,0,0,1-5.06,17.51,1.76,1.76,0,0,0,.2,2.14A28.5,28.5,0,0,1,78.4,63.81,28.32,28.32,0,0,1,50,92.8Z" transform="translate(-17.32 -3.31)"/><path class="cls-1" d="M51.56,11.68c-14.4,0-21,4.47-21,14.39a31.62,31.62,0,0,0,2.72,12.06,1.23,1.23,0,0,0,1.17,1,1.47,1.47,0,0,0,1.55-.2,28.82,28.82,0,0,1,30.16,1.17,2.85,2.85,0,0,0,1.16.39h.59a2.05,2.05,0,0,0,1.17-1,30.16,30.16,0,0,0,3.5-13.61C72.37,16.15,65.76,11.68,51.56,11.68ZM66.34,35.8A31.69,31.69,0,0,0,50,31.32a30.58,30.58,0,0,0-13.81,3.12,23,23,0,0,1-1.75-8.37c0-3.5,0-10.5,17.12-10.5s17.12,7,17.12,10.5A32.32,32.32,0,0,1,66.34,35.8Z" transform="translate(-17.32 -3.31)"/><path class="cls-1" d="M50,50.39A13.62,13.62,0,1,0,63.62,64,13.53,13.53,0,0,0,50,50.39Zm0,23.34A9.73,9.73,0,1,1,59.73,64,9.63,9.63,0,0,1,50,73.73Z" transform="translate(-17.32 -3.31)"/></svg>
                        <p><?php the_field('grid_block_text_2'); ?></p>  <i class="fas fa-arrow-right btn-arrow"></i>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <a href="<?php echo esc_url(get_field('grid_block_link_3')); ?>" class="text-decoration-none <?php echo (get_field('grid_block_action_3') === 'Lightbox') ? 'fancybox' : ''; ?>" <?php echo (get_field('grid_block_action_3') === 'New tab') ? 'target="_blank"' : ''; ?> <?php echo (get_field('grid_block_action_3') === 'Lightbox') ? 'data-fancybox="gallery"' : ''; ?>>
                    <div class="card specific-card">
                        <div class="card-body">
                        <svg class="card-icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 78.36 93.43"><defs></defs><path class="cls-1" d="M89,35.4A35.86,35.86,0,0,0,56.88,3.48a23,23,0,0,0-3.7-.2A36,36,0,0,0,19.9,25.67,85.87,85.87,0,0,1,15,36.37l-3.5,6.43a5.73,5.73,0,0,0,.19,5.84,6.06,6.06,0,0,0,5.06,2.92,2,2,0,0,1,1.95,1.94V64.21a10.89,10.89,0,0,0,10.9,10.9,4.41,4.41,0,0,1,4.48,4.48V94.77a1.84,1.84,0,0,0,1.94,2H70.7a1.84,1.84,0,0,0,2-2,68,68,0,0,1,10.9-36.59A35,35,0,0,0,89,35.4ZM80.44,56A73.49,73.49,0,0,0,69,92.82H38.2V79.59a8.31,8.31,0,0,0-8.37-8.37,7,7,0,0,1-7-7V53.5A5.86,5.86,0,0,0,17,47.66a2.41,2.41,0,0,1-1.75-1,1.72,1.72,0,0,1,0-1.95l3.31-6.42c1.94-3.7,3.5-7.4,5.06-11.09a31.63,31.63,0,0,1,29.58-20,20.42,20.42,0,0,1,3.31.19C71.29,8.73,83.55,21,85.11,35.79A30.78,30.78,0,0,1,80.44,56Z" transform="translate(-10.82 -3.28)"/><path class="cls-1" d="M72.65,35V33.84a8.6,8.6,0,0,0-4.48-7.59,6.41,6.41,0,0,0,.2-1.94,8.94,8.94,0,0,0-9-9,9.59,9.59,0,0,0-7,3.31,8.43,8.43,0,0,0-7-3.31,8.93,8.93,0,0,0-9,9,5.82,5.82,0,0,0,.2,1.94,8.84,8.84,0,0,0-4.48,7.59V35a8.87,8.87,0,0,0,0,15.18A5.56,5.56,0,0,0,32,52a8.61,8.61,0,0,0,4.47,7.59,6.73,6.73,0,0,0-.19,1.94,8.93,8.93,0,0,0,9,9,9.59,9.59,0,0,0,7-3.31,8.43,8.43,0,0,0,7,3.31,8.93,8.93,0,0,0,9-9A6.11,6.11,0,0,0,68,59.54,8.85,8.85,0,0,0,72.45,52a5.56,5.56,0,0,0-.19-1.76,8.63,8.63,0,0,0,4.28-7.59A7.63,7.63,0,0,0,72.65,35ZM46,66.55a5,5,0,0,1-5.06-5.07,4,4,0,0,1,.58-2.14,2.06,2.06,0,0,0,0-1.55,1.72,1.72,0,0,0-1.16-1.17A4.8,4.8,0,0,1,36.83,52a5.87,5.87,0,0,1,.39-2,2.09,2.09,0,0,0,0-1.56,1.23,1.23,0,0,0-1.17-1,4.78,4.78,0,0,1-3.5-4.67,5,5,0,0,1,3.31-4.67,2.05,2.05,0,0,0,1.17-1,2.16,2.16,0,0,0,0-1.55,5.58,5.58,0,0,1-.39-1.76,4.79,4.79,0,0,1,3.5-4.67A1.72,1.72,0,0,0,41.31,28a2.16,2.16,0,0,0,0-1.55,4.45,4.45,0,0,1-.58-2.14,5,5,0,0,1,5.06-5.07,4.92,4.92,0,0,1,5.06,5.07V61.68A4.83,4.83,0,0,1,46,66.55ZM69.73,47.27a2.05,2.05,0,0,0-1.17,1,2.19,2.19,0,0,0,0,1.56A6.69,6.69,0,0,1,69,51.75a4.78,4.78,0,0,1-3.5,4.67,1.76,1.76,0,0,0-1.17,1.17,2.09,2.09,0,0,0,0,1.56,4.42,4.42,0,0,1,.58,2.14,5.06,5.06,0,0,1-10.12,0V24.11a5.06,5.06,0,0,1,10.12,0,3.9,3.9,0,0,1-.58,2.14,2.09,2.09,0,0,0,0,1.56A1.76,1.76,0,0,0,65.45,29,4.78,4.78,0,0,1,69,33.65a5.52,5.52,0,0,1-.39,1.75,2.21,2.21,0,0,0,0,1.56,2,2,0,0,0,1.17,1A5,5,0,0,1,73,42.6,4.85,4.85,0,0,1,69.73,47.27Z" transform="translate(-10.82 -3.28)"/></svg>
                        <p><?php the_field('grid_block_text_3'); ?></p>  <i class="fas fa-arrow-right btn-arrow"></i>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <a href="<?php echo esc_url(get_field('grid_block_link_4')); ?>" class="text-decoration-none <?php echo (get_field('grid_block_action_4') === 'Lightbox') ? 'fancybox' : ''; ?>" <?php echo (get_field('grid_block_action_4') === 'New tab') ? 'target="_blank"' : ''; ?> <?php echo (get_field('grid_block_action_4') === 'Lightbox') ? 'data-fancybox="gallery"' : ''; ?>>
                    <div class="card specific-card">
                        <div class="card-body">
                        <svg class="card-icons" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 84.06 93.19"><defs></defs><path class="cls-1" d="M91.65,62.16,77.86,12.66C75.73,3.53,68.93,3.34,68,3.34H51.46c-4.66.58-7,3.1-8,5.24A10.17,10.17,0,0,0,47.19,21a18.87,18.87,0,0,0,10.87,3.3,25.71,25.71,0,0,0,7.38-1.16L61,48a15.48,15.48,0,0,0-9.51-3.11A20.87,20.87,0,0,0,40,48.77c-6.21-8.93-14.17-10.88-19.61-10.88A29.4,29.4,0,0,0,8.94,40.42a2,2,0,0,0-1,1.75V94.58a2,2,0,0,0,1.94,2h.58c9.52,0,14.37-9.71,16.12-14.76a33.36,33.36,0,0,0,21.55,7.38,48.12,48.12,0,0,0,18-3.69c1.17-.39,2.33-1,3.5-1.36l15.72-5.63a.19.19,0,0,0,.2-.19C94,73.62,91.84,62.74,91.65,62.16ZM83.49,75,67.77,80.61c-1.17.38-2.53,1-3.69,1.35a44.57,44.57,0,0,1-16.51,3.5,30,30,0,0,1-21.16-8.35,1.79,1.79,0,0,0-1.94-.39,2.4,2.4,0,0,0-1.36,1.36c0,.2-3.3,13.4-11.84,14.76V43.52A25.14,25.14,0,0,1,20,41.78c7.18,0,13.2,3.69,17.47,10.87a2.25,2.25,0,0,0,1.36,1A2.19,2.19,0,0,0,40.39,53s4.66-4.27,10.68-4.27A13.36,13.36,0,0,1,60.58,53a1.8,1.8,0,0,0,1.94.39,1.88,1.88,0,0,0,1.36-1.56l5.83-31.45a1.85,1.85,0,0,0-.78-1.94,2.07,2.07,0,0,0-2.13-.19,23.22,23.22,0,0,1-8.94,1.94,14.86,14.86,0,0,1-8.73-2.53,6.25,6.25,0,0,1-2.33-7.57,6.74,6.74,0,0,1,5.05-2.91h16.3c.39,0,4.47.19,6,6.41L88,63.13S89.7,71.48,83.49,75Z" transform="translate(-7.97 -3.34)"/></svg>
                        <p><?php the_field('grid_block_text_4'); ?></p>  <i class="fas fa-arrow-right btn-arrow"></i>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <a href="<?php echo esc_url(get_field('grid_block_link_5')); ?>" class="text-decoration-none <?php echo (get_field('grid_block_action_5') === 'Lightbox') ? 'fancybox' : ''; ?>" <?php echo (get_field('grid_block_action_5') === 'New tab') ? 'target="_blank"' : ''; ?> <?php echo (get_field('grid_block_action_5') === 'Lightbox') ? 'data-fancybox="gallery"' : ''; ?>>
                    <div class="card specific-card">
                        <div class="card-body">
                        <svg class="card-icons" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 93.38"><defs></defs><path class="cls-1" d="M79.86,18.12H69.16v-3.5a1.84,1.84,0,0,0-1.94-1.95H59.05a1.46,1.46,0,0,1-.78-.38.71.71,0,0,1-.2-.59,14.73,14.73,0,0,0-.39-2.92,8.41,8.41,0,0,0-6.22-5.44H49.9a8.26,8.26,0,0,0-8.17,8.36,1,1,0,0,1-.39.78.72.72,0,0,1-.58.19H32.59a1.84,1.84,0,0,0-2,1.95v3.5H19.94A1.84,1.84,0,0,0,18,20.07v74.7a1.84,1.84,0,0,0,1.94,2H80.06a1.84,1.84,0,0,0,1.94-2V20.07A2.12,2.12,0,0,0,79.86,18.12ZM34.53,16.57h6.23a5.08,5.08,0,0,0,3.31-1.37,5.13,5.13,0,0,0,1.36-3.69,4.37,4.37,0,0,1,5.25-4.28A4.2,4.2,0,0,1,54,10.15a4.35,4.35,0,0,1,.19,1.55A4.56,4.56,0,0,0,55.54,15a4.9,4.9,0,0,0,3.51,1.56h6.22v3.5h0v7.2H34.53Zm-3.89,13s.2,1.17,2,1.56H67.22A1.91,1.91,0,0,0,69,29.79V29.6h1.17V85.24H29.28V29.6ZM77.92,92.83h-56V22h8.75v3.7H27.53a1.84,1.84,0,0,0-2,1.94V87.18a1.84,1.84,0,0,0,2,1.95H72.28a1.84,1.84,0,0,0,1.94-1.95V27.65a1.84,1.84,0,0,0-1.94-1.94H69.16V22h8.76Z" transform="translate(-18 -3.34)"/><path class="cls-1" d="M35.9,54.5H63.72a1.95,1.95,0,0,0,0-3.89H35.9a1.84,1.84,0,0,0-1.95,2A2,2,0,0,0,35.9,54.5Z" transform="translate(-18 -3.34)"/><path class="cls-1" d="M35.9,43H50.1a1.95,1.95,0,0,0,0-3.89H35.9A1.84,1.84,0,0,0,34,41.08,2.09,2.09,0,0,0,35.9,43Z" transform="translate(-18 -3.34)"/><path class="cls-1" d="M35.9,66.17H63.72a1.95,1.95,0,0,0,0-3.89H35.9a1.84,1.84,0,0,0-1.95,2A1.94,1.94,0,0,0,35.9,66.17Z" transform="translate(-18 -3.34)"/><path class="cls-1" d="M35.9,77.85H63.72a1.95,1.95,0,0,0,0-3.89H35.9A1.83,1.83,0,0,0,34,75.9,2.1,2.1,0,0,0,35.9,77.85Z" transform="translate(-18 -3.34)"/></svg>
                        <p><?php the_field('grid_block_text_5'); ?></p>  <i class="fas fa-arrow-right btn-arrow"></i>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <a href="<?php echo esc_url(get_field('grid_block_link_6')); ?>" class="text-decoration-none <?php echo (get_field('grid_block_action_6') === 'Lightbox') ? 'fancybox' : ''; ?>" <?php echo (get_field('grid_block_action_6') === 'New tab') ? 'target="_blank"' : ''; ?> <?php echo (get_field('grid_block_action_6') === 'Lightbox') ? 'data-fancybox="gallery"' : ''; ?>>
                    <div class="card specific-card">
                        <div class="card-body">
                        <svg class="card-icons" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 78.41 78.41"><defs></defs><path class="cls-1" d="M79.41,10.79H20.59a9.83,9.83,0,0,0-9.8,9.8V79.41a9.83,9.83,0,0,0,9.8,9.8H79.41a9.83,9.83,0,0,0,9.8-9.8V20.59A9.83,9.83,0,0,0,79.41,10.79ZM50,28.76a4.33,4.33,0,0,1,3.92,2.62H46.08A4.33,4.33,0,0,1,50,28.76Zm7.35,2.62A7.7,7.7,0,0,0,50,25.5a7.89,7.89,0,0,0-3.92,1.14L41,21.58a1.62,1.62,0,0,0-2.29,2.28l5.06,5.07a7.76,7.76,0,0,0-1,2.45H37.42l-4.9-5.23A18.61,18.61,0,0,1,50,14.06,19,19,0,0,1,67.64,26.15l-4.9,5.23Zm28.59,48a6.55,6.55,0,0,1-6.53,6.53H51.63V49.35a1.63,1.63,0,1,0-3.26,0V85.94H20.59a6.55,6.55,0,0,1-6.53-6.53V20.59a6.55,6.55,0,0,1,6.53-6.53H38.4A21.56,21.56,0,0,0,28.93,26a2,2,0,0,0,.32,1.63l6,6.53a1.72,1.72,0,0,0,1.14.49h27a1.47,1.47,0,0,0,1.14-.49l6-6.53A1.9,1.9,0,0,0,70.91,26a21.56,21.56,0,0,0-9.47-11.93h18a6.55,6.55,0,0,1,6.53,6.53Z" transform="translate(-10.79 -10.79)"/></svg>
                        <p><?php the_field('grid_block_text_6'); ?></p>  <i class="fas fa-arrow-right btn-arrow"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 text-center">
                <a class="btn btn-primary" href="<?php echo esc_url(get_field('full_library_link')); ?>">Search our full library  <i class="fas fa-arrow-right btn-arrow"></i></a>
            </div>
            
        </div>
    </div>
</section>

<section class="d-flex my-5 py-5 align-items-center">
    <div class="container my-5 ">
        <div class="row d-flex align-items-center">
            <div class="col-lg-5">
                <h2 class="fs-3 mb-5"><?php the_field('home_section_heading_1'); ?></h2>
                <p class="lead lh-sm mb-5"><?php the_field('home_section_text_1'); ?></p>
                <div class="my-4">
                    <a href="<?php the_field('home_section_link_1'); ?>" class="btn btn-primary me-1"><?php the_field('home_section_button_text_1'); ?> <i class="fas fa-arrow-right btn-arrow"></i></a>
                </div>
            </div>
            <div class="offset-lg-1 col-lg-6">
                <div class="video-wrapper position-relative ">
                    <div class="ratio ratio-16x9">
                        
                        <img class="img-fluid video-thumbnail rounded-video" src="<?php the_field('home_section_thumbnail_1'); ?>" alt="Custom Thumbnail">
                        <div class="play-button position-absolute top-50 start-50 translate-middle">
                            <svg aria-hidden="true" class="e-font-icon-svg e-eicon-play" viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg"><path d="M838 162C746 71 633 25 500 25 371 25 258 71 163 162 71 254 25 367 25 500 25 633 71 746 163 837 254 929 367 979 500 979 633 979 746 933 838 837 929 746 975 633 975 500 975 367 929 254 838 162M808 192C892 279 933 379 933 500 933 621 892 725 808 808 725 892 621 938 500 938 379 938 279 896 196 808 113 725 67 621 67 500 67 379 108 279 196 192 279 108 383 62 500 62 621 62 721 108 808 192M438 392V642L642 517 438 392Z"></path></svg>			
                        </div>
                        
                    </div>
                </div>

                <script>
                    document.querySelector('.video-wrapper').addEventListener('click', function () {
                        this.innerHTML = `
                        <div class="ratio ratio-16x9 rounded-video">
                            <iframe src="<?php the_field('home_section_video_1'); ?>?autoplay=1" class="rounded-video" title="YouTube video" allowfullscreen></iframe>
                        </div>`;
                    });
                </script>
            </div>
        </div>
    </div>
</section>

<section class="d-flex py-5 align-items-center section-colored-light ">
    <div class="container my-5 py-5 videocontainer">
        <div class="row d-flex align-items-center">
            
            <div class="col-lg-6">
                <div class="ratio ratio-16x9 videosection">
                    <video 
                        src="<?php echo get_template_directory_uri(); ?>/img/video-loop.mp4" 
                        title="" 
                        autoplay 
                        loop 
                        muted
                        playsinline
                        class="rounded-video"
                    >
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>

            <div class="offset-lg-1 col-lg-5">
                <h2 class="fs-3 mb-5"><?php the_field('home_section_heading_2'); ?></h2>
                <p class="lead lh-sm mb-5"><?php the_field('home_section_text_2'); ?></p>
                <div class="my-4">
                    <a href="<?php the_field('home_section_link_1'); ?>" class="btn btn-primary me-1"><?php the_field('home_section_button_text_1'); ?> <i class="fas fa-arrow-right btn-arrow"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- with p-4 -->
<section class="d-flex align-items-center py-5 my-5">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-8 mb-5">
                <h2 class="fs-3"><?php the_field('guided_education'); ?></h2>
                <div class="lead"><?php the_field('guided_education_text'); ?></div>
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
                                <div class="col-lg-6 col-12 pt-3">
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
                                                        <a href="<?php echo esc_url($course_link); ?>" class="btn btn-primary">Access now <i class="fas fa-arrow-right btn-arrow"></i></a>
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
<!-- with p-4 -->
<section class="d-flex py-5 section-colored-light">
    <div class="container d-flex align-items-center">
        <div class="row py-5">
            <div class="col-lg-8 mb-5">
                <h2 class="fs-3"><?php the_field('library_quick_start_guide'); ?></h2>
                <div class="lead"><?php the_field('library_quick_start_guide_text'); ?></div>
                <div class="mt-3">
                    <?php 
                        $category_link = get_category_link(get_category_by_slug('quick-start-guide')->term_id); 
                        echo '<a href="' . esc_url($category_link) . '" class="btn btn-primary">Explore more  <i class="fas fa-arrow-right btn-arrow"></i></a>';
                    ?>
                </div>
            </div>
           
            <div class="col-lg-12">
                <div class="row">
                    <?php
                    // Query for 'quick-start-guide' posts that are 'featured'
                    $args1 = array(
                        'post_type' => 'library',
                        'posts_per_page' => 8,
                        'tax_query' => array(
                            'relation' => 'AND',
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'slug',
                                'terms'    => 'quick-start-guide',
                            ),
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'slug',
                                'terms'    => 'featured',
                            ),
                        ),
                    );

                    $quick_start_query1 = new WP_Query($args1);

                    // Check if more posts are needed to fill up to 8
                    $remaining_posts = 8 - $quick_start_query1->post_count;

                    if ($remaining_posts > 0) {
                        // Query for additional 'quick-start-guide' posts excluding 'featured'
                        $args2 = array(
                            'post_type' => 'library',
                            'posts_per_page' => $remaining_posts,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category',
                                    'field'    => 'slug',
                                    'terms'    => 'quick-start-guide',
                                ),
                                array(
                                    'taxonomy' => 'category',
                                    'field'    => 'slug',
                                    'terms'    => 'featured',
                                    'operator' => 'NOT IN', // Exclude 'featured' posts
                                ),
                            ),
                        );

                        $quick_start_query2 = new WP_Query($args2);

                        // Combine the results
                        $final_posts = array_merge($quick_start_query1->posts, $quick_start_query2->posts);
                    } else {
                        // Use the results from the first query
                        $final_posts = $quick_start_query1->posts;
                    }

                    // Loop through the posts
                    if (!empty($final_posts)) :
                        foreach ($final_posts as $post) :
                            setup_postdata($post);
                            ?>

                        <div class="col-lg-3 col-md-6 col-12 mb-4">
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
                        
                        <?php endforeach; wp_reset_postdata(); else : ?>
                            <p><?php _e('No quick start guide posts found.'); ?></p>
                        <?php endif; ?>
                </div>
            </div>

            
        </div>
    </div>
</section>
<!-- with p-4 -->
<section class="d-flex py-5 ">
    <div class="container d-flex align-items-center">
        <div class="row py-5">
            <div class="col-lg-8 mb-5">
                <h2 class="fs-3"><?php the_field('library_nutrition'); ?></h2>
                <div class="lead"><?php the_field('library_nutrition_text'); ?></div>
                <div class="mt-3">
                    <?php 
                        $category_link = get_category_link(get_category_by_slug('nutrition')->term_id); 
                        echo '<a href="' . esc_url($category_link) . '" class="btn btn-primary">Explore more  <i class="fas fa-arrow-right btn-arrow"></i></a>';
                    ?>
                </div>
            </div>
           
            <div class="col-lg-12">
                <div class="row">
                    <?php
                    // Query for posts in 'nutrition' and 'featured'
                    $args1 = array(
                        'post_type' => 'library',
                        'posts_per_page' => 8,
                        'tax_query' => array(
                            'relation' => 'AND',
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'slug',
                                'terms'    => 'nutrition',
                            ),
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'slug',
                                'terms'    => 'featured',
                            ),
                        ),
                    );

                    $nutrition_query1 = new WP_Query($args1);

                    // Check if more posts are needed to fill up to 8
                    $remaining_posts = 8 - $nutrition_query1->post_count;

                    if ($remaining_posts > 0) {
                        // Query for additional posts from 'nutrition' excluding 'featured'
                        $args2 = array(
                            'post_type' => 'library',
                            'posts_per_page' => $remaining_posts,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category',
                                    'field'    => 'slug',
                                    'terms'    => 'nutrition',
                                ),
                                array(
                                    'taxonomy' => 'category',
                                    'field'    => 'slug',
                                    'terms'    => 'featured',
                                    'operator' => 'NOT IN', // Exclude 'featured' posts
                                ),
                            ),
                        );

                        $nutrition_query2 = new WP_Query($args2);

                        // Combine the results
                        $final_posts = array_merge($nutrition_query1->posts, $nutrition_query2->posts);
                    } else {
                        // Use the results from the first query
                        $final_posts = $nutrition_query1->posts;
                    }

                    // Loop through the posts
                    if (!empty($final_posts)) :
                        foreach ($final_posts as $post) :
                            setup_postdata($post);
                            ?>

                        <div class="col-lg-3 col-md-6 col-12 mb-4">
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

                        <?php endforeach; wp_reset_postdata(); else : ?>
                            <p><?php _e('No nutrition posts found.'); ?></p>
                        <?php endif; ?>
                </div>
            </div>

            
        </div>
    </div>
</section>
<!-- with p-4 -->
<section class="d-flex section-colored-light py-5">
    <div class="container d-flex align-items-center">
        <div class="row py-5 align-items-center">
            
            <div class="col-lg-8 mb-5">
                <h2 class="fs-3"><?php the_field('library_excercise'); ?></h2>
                <div class="lead"><?php the_field('library_excercise_text'); ?></div>
                <div class="mt-3">
                <?php 
                        $category_link = get_category_link(get_category_by_slug('exercise')->term_id); 
                        echo '<a href="' . esc_url($category_link) . '" class="btn btn-primary">Explore more  <i class="fas fa-arrow-right btn-arrow"></i></a>';
                    ?>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <?php
                    // Query for posts in 'exercise' and 'featured'
                    $args1 = array(
                        'post_type' => 'library',
                        'posts_per_page' => 8,
                        'tax_query' => array(
                            'relation' => 'AND',
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'slug',
                                'terms'    => 'exercise',
                            ),
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'slug',
                                'terms'    => 'featured',
                            ),
                        ),
                    );

                    $exercise_query1 = new WP_Query($args1);

                    // Check if more posts are needed to fill up to 8
                    $remaining_posts = 8 - $exercise_query1->post_count;

                    if ($remaining_posts > 0) {
                        // Query for additional posts from 'exercise' excluding 'featured'
                        $args2 = array(
                            'post_type' => 'library',
                            'posts_per_page' => $remaining_posts,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category',
                                    'field'    => 'slug',
                                    'terms'    => 'exercise',
                                ),
                                array(
                                    'taxonomy' => 'category',
                                    'field'    => 'slug',
                                    'terms'    => 'featured',
                                    'operator' => 'NOT IN', // Exclude 'featured' posts
                                ),
                            ),
                        );

                        $exercise_query2 = new WP_Query($args2);

                        // Combine the results
                        $final_posts = array_merge($exercise_query1->posts, $exercise_query2->posts);
                    } else {
                        // Use the results from the first query
                        $final_posts = $exercise_query1->posts;
                    }

                    // Loop through the posts
                    if (!empty($final_posts)) :
                        foreach ($final_posts as $post) :
                            setup_postdata($post);
                            ?>

                        <div class="col-lg-3 col-md-6 col-12 mb-4">
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

                        <?php endforeach; wp_reset_postdata(); else : ?>
                            <p><?php _e('No posts found.'); ?></p>
                        <?php endif; ?>
                </div>
            </div>

           
        </div>
    </div>
</section>
<!-- with p-4 -->
<section class="d-flex py-5 ">
    <div class="container  d-flex align-items-center">
        <div class="row py-5 align-items-center">
            <div class="col-lg-8 mb-5">
                <h2 class="fs-3"><?php the_field('library_mindset_self_care'); ?></h2>
                <div class="lead"><?php the_field('library_mindset_self_care_text'); ?></div>
                <div class="mt-3">
                    <?php 
                        $category_link = get_category_link(get_category_by_slug('mindset-self-care')->term_id); 
                        echo '<a href="' . esc_url($category_link) . '" class="btn btn-primary">Explore more  <i class="fas fa-arrow-right btn-arrow"></i></a>';
                    ?>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <?php
                    // Query for posts in both 'mindset-self-care' and 'featured'
                    $args1 = array(
                        'post_type' => 'library',
                        'posts_per_page' => 8,
                        'tax_query' => array(
                            'relation' => 'AND',
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'slug',
                                'terms'    => 'mindset-self-care',
                            ),
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'slug',
                                'terms'    => 'featured',
                            ),
                        ),
                    );

                    $mindset_query1 = new WP_Query($args1);

                    // Check if we need more posts to fill up to 8
                    $remaining_posts = 8 - $mindset_query1->post_count;

                    if ($remaining_posts > 0) {
                        // Query for additional posts from 'mindset-self-care' (excluding 'featured')
                        $args2 = array(
                            'post_type' => 'library',
                            'posts_per_page' => $remaining_posts,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category',
                                    'field'    => 'slug',
                                    'terms'    => 'mindset-self-care',
                                ),
                                array(
                                    'taxonomy' => 'category',
                                    'field'    => 'slug',
                                    'terms'    => 'featured',
                                    'operator' => 'NOT IN',  // Exclude 'featured' posts
                                ),
                            ),
                        );

                        $mindset_query2 = new WP_Query($args2);

                        // Merge the two query results
                        $final_posts = array_merge($mindset_query1->posts, $mindset_query2->posts);
                    } else {
                        // If no more posts needed, use the first query results
                        $final_posts = $mindset_query1->posts;
                    }

                    // Loop through the posts
                    if (!empty($final_posts)) :
                        foreach ($final_posts as $post) :
                            setup_postdata($post);
                            ?>

                        <div class="col-lg-3 col-md-6 col-12 mb-4">
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





                        <?php endforeach; wp_reset_postdata(); else : ?>
                            <p><?php _e('No posts found.'); ?></p>
                        <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- with p-4 -->
<section class="d-flex section-colored-light  py-5">
    <div class="container d-flex align-items-center">
        <div class="row py-5 align-items-center">
            <div class="col-lg-8 mb-5">
                <h2 class="fs-3"><?php the_field('library_community'); ?></h2>
                <div class="lead"><?php the_field('library_community_text'); ?></div>
                <div class="mt-3">
                    <?php 
                        $category_link = get_category_link(get_category_by_slug('community')->term_id); 
                        echo '<a href="' . esc_url($category_link) . '" class="btn btn-primary">Explore more  <i class="fas fa-arrow-right btn-arrow"></i></a>';
                    ?>
                </div>
            </div>
            
            <div class="col-lg-12">
                <div class="row">
                    <?php
                    // Query for posts in both 'community' and 'featured'
                    $args1 = array(
                        'post_type' => 'library',
                        'posts_per_page' => 8,
                        'tax_query' => array(
                            'relation' => 'AND',
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'slug',
                                'terms'    => 'community',
                            ),
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'slug',
                                'terms'    => 'featured',
                            ),
                        ),
                    );

                    $community_query1 = new WP_Query($args1);

                    // Check if we need more posts to fill up to 8
                    $remaining_posts = 8 - $community_query1->post_count;

                    if ($remaining_posts > 0) {
                        // Query for additional posts from 'community' (excluding 'featured')
                        $args2 = array(
                            'post_type' => 'library',
                            'posts_per_page' => $remaining_posts,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category',
                                    'field'    => 'slug',
                                    'terms'    => 'community',
                                ),
                                array(
                                    'taxonomy' => 'category',
                                    'field'    => 'slug',
                                    'terms'    => 'featured',
                                    'operator' => 'NOT IN',  // Exclude 'featured' posts
                                ),
                            ),
                        );

                        $community_query2 = new WP_Query($args2);

                        // Merge the two query results
                        $final_posts = array_merge($community_query1->posts, $community_query2->posts);
                    } else {
                        // If no more posts needed, use the first query results
                        $final_posts = $community_query1->posts;
                    }

                    // Loop through the posts
                    if (!empty($final_posts)) :
                        foreach ($final_posts as $post) :
                            setup_postdata($post);
                            ?>

                        <div class="col-lg-3 col-md-6 col-12 mb-4">
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

                        <?php endforeach; wp_reset_postdata(); else : ?>
                            <p><?php _e('No posts found.'); ?></p>
                        <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>