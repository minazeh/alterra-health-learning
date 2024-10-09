<?php
/* Template Name: Registration Page */

// Start output buffering
ob_start();

if ( is_user_logged_in() ) {
    wp_redirect( home_url() ); 
    exit;
}

get_header();

// Handle registration
if ( isset( $_POST['register'] ) ) {
    $first_name = sanitize_text_field($_POST['first_name']);
    $last_name = sanitize_text_field($_POST['last_name']);
    $email = sanitize_email($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ( empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password) ) {
        echo '<div class="alert alert-danger">All fields are required.</div>';
    } elseif ( !is_email($email) ) {
        echo '<div class="alert alert-danger">Please enter a valid email address.</div>';
    } elseif ( $password !== $confirm_password ) {
        echo '<div class="alert alert-danger">Passwords do not match.</div>';
    } else {
        $userdata = array(
            'user_login' => $email,
            'user_email' => $email,
            'user_pass' => $password,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'role' => 'subscriber',
        );

        $user_id = wp_insert_user($userdata);
        
        if ( is_wp_error($user_id) ) {
            echo '<div class="alert alert-danger">' . esc_html($user_id->get_error_message()) . '</div>';
        } else {
            wp_set_current_user($user_id);
            wp_set_auth_cookie($user_id);
            wp_redirect(home_url());
            exit;
        }
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
                    <h1 class="my-5 display-5 fw-bold ls-tight">
                        <?php the_field('registration_header'); ?>
                    </h1>
                    <p style="font-size: 1.4rem;">
                        <?php the_field('registration_text'); ?>
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card">
                        <div class="card-body py-5 px-md-5">
                            <h2 class="mb-3">Sign Up</h2>
                            <script type="text/javascript">
                                jQuery("#wp-login-google-login-button").appendTo("#loginform");
                            </script>
                            
                            <form id="registrationForm" method="post">
                                <div class="form-floating mb-4">
                                    <input type="text" name="first_name" id="first_name" class="form-control" required />
                                    <label for="first_name">First Name</label>
                                </div>

                                <div class="form-floating mb-4">
                                    <input type="text" name="last_name" id="last_name" class="form-control" required />
                                    <label for="last_name">Last Name</label>
                                </div>

                                <div class="form-floating mb-4">
                                    <input type="email" name="email" id="email" class="form-control" required />
                                    <label for="email">Email address</label>
                                </div>

                                <div class="form-floating mb-4">
                                    <input type="password" name="password" id="password" class="form-control" required />
                                    <label for="password">Password</label>
                                </div>

                                <div class="form-floating mb-4">
                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" required />
                                    <label for="confirm_password">Confirm Password</label>
                                </div>

                                <button type="submit" name="register" class="btn btn-primary btn-block mb-4">Sign Up</button>

                                <div class="text-center">
                                    <p>Already have an account? <a href="<?php echo esc_url(home_url('/login')); ?>" class="text-primary link-primary" style="text-decoration: none;">Log In</a></p>
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