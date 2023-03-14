//* passenger register
$(document).ready(function() {
    $('#passenger-form').validate({
        rules: {
            confirm_password: {
                equalTo: '#password'
            }
        }
    });

    $('#passenger_submit').click(function(e) {
        if (document.querySelector('#passenger_form').checkValidity()) {
            e.preventDefault();
            $('#passenger_submit').attr('disabled', true);
            $.ajax({
                url: './modules/create-account/process.php',
                method: 'post',
                data: $('#passenger_form').serialize() + '&action=passenger_form',
                success: function(res) {
                    console.log(res);
                    if (res == 'Error') {
                        $('#res-icon').val("");
                        $('#res-message').html("");
                        $('.alert').removeClass('alert-success');
                        $('.alert').addClass('alert-danger');
                        $('#res-icon').html("<i class='fa fa-exclamation-circle'></i>");
                        $('#res-message').html("Email or Username already exist! Please try another.");
                        $('.alert').show();
                        setTimeout(function() {
                            $('.alert').fadeOut(3000);
                        }, 1000);
                    } else {
                        $('#res-icon').val("");
                        $('#res-message').html("");
                        $('.alert').removeClass('alert-danger');
                        $('.alert').addClass('alert-success');
                        $('#res-icon').html("<i class='fa fa-check-circle'></i>");
                        $('#res-message').html("Registered Successfully!");
                        $('.alert').show(80);
                        setTimeout(function() {
                            setTimeout(function() {
                                $('.alert').fadeOut(3000);
                            }, 1000);
                            $('#fname').val('');
                            $('#mi').val('');
                            $('#lname').val('');
                            $('#gender').val('');
                            $('#type').val('');
                            $('#dob').val('');
                            $('#email').val('');
                            $('#uname').val('');
                            $('#Address').val('');
                            $('#phone').val('');
                            $('#password').val('');
                            $('#confirm_password').val('');
                        }, 100);
                        setTimeout(function() {
                            window.location = "https://barkomatic.online/login.php";
                        }, 100);
                    }
                    $('#passenger_submit').attr('disabled', false);
                }
            });
        }
    });
});

//* ship owner register 
$(document).ready(function() {
    $('#shipping-form').validate({
        rules: {
            cpass: {
                equalTo: '#pass'
            }
        }
    });
    $('#shipping-submit').click(function(e) {
        if (document.querySelector('#shipping-form').checkValidity()) {
            e.preventDefault();
            $('#shipping-submit').attr('disabled', true);
            $.ajax({
                url: './modules/create-account/process.php',
                method: 'post',
                data: $('#shipping-form').serialize() + '&action=shipping_form',
                success: function(res) {
                    if (res == "already exist! Please try another.") {
                        $('#res-icon').val("");
                        $('#res-message').html("");
                        $('.alert').removeClass('alert-success');
                        $('.alert').addClass('alert-danger');
                        $('#res-icon').html("<i class='fa fa-exclamation-circle'></i>");
                        $('#res-message').html("Email, username or Shipname already Exist!");
                        $('.alert').show(80);
                        setTimeout(function() {
                            $('.alert').fadeOut(3000);
                        }, 2000);
                    } else {
                        $('#res-icon').val("");
                        $('#res-message').html("");
                        $('.alert').removeClass('alert-danger');
                        $('.alert').addClass('alert-success');
                        $('#res-icon').html("<i class='fa fa-check-circle'></i>");
                        $('#res-message').html("Registered Successfully.");
                        $('.alert').show(80);
                        setTimeout(function() {
                            $('.alert').fadeOut(3000);
                            $('#scn').val('');
                            $('#email-shipping').val('');
                            $('#uname-shipping').val('');
                            $('#shippingAddress').val('');
                            $('#name-shipping').val('');
                            $('#pass').val('');
                            $('#cpass').val('');
                        }, 100);
                        setTimeout(function() {
                            window.location = "https://barkomatic.online/login.php";
                        }, 100);
                    }
                    console.log(res);
                    $('#shipping-submit').attr('disabled', false);
                }
            });
        }
    });
});