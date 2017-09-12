/**
 * Created by Tortumine on 19-08-17.
 */
$(document).ready(function() {

    $.validator.addMethod(
        "regex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        },
        "Please check your input."
    );
    $("form[name='sign_up']").validate({
        rules: {
            userName: {
                regex: /^[a-z]+$/,
                required: true,
                maxlength: 50
            },
            userEmail: {
                required: true,
                email: true
            },
            userBirthDate:{
                required: true
            },
            userPassword_A: {
                required: true,
                regex: /^[a-zA-Z0-9]*$/,
                minlength: 8,
                maxlength: 16
            }
        },
// Specify validation error messages
        messages: {
            userName: {
                required: "Fournissez un login !",
                regex : "Le login ne peut être composé que de minuscules",
                maxlength: "Un login ne doit pas dépasser 50 caractères"
            },
            userPassword_A: {
                required: "Fournissez un mot de passe !",
                regex: "Le mot de passe ne peut être composé que de lettres ou de chiffres",
                minlength: "Votre mot de passe doit être d'au moins 8 caractères",
                maxlength: "Votre mot de passe doit être d'au plus 16 caractères"
            },
            submitHandler: function(form) {
                form.submit();
            }
        }
    });
});