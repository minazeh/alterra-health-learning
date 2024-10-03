(function ($) {
	$(document).ready(function () {
		Fancybox.bind('[data-fancybox]', {
			groupAttr: 'data-fancy-group',
		});
	});
})(jQuery);

(function () {
	'use strict';

	// Fetch all the forms we want to apply custom Bootstrap validation styles to
	const forms = document.querySelectorAll('.needs-validation');

	// Loop over them and prevent submission if invalid
	Array.prototype.slice.call(forms).forEach(function (form) {
		form.addEventListener(
			'submit',
			function (event) {
				// Custom password matching validation
				const password = document.getElementById('reg_password').value;
				const confirmPassword =
					document.getElementById('reg_password2').value;

				if (password !== confirmPassword) {
					document
						.getElementById('reg_password2')
						.setCustomValidity('Passwords do not match.');
				} else {
					document
						.getElementById('reg_password2')
						.setCustomValidity('');
				}

				if (!form.checkValidity()) {
					event.preventDefault();
					event.stopPropagation();
				}

				form.classList.add('was-validated');
			},
			false
		);
	});
})();
