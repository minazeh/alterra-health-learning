<?php
/**
 * Template for displaying global login form.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/global/form-register.php.
 *
 * @author   ThimPress
 * @package  Learnpress/Templates
 * @version  4.0.0
 */

defined( 'ABSPATH' ) || exit();
?>

<div class="learn-press-form-register learn-press-form">

	<h3><?php echo esc_html_x( 'Register', 'register-heading', 'learnpress' ); ?></h3>

	<?php do_action( 'learn-press/before-form-register' ); ?>

	<form name="learn-press-register" method="post" action="" class="needs-validation" novalidate>

		<ul class="form-fields">

			<?php do_action( 'learn-press/before-form-register-fields' ); ?>

			<li class="form-field">
				<label for="reg_email"><?php esc_html_e( 'Email address', 'learnpress' ); ?>&nbsp;<span class="required">*</span></label>
				<input id="reg_email" name="reg_email" type="email" placeholder="<?php esc_attr_e( 'Email', 'learnpress' ); ?>" autocomplete="email" value="<?php echo esc_attr( LP_Helper::sanitize_params_submitted( $_POST['reg_email'] ?? '' ) ); ?>" required class="form-control">
				<div class="invalid-feedback">
					Please enter a valid email address.
				</div>
			</li>

			<li class="form-field">
				<label for="reg_username"><?php esc_html_e( 'Username', 'learnpress' ); ?>&nbsp;<span class="required">*</span></label>
				<input id="reg_username" name="reg_username" type="text" placeholder="<?php esc_attr_e( 'Username', 'learnpress' ); ?>" autocomplete="username" value="<?php echo esc_attr( LP_Helper::sanitize_params_submitted( $_POST['reg_username'] ?? '' ) ); ?>" required class="form-control">
				<div class="invalid-feedback">
					Please enter a username.
				</div>
			</li>

			<li class="form-field">
				<label for="reg_password"><?php esc_html_e( 'Password', 'learnpress' ); ?>&nbsp;<span class="required">*</span></label>
				<input id="reg_password" name="reg_password" type="password" placeholder="<?php esc_attr_e( 'Password', 'learnpress' ); ?>" autocomplete="new-password" required class="form-control" minlength="6">
				<div class="invalid-feedback">
					Password must be at least 6 characters long.
				</div>
			</li>

			<li class="form-field">
				<label for="reg_password2"><?php esc_html_e( 'Confirm Password', 'learnpress' ); ?>&nbsp;<span class="required">*</span></label>
				<input id="reg_password2" name="reg_password2" type="password" placeholder="<?php esc_attr_e( 'Password', 'learnpress' ); ?>" autocomplete="off" required class="form-control">
				<div class="invalid-feedback">
					Passwords do not match.
				</div>
			</li>

			<?php do_action( 'learn-press/after-form-register-fields' ); ?>
		</ul>

		<p class="form-row">
			<label for="terms_conditions">
				<input type="checkbox" id="terms_conditions" name="terms_conditions" value="1" required>
				I agree to the <a href="<?php echo get_permalink_by_slug('terms-and-conditions'); ?>" class="terms-conditions" target="_blank">Terms and Conditions</a>
			</label>
			<div class="invalid-feedback">
				You must agree to the terms and conditions.
			</div>
		</p>

		<?php do_action( 'register_form' ); ?>

		<p>
			<?php wp_nonce_field( 'learn-press-register', 'learn-press-register-nonce' ); ?>
			<button type="submit" class="btn btn-primary"><?php esc_html_e( 'Register', 'learnpress' ); ?></button>
		</p>

	</form>

	<?php do_action( 'learn-press/after-form-register' ); ?>

</div>
