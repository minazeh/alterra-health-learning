jQuery(document).ready(function ($) {
	// Check if "library" is present in the URL
	if (window.location.href.indexOf('library') === -1) {
		return; // Exit if "library" is not in the URL
	}

	var page = 2; // Start with page 2 since 1st page is already loaded
	var loading = false;

	// Function to check if the URL has the search query
	function hasSearchQuery() {
		var urlParams = new URLSearchParams(window.location.search);
		return (
			urlParams.has('search_query') &&
			urlParams.get('search_query') !== ''
		);
	}

	// If there is a search query, don't trigger AJAX
	if (hasSearchQuery()) {
		console.log('Search query detected, skipping AJAX infinite scroll.');
		return; // Exit the script to prevent AJAX loading
	}

	$(window).scroll(function () {
		if (loading) return;

		// Check if near the bottom of the page
		if (
			$(window).scrollTop() + $(window).height() >=
			$(document).height() - 200
		) {
			console.log('Bottom reached, loading more posts...'); // Debugging

			loading = true;

			$.ajax({
				url: ajax_vars.ajax_url,
				type: 'POST',
				data: {
					action: 'load_more_posts',
					page: page,
					search_query: $('input[name="search_query"]').val(), // Pass the search query if applicable
				},
				success: function (response) {
					console.log('Response received:', response); // Debugging

					if (response) {
						$('.ajax-content').append(response); // Append new posts
						page++; // Increment page count
						loading = false; // Reset loading flag
					} else {
						console.log('No more posts to load.'); // Debugging
						loading = true; // Stop loading when no more posts
					}
				},
				error: function (xhr, status, error) {
					console.log('AJAX Error:', error); // Debugging
					loading = false; // Reset loading flag
				},
			});
		}
	});
});
