<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class("d-flex flex-column min-vh-100"); ?>>

<header class="site-header navbar navbar-expand-lg mb-n5">
    <div class="container">
        <div class="row w-100 align-items-center">
            <!-- Empty space for alignment on the left -->
            <div class="col-4 hidden-small"></div>

            <!-- Centered Logo Section -->
            <div class="col-md-4 col-8 text-md-center mt-2 mb-3">
                <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        echo bloginfo('name');
                    } ?>
                </a>
            </div>

            <!-- Right Aligned Menu Button -->
            <div class="col-4 text-end">
                <a class="btn menubtn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                    MENU
                </a>
            </div>
        </div>
    </div>
</header>
    
    <div class="offcanvas offcanvas-end px-1" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            
            <h5 class="offcanvas-title pt-3" id="offcanvasNavbarLabel">Menu</h5>
            <button class="btn-close mt-3" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary-menu',
                'menu_class'     => 'navbar-nav',
                'container'      => false,
                'depth'          => 2,
                'walker'         => new WP_Bootstrap_Navwalker(), // Optional for better Bootstrap nav handling
            ));
            ?>

            <!-- Login/Signup Buttons -->
            <div class="d-flex w-100 mt-3">
                <?php if ( is_user_logged_in() ) : ?>
                    <!-- Show Logout Button if Logged In -->
                    <a href="<?php echo wp_logout_url( home_url() ); ?>" class="btn btn-outline-secondary flex-grow-1">Logout</a>
                <?php else : ?>
                    <!-- Trigger Modal for Login Form -->
                    <button  class="btn btn-outline-secondary me-2 flex-grow-1" id="openLoginModal">
                        Login
                    </button>

                    <!-- Signup Button -->
                    <button class="btn btn-outline-secondary flex-grow-1" data-bs-toggle="modal" data-bs-target="#signupModal">
                        Signup
                    </button>
                <?php endif; ?>
            </div>

        </div>
    </div>
    <!-- Modal Structure for Login -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo do_shortcode('[learn_press_login_form]'); ?>
            </div>
            </div>
        </div>
    </div>
    <!-- Modal Structure for Signup -->
    <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo do_shortcode('[learn_press_register_form]'); ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script>
        document.getElementById('openLoginModal').addEventListener('click', function() {
            // Check if the off-canvas is open
            var offcanvasElement = document.querySelector('.offcanvas.show');
            var modalElement = new bootstrap.Modal(document.getElementById('loginModal'));

            if (offcanvasElement) {
                // Close off-canvas first, then open the modal after it's hidden
                var offcanvasInstance = bootstrap.Offcanvas.getInstance(offcanvasElement);
                offcanvasInstance.hide();

                // Ensure the modal opens after the off-canvas is fully hidden
                offcanvasElement.addEventListener('hidden.bs.offcanvas', function() {
                    modalElement.show();
                }, { once: true });
            } else {
                // If off-canvas is not open, just open the modal
                modalElement.show();
            }
        });


    </script>
    <div id="content" class="site-content">
