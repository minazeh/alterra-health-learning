<?php
/* Template Name: Terms and Conditions */

get_header(); 
?>
<div class="section">
    <div class="container my-5 pb-5 terms-content">
        <div class="row">
            <div class="offset-1 col-10">
            <?php
                // Start the loop
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        // Display the title
                        the_title('<h1>', '</h1><br>');
                        // Display the content
                        the_content();
                    endwhile;
                endif;
                ?>
            </div>
        </div>
        
    </div>
</div>


<?php
get_footer();
?>