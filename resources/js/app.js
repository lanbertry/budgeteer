import Chart from 'chart.js/auto';
import './bootstrap';
import 'flowbite';
import '@fortawesome/fontawesome-free/js/fontawesome';
import '@fortawesome/fontawesome-free/js/solid';
window.Chart = Chart;

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


