$(function() {

  $("form[id='login_validation']").validate({
    // Specify validation rules
    rules: {
      username: {
        required: true,
      },
      password: {
        required: true,
        minlength: 6
      }
    },
    // Specify validation error messages
    messages: {
      username: {
        required: "Please enter username",
        minlength: "Your password must be at least 5 characters long"
      },
      password: {
        required: "Please enter password",
        minlength: "Your password must be at least 6 characters long"
      }
    },
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });

  $("form[id='signup_validation']").validate({
    // Specify validation rules
    rules: {
      username: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 6
      }
    },
    // Specify validation error messages
    messages: {
      username: {
        required: "Please enter username",
        minlength: "Your password must be at least 5 characters long",
      },
      email: {
        required: "Please enter email",
        email: "Please enter a valid email",
      },
      password: {
        required: "Please enter password",
        minlength: "Your password must be at least 6 characters long"
      }
    },
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });

  $("form[id='update_validation']").validate({
    // Specify validation rules
    rules: {
      username2: {
        required: true,
      },
      email2: {
        required: true,
        email: true,
      },
      password2: {
        required: true,
        minlength: 6
      }
    },
    // Specify validation error messages
    messages: {
      username2: {
        required: "Please enter username",
        minlength: "Your password must be at least 5 characters long",
      },
      email2: {
        required: "Please enter email",
        email: "Please enter a valid email",
      },
      password2: {
        required: "Please enter password",
        minlength: "Your password must be at least 6 characters long"
      }
    },
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });

});