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
    // Check if terms checkbox is checked
    
        $creds = array();
        $creds['user_login'] = $_POST['username'];
        $creds['user_password'] = $_POST['password'];
        $creds['remember'] = isset($_POST['remember']) ? true : false;

        $user = wp_signon( $creds, false );

        if ( is_wp_error( $user ) ) {
            echo '<div class="alert alert-danger">' . $user->get_error_message() . '</div>';
        } else {
            if ($_POST['g-recaptcha-response']) {
                $secret = 'G_SECRET';
                $response = $_POST['g-recaptcha-response'];
                $remoteip = $_SERVER['REMOTE_ADDR'];
                
                $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}&remoteip={$remoteip}");
                $captcha_success = json_decode($verify);
            
                if ($captcha_success->success == false) {
                    // CAPTCHA failed, handle error
                    echo 'Please complete the CAPTCHA verification.';
                } else {
                    // CAPTCHA passed, continue processing
                }
            }
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
                    <h1 class="my-5 display-6 fw-bold ls-tight">
                        <?php the_field('login_header'); ?>
                    </h1>
                    <p style="font-size: 1.4rem;">
                        <?php the_field('login_text'); ?>
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card">
                        <script type="text/javascript">
                            jQuery("#wp-login-google-login-button").appendTo("#loginform");
                        </script>
                        <div class="card-body py-5 px-md-5">
                            <h2 class="mb-3">Log in</h2>
                            <p class="terms-agreement">Need an account? <a href="<?php echo esc_url(home_url('/register')); ?>">Create an account</a></p>
                            <form id="loginForm" class="mt-4" method="post">
                                <div class="form-floating mb-4">
                                    <input type="text" name="username" id="username" class="form-control" required />
                                    <label for="username">Username or email</label>
                                </div>

                                <div class="form-floating mb-4" style="position: relative;">
                                    <input type="password" name="password" id="passwordx" class="form-control" required />
                                    <label for="passwordx">Password</label>
                                    <!-- The "Show" toggle inside the input box with an eye icon -->
                                    <span id="togglePassword" style="position: absolute; right: 20px; top: 50%; transform: translateY(-50%); cursor: pointer; font-size: 13px;">
                                        <i class="fas fa-eye"></i> Show
                                    </span>
                                </div>

                                <script>
                                    function togglePasswordVisibility() {
                                        var passwordInput = document.getElementById("passwordx");
                                        if (passwordInput.type === "password") {
                                            passwordInput.type = "text";
                                        } else {
                                            passwordInput.type = "password";
                                        }
                                    }

                                    document.getElementById("togglePassword").addEventListener("click", function () {
                                        togglePasswordVisibility();

                                        // Change the icon and the text of the toggle button
                                        var icon = this.querySelector('i');
                                        if (this.textContent.trim() === 'Show') {
                                            icon.classList.remove('fa-eye');
                                            icon.classList.add('fa-eye-slash');
                                            this.textContent = ' Hide';
                                            this.prepend(icon);  // Keep icon before the text
                                        } else {
                                            icon.classList.remove('fa-eye-slash');
                                            icon.classList.add('fa-eye');
                                            this.textContent = ' Show';
                                            this.prepend(icon);  // Keep icon before the text
                                        }
                                    });
                                </script>

                                <div class="container p-0">
                                    <div class="row align-items-center">
                                        <div class="col text-start">
                                            <div class="form-check">
                                                <input type="checkbox" name="remember" id="remember" class="form-check-input" />
                                                <label class="form-check-label" for="remember">Keep me logged in</label>
                                            </div>
                                        </div>
                                        <div class="col text-end">
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="g-recaptcha" data-sitekey="6LdhIWEqAAAAAAdl1VBf80M0KY3No8If3S4r_CkZ" data-callback="onSubmit"></div>

                                <button type="submit" name="login" class="btn btn-primary mt-4" >
                                    Log in
                                </button>

                                <p class="pt-4 terms-agreement">By accessing this education platform, you agree to the <a href="<?php echo esc_url(home_url('/terms-and-conditions')); ?>">Terms & Conditions</a> and acknowledge the <a href="<?php echo esc_url(home_url('/privacy-policy')); ?>">Privacy Policy</a></p>

                            </form>

                            <hr class="my-4 mt-5">

                            <div id="wp-login-google-login-button" style="display: flex;align-items: center;justify-content: center;flex-direction: column;">
                                <div style="margin: 10px 0;">Or, if you created your account with Google:</div>
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
