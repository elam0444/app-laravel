$(function () {
    signUpListener();
});

function signUpListener() {
    $('form#sign-up').on('submit', function (event) {
        event.preventDefault();

        var $submitButton = $(this).find('input[type="submit"]');
        var $form = $(this);
        var $alertSection = $('div#alerts-section');

        var formData = new FormData();

        var data = $form.serializeArray();
        $.each(data, function (key, input) {
            formData.append(input.name, input.value);
        });

        $alertSection.empty();

        jQuery.each($("div.has-error"), function () {
            $(this).removeClass("has-error");
        });

        $submitButton.attr('disabled', true);

        $.ajax({
            url: $form.attr('action'),
            data: formData,
            processData: false,
            contentType: false,
            type: $form.attr('method')
        }).done(function (response) {

            if (response.status === 'success') {
                $form.trigger("ajaxForm:success");
                $alertSection.append(bootstrapAlertHTML('success', true, response.message));

                setTimeout(function () {
                    window.location.href = $form.data('redirect-success');
                }, 2000);
            }
            else if (response.status === 'error') {
                var message = response.message;
                if (response.data) {
                    message += '<br>';
                    jQuery.each(response.data, function (index, value) {
                        index = index.toString();
                        index = index.replace('[', '\\[').replace(']', '\\]');
                        $("input[name=" + index + ']').parent().addClass('has-error');
                        $("select[name=" + index + ']').parent().addClass('has-error');
                        message += value + '<br>';
                    });
                }

                $alertSection.append(bootstrapAlertHTML('danger', true, message));

                $submitButton.attr('disabled', false);
            }
        }).fail(function () {
            $alertSection.append(bootstrapAlertHTML('danger', true, "Server error."));

            $submitButton.attr('disabled', false);
        });
    });
}