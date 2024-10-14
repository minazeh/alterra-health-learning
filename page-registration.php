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
    $phone_number = sanitize_text_field($_POST['phone_number']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ( empty($first_name) || empty($last_name) || empty($email) || empty($phone_number) || empty($password) || empty($confirm_password) ) {
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

            if ($_POST['g-recaptcha-response']) {
                $secret = '6LdhIWEqAAAAAC9YJemjIpCwX0vLw9zfKSWvxKCE';
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

            // Save phone number to user meta
            update_user_meta($user_id, 'phone_number', $phone_number);
            
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
                    <h1 class="my-5 display-6 fw-bold ls-tight">
                        <?php the_field('registration_header'); ?>
                    </h1>
                    <p style="font-size: 1.4rem;">
                        <?php the_field('registration_text'); ?>
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card">
                        <div class="card-body py-5 px-md-5">
                            <h2 class="mb-3">Sign up</h2>
                            <p class="terms-agreement">Create an account or <a href="<?php echo esc_url(home_url('/login')); ?>" class="">log in</a></p>

                            <script type="text/javascript">
                                jQuery("#wp-login-google-login-button").appendTo("#loginform");
                            </script>
                            
                            <form class="mt-4" id="registrationForm" method="post">
                                <div class="form-floating mb-4">
                                    <input type="text" name="first_name" id="first_name" class="form-control" required />
                                    <label for="first_name">First name</label>
                                </div>

                                <div class="form-floating mb-4">
                                    <input type="text" name="last_name" id="last_name" class="form-control" required />
                                    <label for="last_name">Last name</label>
                                </div>

                                <div class="form-floating mb-4">
                                    <input type="email" name="email" id="email" class="form-control" required />
                                    <label for="email">Email address</label>
                                </div>

                                <!-- Phone number field -->
                                <div class="form-floating mb-4">
                                    <input type="tel" name="phone_number" id="phone_number" class="form-control" required />
                                    <label for="phone_number">Phone number</label>
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

                                <div class="form-floating">
                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" required />
                                    <label for="confirm_password">Confirm password</label>
                                </div>

                                <p class="pt-4 terms-agreement mb-4">I agree to the <a href="<?php echo esc_url(home_url('/terms-and-conditions')); ?>">Terms & Conditions</a> and acknowledge the <a href="<?php echo esc_url(home_url('/privacy-policy')); ?>">Privacy Policy</a> of this education platform.</p>

                                <div class="g-recaptcha" data-sitekey="6LdhIWEqAAAAAAdl1VBf80M0KY3No8If3S4r_CkZ" data-callback="onSubmit"></div>

                                <button type="submit" name="register" class="btn btn-primary btn-block">Sign up</button>
                            </form>

                            <hr class="my-4 mt-5">

                            <div id="wp-login-google-login-button" style="display: flex;align-items: center;justify-content: center;flex-direction: column;">
                                <div style="margin: 10px 0;">Or, create an account with Google</div>
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

<script>
    document.getElementById('phone_number').addEventListener('input', function (e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
        e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
    });
</script>

<?php ob_end_flush(); get_footer(); ?>