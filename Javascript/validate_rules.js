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
    $("form[name='sign_in']").validate({
        rules: {
            userName: {
                regex: /^[a-z]+$/,
                required: true,
                maxlength: 50
            },
            userPassword: {
                required: true,
                regex: /^[a-zA-Z0-9]*$/,
                minlength: 8,
                maxlength: 16
            }
        },
// Specify validation error messages
        messages: {
            userName: {
                required: "Maybe you forgot something ? (づ⚆ ͜ʖ⚆)づ ",
                regex : "TURN OFF CAPS LOCK AND REMOVE SPECIAL CHARS",
                maxlength: "Too long didn't read! LOL"
            },
            userPassword: {
                required: "You'll need a password ヽ(◉ᴥ◉)ﾉ",
                regex: "Use this regex ->  /^[a-zA-Z0-9]*$/",
                minlength: "Too short ^‿^",
                maxlength: "Too long (´•  ʖ̯ •`)"
            }
        }
    });
    $("form[name='sign_up']").validate({
        rules: {
            userName: {
                regex: /^[a-z]+$/,
                required: true,
                maxlength: 50
            },
            userEmail: {
                required: true,
                email: true,
                maxlength: 100
            },
            userBirthDate:{
                required: true
            },
            userPassword_A: {
                required: true,
                regex: /^[a-zA-Z0-9]*$/,
                minlength: 8,
                maxlength: 16
            },
            userPassword_B: {
                equalTo: "#userPassword_A"
            }
        },
// Specify validation error messages
        messages: {
            userName: {
                required: "Maybe you forgot something ? (づ⚆ ͜ʖ⚆)づ ",
                regex : "TURN OFF CAPS LOCK AND REMOVE SPECIAL CHARS",
                maxlength: "Too long didn't read! LOL"
            },
            userBirthDate:{
                required: "Tip of the day: use date picket to chose your birth date."
            },
            userEmail: {
                required: "Too short ^‿^",
                email : "That's not an Email address! (ᗒ ͟ʖᗕ)",
                maxlength: "Your mail is so long ( ͡° ͜ʖ ͡°)"
            },
            userPassword_A: {
                required: "You'll need a password ヽ(◉ᴥ◉)ﾉ",
                regex: "Use this regex ->  /^[a-zA-Z0-9]*$/",
                minlength: "Too short ^‿^",
                maxlength: "Too long, you wont remember it (´•  ʖ̯ •`)"
            },
            userPassword_B: {
                equalTo: "Dude ... You already forgot your passworld ? ಠ_ಠ"
            }
        }
    });
    $("form[name='update5']").validate({
        rules: {
            userEmail: {
                required: true,
                email: true,
                maxlength: 100
            },
            userBirthDate:{
                required: true
            },
            userPassword_A: {
                required: true,
                regex: /^[a-zA-Z0-9]*$/,
                minlength: 8,
                maxlength: 16
            },
            userPassword_B: {
                equalTo: "#userPassword_A"
            }
        },
// Specify validation error messages
        messages: {
            userBirthDate:{
                required: "Tip of the day: use date picket to chose your birth date."
            },
            userEmail: {
                required: "Too short ^‿^",
                email : "That's not an Email address! (ᗒ ͟ʖᗕ)",
                maxlength: "Your mail is so long ( ͡° ͜ʖ ͡°)"
            },
            userPassword_A: {
                required: "You'll need a new password ヽ(◉ᴥ◉)ﾉ",
                regex: "Use this regex ->  /^[a-zA-Z0-9]*$/",
                minlength: "Too short ^‿^",
                maxlength: "Too long, you wont remember it (´•  ʖ̯ •`)"
            },
            userPassword_B: {
                equalTo: "Dude ... You already forgot your new passworld ? ಠ_ಠ"
            }
        }
    });
    $("form[name='sign_up']").validate({
        rules: {
            userEmail: {
                required: true,
                email: true,
                maxlength: 100
            },
            userBirthDate:{
                required: true
            },
            userPassword_A: {
                required: true,
                regex: /^[a-zA-Z0-9]*$/,
                minlength: 8,
                maxlength: 16
            },
            userPassword_B: {
                equalTo: "#userPassword_A"
            }
        },
// Specify validation error messages
        messages: {
            userBirthDate:{
                required: "Tip of the day: use date picket to chose your birth date."
            },
            userEmail: {
                required: "Too short ^‿^",
                email : "That's not an Email address! (ᗒ ͟ʖᗕ)",
                maxlength: "Your mail is so long ( ͡° ͜ʖ ͡°)"
            },
            userPassword_A: {
                required: "You'll need a password ヽ(◉ᴥ◉)ﾉ",
                regex: "Use this regex ->  /^[a-zA-Z0-9]*$/",
                minlength: "Too short ^‿^",
                maxlength: "Too long, you wont remember it (´•  ʖ̯ •`)"
            },
            userPassword_B: {
                equalTo: "Dude ... You already forgot your passworld ? ಠ_ಠ"
            }

        }
    });
});