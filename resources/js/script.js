// Resize reCAPTCHA to fit a specific size. We're scaling using CSS3 transforms ||| captchaScale = containerWidth / elementWidth

function scaleCaptcha(elementWidth) {
    // Width of the reCAPTCHA element | 640
    var reCaptchaWidth = 800;
    // Get the containing element's width
      var containerWidth = $('.container').width();

    // Only scale the reCAPTCHA if it won't fit inside the container
    if(reCaptchaWidth > containerWidth) {
      // Calculate the scale
      var captchaScale = containerWidth / reCaptchaWidth;
      // Apply the transformation
      $('.g-recaptcha').css({
        'transform':'scale('+captchaScale+')'
      });
    }
  }

  $(function() {

    // Initialize scaling
    scaleCaptcha();

    // Update scaling on window resize
    // Uses jQuery throttle plugin to limit strain on the browser
    $(window).resize( $.throttle( 100, scaleCaptcha ) );
  });

  document.addEventListener("DOMContentLoaded", function() {
    const errorMessage = document.getElementById('error-message');
    if (errorMessage) {
        setTimeout(() => {
            errorMessage.classList.add('opacity-0');
        }, 4000);
    }
});

document.addEventListener("DOMContentLoaded", function() {
    const errorMessages = document.querySelectorAll('.error-message');
    const fields = {
        first_name: document.getElementById('first_name'),
        last_name: document.getElementById('last_name'),
        email: document.getElementById('email'),
        password: document.getElementById('password'),
        confirm_password: document.getElementById('confirm_password'),
        captcha: document.querySelector('.g-recaptcha'),
    };

    errorMessages.forEach((errorMessage) => {
        setTimeout(() => {
            errorMessage.classList.add('opacity-0');

            // Reset red border for each field
            if (errorMessage === fields.first_name.nextElementSibling) {
                fields.first_name.classList.remove('border-red-500');
            }
            if (errorMessage === fields.last_name.nextElementSibling) {
                fields.last_name.classList.remove('border-red-500');
            }
            if (errorMessage === fields.email.nextElementSibling) {
                fields.email.classList.remove('border-red-500');
            }
            if (errorMessage === fields.password.nextElementSibling) {
                fields.password.classList.remove('border-red-500');
            }
            if (errorMessage === fields.confirm_password.nextElementSibling) {
                fields.confirm_password.classList.remove('border-red-500');
            }
            if (errorMessage === fields.captcha.nextElementSibling) {
                fields.captcha.classList.remove('border-red-500');
            }
        }, 4000);
    });
});

