    /*-------------------------
        Ajax Contact Form 
    ---------------------------*/
    //Nombre entier
    function verif_num(champ) {
        var chiffres = new RegExp('[0-9]');
        for(x = 0; x < champ.value.length; x++) {
            verif = chiffres.test(champ.value.charAt(x));
            if (verif == false) {
            champ.value = champ.value.substr(0,x) + champ.value.substr(x+1,champ.value.length-x+1); x--;
            }
        }
    }
    $(function() {
        //X-CSRF-TOKEN
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // Cart item count
        function countcart(token) {
            $.ajax({
                type: 'POST',
                data: {token:token},
                url: '/countcart',
                success: function(response) {
                    $('#shopcart').html(response);
                }
            });
        }
        countcart($('meta[name="csrf-token"]').attr('content'));
        //View Password
        $('.shopcart').on('click', function(e){
            // Stop the browser from submitting the form.
            e.preventDefault();
            let token = $('meta[name="csrf-token"]').attr('content');
            let datasT = {id:$(this).attr('data-id'), token:token};
            $.ajax({
                type: 'POST',
                data: datasT,
                url: '/confirmcart',
                success: function(response) {
                    let splitter = response.split('|');
                    let titre = splitter[0] + " - " + splitter[1];
                    Swal.fire({
                        title: titre,
                        text: "Veuillez confirmer l'ajout de cet article au panier !",
                        imageUrl: splitter[2],
                        imageHeight: 200,
                        imageAlt: titre,
                        confirmButtonColor: "#28A745",
                        cancelButtonColor: "#D33",
                        confirmButtonText: "Confirmer",
                        cancelButtonText: "Annuler",
                        showCancelButton: true,
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: 'POST',
                                data: datasT,
                                url: '/validcart',
                                success: function(response) {
                                    let splitter = response.split('|');
                                    Swal.fire({
                                        title: titre,
                                        text: splitter[1],
                                        icon: splitter[0]
                                    });
                                }
                            });
                            countcart(token);
                        }
                    });
                }
            });
        });
        // Set up an event listener for the contact form.
        $(".submit-btn").on("click", function (e) {
            // Stop the browser from submitting the form.
            e.preventDefault();
            // Get the form.
            var form = $('#contact-form');
            var hasError = false;
            // Get the messages div.
            var formbtn = $('.submit-btn');
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
            if (!hasError) {
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
            if (!hasError) {
                // Submit the form using AJAX.
                $.ajax({
                    type: 'POST',
                    url: '/sendmail',
                    data: $(form).serialize(),
                    beforeSend: function() {
                        $(formbtn).addClass('not-active').html('<i class="fa fa-spinner fa-pulse"></i> Patienter...');
                    },
                    success:function(response) {
                        var splitter = response.split('|');
                        if (splitter[0] != 0) {
                            if (splitter[0] == 1) {
                                var hasError = 'success';
                                var hasTitle = 'Félicitation !';
                            } else {
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
                            }).then(function() {
                                location.reload();
                            });
                        } else {
                            $(splitter[2]).addClass('fieldError');
                            $(formMessages).addClass('error').html(splitter[1]);
                            $(formbtn).removeClass('not-active').html('Envoyer message <i class="far fa-paper-plane"></i>');
                        }
                    }
                });
            }
        });
        // Set up an event listener for the contact form.
        $(".submit-cmd").on("click", function (e) {
            // Stop the browser from submitting the form.
            e.preventDefault();
            // Get the form.
            var form = $('#shopcart-form');
            var hasError = false;
            // Get the messages div.
            var formbtn = $('.submit-cmd');
            var formMessages = $('.form-message');
            $(formMessages).removeClass('error');
            $('.fieldError').removeClass('fieldError');
            $('#shopcart-form .form-control').each(function() {
                if (jQuery.trim($(this).val()) === '') {
                    $(formMessages).addClass('error').html("Veuillez renseigner tous les champs !");
                    $(this).addClass('fieldError');
                    hasError = true;
                }
            });
            if (!hasError) {
                $('#shopcart-form .number').each(function() {
                    var value = jQuery.trim($(this).val());
                    var regex = /^[0-9\s]*$/;
                    if (!regex.test(value)) {
                        $(formMessages).addClass('error').html("Numéro de téléphone.");
                        $(this).addClass('fieldError');
                        hasError = true;
                    }
                });
            }
            if (!hasError) {
                $('#shopcart-form .email').each(function() {
                    var value = jQuery.trim($(this).val());
                    var regex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                    if (!regex.test(value)) {
                        $(formMessages).addClass('error').html("Adresse e-mail non valide.");
                        $(this).addClass('fieldError');
                        hasError = true;
                    }
                });
            }
            if (!hasError) {
                // Submit the form using AJAX.
                $.ajax({
                    type: 'POST',
                    url: '/shopcart',
                    data: $(form).serialize(),
                    beforeSend: function() {
                        $(formbtn).addClass('not-active').html('<i class="fa fa-spinner fa-pulse"></i> Patienter...');
                    },
                    success:function(response) {
                        var splitter = response.split('|');
                        if (splitter[0] != 0) {
                            if (splitter[0] == 1) {
                                var hasError = 'success';
                                var hasTitle = 'Félicitation !';
                            } else {
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
                            }).then(function() {
                                location.reload();
                            });
                        } else {
                            $(splitter[2]).addClass('fieldError');
                            $(formMessages).addClass('error').html(splitter[1]);
                            $(formbtn).removeClass('not-active').html('Valider la commande <i class="far fa-paper-plane"></i>');
                        }
                    }
                });
            }
        });
        // Set up an event listener for the contact form.
        $(".cart-remove").on("click", function (e) {
            // Stop the browser from submitting the form.
            e.preventDefault();
            let id = $(this).attr('data-id');
            let datasT = {id:$(this).attr('data-img')};
            $.ajax({
                type: 'POST',
                data: datasT,
                url: '/confirmcart',
                success: function(response) {
                    let splitter = response.split('|');
                    let titre = splitter[0] + " - " + splitter[1];
                    Swal.fire({
                        title: titre,
                        text: "Veuillez confirmer la suppression de cet article !",
                        imageUrl: splitter[2],
                        imageHeight: 200,
                        imageAlt: titre,
                        confirmButtonColor: "#28A745",
                        cancelButtonColor: "#D33",
                        confirmButtonText: "Confirmer",
                        cancelButtonText: "Annuler",
                        showCancelButton: true,
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Submit the form using AJAX.
                            $.ajax({
                                type: 'DELETE',
                                url: '/delshopcart/' + id,
                                beforeSend: function() {
                                    $('.submit-cmd').addClass('not-active').html('<i class="fa fa-spinner fa-pulse"></i> Patienter...');
                                },
                                success:function(response) {
                                    var splitter = response.split('|');
                                    if (splitter[0] == 1) {
                                        var hasError = 'success';
                                        var hasTitle = 'Félicitation !';
                                    } else {
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
                                    }).then(function() {
                                        location.reload();
                                    });
                                }
                            });
                        }
                    });
                }
            });
        });
    });
