// Add your JS customizations here

jQuery(document).ready(function($) {
    $('#toggle-button').on('click', function() {
        var expanded = $(this).attr('aria-expanded') === 'true';
        $(this).attr('aria-expanded', !expanded);
        $('#navbarNavDropdown').toggleClass('show', !expanded);
    });
});




