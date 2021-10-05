$(function() {
    'use strict';

    // Default
    $('.repeater-default').repeater();

    // Custom Show / Hide Configurations
    $('.file-repeater, .email-repeater, .form-repeater').repeater({
        show: function() {
            $(this).slideDown();
        },
        hide: function(remove) {
            $(this).slideUp(remove);
        }
    });


});