    /*-------------------------
        Ajax Contact Form 
    ---------------------------*/
    $(function() {
        //X-CSRF-TOKEN
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // Get the form.
        var form = $('#contact-form');
        // Set up an event listener for the contact form.
        $(form).submit(function(e) {
            // Stop the browser from submitting the form.
            e.preventDefault();
            var hasError = false;
            // Get the messages div.
            var formMessages = $('.form-message');
            $(formMessages).removeClass('error');
            $('.fieldError').removeClass('fieldError');
            $('#contact-form .form-control').each(function() {
                if (jQuery.trim($(this).val()) === '') {
                    $(formMessages).addClass('error').html("Veuillez renseigner tous les champs !");
                    $(this).addClass('fieldError');
                    hasError = true;
                }
            });
            if(!hasError){
                $('#contact-form .email').each(function() {
                    var value = jQuery.trim($(this).val());
                    var regex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                    if (!regex.test(value)) {
                        $(formMessages).addClass('error').html("Adresse e-mail non valide.");
                        $(this).addClass('fieldError');
                        hasError = true;
                    }
                });
            }
            if(!hasError){
                // Submit the form using AJAX.
                $.ajax({
                    type: 'POST',
                    url: '/sendmail',
                    data: $(form).serialize(),
                    beforeSend: function(){
                        $('.submit-btn').addClass('not-active').html('<i class="fa fa-spinner fa-pulse"></i> Patienter...');
                    },
                    success:function(response) {
                        var splitter = response.split('|');
                        if (splitter[0] != 0) {
                            if(splitter[0] == 1){
                                var hasError = 'success';
                                var hasTitle = 'Félicitation !';
                            }else{
                                var hasError = 'error';
                                var hasTitle = 'Echec !';
                            }
                            swal.fire({
                                title: hasTitle,
                                text: splitter[1],
                                icon: hasError,
                                buttonsStyling: false,
                                confirmButtonText: 'Fermer',
                                customClass: {
                                    confirmButton: "theme-btn btn-sm"
                                }
                            }).then(function(){
                                location.reload();
                            });
                        } else {
                            $(splitter[2]).addClass('fieldError');
                            $(formMessages).addClass('error').html(splitter[1]);
                            $('.submit-btn').removeClass('not-active').html('Envoyer message <i class="far fa-paper-plane"></i>');
                        }
                    }
                });
            }
        });
    });
