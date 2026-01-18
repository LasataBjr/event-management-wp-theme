console.log('CONTACT AJAX LOADED');
jQuery(document).ready(function ($) {

    $('#ajax-contact-form').on('submit', function (e) {
        e.preventDefault();

        let form = $(this);
        let responseBox = $('#form-response');

        $.ajax({
            url: contactAjax.ajax_url,
            type: 'POST',
            data: form.serialize(),
            beforeSend: function () {
                responseBox.text('Sending...').removeClass().addClass('text-gray-600');
            },
            success: function (response) {
                if (response.success) {
                    responseBox.text(response.data).removeClass().addClass('text-green-600');
                    form[0].reset();
                } else {
                    responseBox.text(response.data).removeClass().addClass('text-red-600');
                }
            },
            error: function () {
                responseBox.text('Something went wrong.').removeClass().addClass('text-red-600');
            }
        });
    });

});
