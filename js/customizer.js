wp.customize('alterra_learning_primary_color', function(value) {
    value.bind(function(newval) {
        document.documentElement.style.setProperty('--primary-color', newval);
    });
});

wp.customize('alterra_learning_secondary_color', function(value) {
    value.bind(function(newval) {
        document.documentElement.style.setProperty('--secondary-color', newval);
    });
});
