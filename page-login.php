<?php
/* Template Name: Login Page */

// Start output buffering
ob_start();

if ( is_user_logged_in() ) {
    wp_redirect( home_url() ); 
    exit;
}

get_header();

// Handle login
if ( isset( $_POST['login'] ) ) {
    $creds = array();
    $creds['user_login'] = $_POST['username'];
    $creds['user_password'] = $_POST['password'];
    $creds['remember'] = isset($_POST['remember']) ? true : false;

    $user = wp_signon( $creds, false );

    if ( is_wp_error( $user ) ) {
        echo '<div class="alert alert-danger">' . $user->get_error_message() . '</div>';
    } else {
        wp_redirect( home_url() );
        exit;
    }
}
?>

<style>
    header {
        display: none !important;
    }
</style>

<section class="vh-100 d-flex justify-content-center align-items-center">
    <div class="px-4 py-5 px-md-5 text-center text-lg-start">
        <div class="container">
            <div class="row gx-lg-5 align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="mt-2 mb-3">
                        <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                            <?php if (has_custom_logo()) {
                                the_custom_logo();
                            } else {
                                echo bloginfo('name');
                            } ?>
                        </a>
                    </div>
                    <h1 class="my-5 display-3 fw-bold ls-tight">
                        <?php the_field('login_header'); ?>
                    </h1>
                    <p>
                        <?php the_field('login_text'); ?>
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card">
                        <script type="text/javascript">
                            jQuery("#wp-login-google-login-button").appendTo("#loginform");
                        </script>
                        <div class="card-body py-5 px-md-5">
                            <h2 class="mb-3">Log In</h2>
                            
                            <form id="loginForm" method="post">
                                <div class="form-floating mb-4">
                                    <input type="text" name="username" id="username" class="form-control" required />
                                    <label for="username">Username</label>
                                </div>

                                <div class="form-floating mb-4">
                                    <input type="password" name="password" id="password" class="form-control" required />
                                    <label for="password">Password</label>
                                </div>

                                <div class="container p-0">
                                    <div class="row mb-5 align-items-center">
                                        <div class="col text-start">
                                            <div class="form-check">
                                                <input type="checkbox" name="remember" id="remember" class="form-check-input" />
                                                <label class="form-check-label" for="remember">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col text-end">
                                            <button type="submit" name="login" class="btn btn-primary">
                                                Log in
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <p>Don't have an account? <a href="<?php echo esc_url(home_url('/register')); ?>" class="text-primary link-primary" style="text-decoration: none;">Sign up</a></p>
                                </div>
                            </form>
                            <div id="wp-login-google-login-button" style="display: flex;align-items: center;justify-content: center;flex-direction: column;">
                                <div style="margin: 10px 0;">Or</div>
                                <div class="g_id_signin"
                                    data-type="standard"
                                    data-theme="filled_black"
                                    data-size="large"
                                    data-text="continue_with"
                                    data-shape="pill"
                                    data-locale="en_US"
                                    data-use_fedcm_for_prompt="true">
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php ob_end_flush(); get_footer(); ?>