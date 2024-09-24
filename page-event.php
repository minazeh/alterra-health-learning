<?php
/*
Template Name: Event Page
*/
get_header(); 
?>

<div class="container hero-banner mb-5">
    
    <div class="row">
        <div class="col-12 p-4 section-type-1">
            <h1>Events Calendar</h1>
            <div class="lead"><?php the_field('event_header_text'); ?> </div>
            <div class="mb-3"></div>
            <div id='calendar'></div>
        </div>
    </div>
</div>


<?php get_footer(); ?>