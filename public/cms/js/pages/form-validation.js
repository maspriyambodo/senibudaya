'use strict';
$(document).ready(function() {
    $(function() {
        // [ Add phone validator ]
        $.validator.addMethod(
            'phone_format',
            function(value, element) {
                return this.optional(element) || /^\(\d{3}\)[ ]\d{3}\-\d{4}$/.test(value);
            },
            'Invalid phone number.'
        );

        // [ Initialize validation ]
        $('.needs-validation').validate({
            ignore: '.ignore, .select2-input',
            focusInvalid: false,
            
            // Errors //
            errorPlacement: function errorPlacement(error, element) {
				/*
                var $parent = $(element).parents('.form-group');

                // Do not duplicate errors
                if ($parent.find('.jquery-validation-error').length) {
                    return;
                }

                $parent.append(
                    error.addClass('jquery-validation-error small form-text invalid-feedback')
                );
				*/
            },
            highlight: function(element) {
                var $el = $(element);
				if($('.text-validation').html().trim().length < 1){
					var $parent = $el.parents('.form-group');
					$('.text-validation').html("<i class='fas fas fa-exclamation'></i> " + $el.attr('oninvalid'));
					$el.addClass('is-invalid');
					$el.focus();
					
					$el.keyup(function() {
						if($el.val().length > 0){
							$(".text-validation").html('');
							$el.removeClass('is-invalid');
						}
					});
					
					$el.change(function() {
						if($el.val().length > 0){
							$(".text-validation").html('');
							$el.removeClass('is-invalid');
						}
					});
					
					// Select2 and Tagsinput
					if ($el.hasClass('select2-hidden-accessible') || $el.attr('data-role') === 'tagsinput') {
						$el.parent().addClass('is-invalid');
					}
				}
            },
            unhighlight: function(element) {
                $(element).parents('.form-group').find('.is-invalid').removeClass('is-invalid');
            }
        });
		
		$('.checks-validation').validate({
            ignore: '.ignore, .select2-input',
            focusInvalid: false,
            
            // Errors //
            errorPlacement: function errorPlacement(error, element) {
				/*
                var $parent = $(element).parents('.form-group');

                // Do not duplicate errors
                if ($parent.find('.jquery-validation-error').length) {
                    return;
                }

                $parent.append(
                    error.addClass('jquery-validation-error small form-text invalid-feedback')
                );
				*/
            },
            highlight: function(element) {
                var $el = $(element);
				if($('.text-validation').html().trim().length < 1){
					var $parent = $el.parents('.form-group');
					$('.text-validation').html("<i class='fas fas fa-exclamation'></i> " + $el.attr('oninvalid'));
					$el.addClass('is-invalid');
					$el.focus();
					
					$el.keyup(function() {
						if($el.val().length > 0){
							$(".text-validation").html('');
							$el.removeClass('is-invalid');
						}
					});
					
					$el.change(function() {
						if($el.val().length > 0){
							$(".text-validation").html('');
							$el.removeClass('is-invalid');
						}
					});
					
					// Select2 and Tagsinput
					if ($el.hasClass('select2-hidden-accessible') || $el.attr('data-role') === 'tagsinput') {
						$el.parent().addClass('is-invalid');
					}
				}
            },
            unhighlight: function(element) {
                $(element).parents('.form-group').find('.is-invalid').removeClass('is-invalid');
            }
        });
    });
});
