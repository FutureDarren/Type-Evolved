$(function(){

    $('#register-form').validate({
        rules: {
            email: {
                required: true,
                email: true,
                remote: {
                    url: 'includes/emailCheck.php',
                    type: 'post',
                    data: {
                        email: function(){
                            return $('#email').val();
                        }
                    }
                }
            },
            username: {
              required: true,
              minlength: 6
            },
            password: {
                required: true,
                pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/,
            },
            passwordConfirm: {
                required: true,
                equalTo: '#password'
            }
        },
        messages: {
            email: {
                required: 'Email cannot be empty.',
                email: 'Please enter a valid email address.',
                remote: 'An account using this email already exists.'
            },
            username: {
                required: 'Username cannot be empty.',
                minlength: 'Username must be at least 6 characters long.'
            },
            password: {
                required: 'Password cannot be empty.',
                pattern: 'Password must be at least 8 characters long, and contain at least 1 uppercase letter, 1 lowercase letter, and 1 digit.'
            },
            passwordConfirm: {
                required: 'Password cannot be empty.',
                equalTo: 'Passwords do not match.'
            }
        }
    });

    $('#login-form').validate({
       rules: {
           email: {
               required: true,
               email: true,
           },
           password: {
               required: true
           }
       },
       messages: {
           email: {
               required: 'Email cannot be empty.',
               email: 'Invalid email.'
           },
           password: {
                required: 'Password cannot be empty.'
           }
        }
    });

    $('#review-form').validate({
        rules: {
            textarea: {
                required: true
            }
        },
        messages: {
            textarea: {
                required: 'Review cannot be empty.'
            }
        }
    });

    $('#contact-form').validate({
       rules : {
           email:{
             required: true,
               email: true
           },
           subject: {
               required: true
           },
           message: {
               required: true
           }
       },
        messages:{
           email: {
               required: 'Email cannot be empty.',
               email: 'Invalid Email.'
           },
            subject: {
               required: 'Subject cannot be empty.'
            },
            message: {
               required: 'Message cannot be empty.'
            }
        }
    });

});