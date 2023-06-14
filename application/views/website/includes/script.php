<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://kit.fontawesome.com/7a5f62375d.js" crossorigin="anonymous"></script>
<!-- Facebook Pixel Code -->
<script>
  ! function(f, b, e, v, n, t, s) {
    if (f.fbq) return;
    n = f.fbq = function() {
      n.callMethod ?
        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
    };
    if (!f._fbq) f._fbq = n;
    n.push = n;
    n.loaded = !0;
    n.version = '2.0';
    n.queue = [];
    t = b.createElement(e);
    t.async = !0;
    t.src = v;
    s = b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t, s)
  }(window, document, 'script',
    'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '254591690063980');
  fbq('track', 'PageView');
</script>

<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=254591690063980&ev=PageView&noscript=1" /></noscript>
<!-- End Facebook Pixel Code -->


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-6SL67YJRSN"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());

  gtag('config', 'G-6SL67YJRSN');
</script>
<!--<script async src='https://stackwhats.com/pixel/5a604892873e5d470546e5425ed78f'></script>-->

  <script src="<?php echo base_url(); ?>assets/website/js/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/website/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/website/js/bootstrap-select.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/website/js/jquery.bootstrap-touchspin.js"></script>
  <script src="<?php echo base_url(); ?>assets/website/js/magnific-popup.js"></script>
  <script src="<?php echo base_url(); ?>assets/website/js/waypoints-min.js"></script>
  <script src="<?php echo base_url(); ?>assets/website/js/counterup.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/website/js/imagesloaded.js"></script>
  <script src="<?php echo base_url(); ?>assets/website/js/masonry.js"></script>
  <script src="<?php echo base_url(); ?>assets/website/js/filter.js"></script>
  <script src="<?php echo base_url(); ?>assets/website/js/owl.carousel.js"></script>
  <script src="<?php echo base_url(); ?>assets/website/js/functions.js"></script>
  <script src="<?php echo base_url(); ?>assets/website/js/jquery-ui.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/website/js/select2.min.js"></script>
  <script>
  AOS.init(
  {
    duration: 1000,
  });
</script>
  <script type="text/javascript">
  $(document).ready(function() {
    $('.select2').select2({
      closeOnSelect: true
    });
  });
</script>
<script type="text/javascript">
            // DOM Element's
const counters = document.querySelectorAll('.counter');

for(let n of counters) {
    const updateCount = () => {
        const target = + n.getAttribute('data-target');
        const count = + n.innerText;
        const speed = 100;
        
        const inc = target / speed; 

        if(count < target) {
            n.innerText = Math.ceil(count + inc);
            setTimeout(updateCount, 1);
        } else {
            n.innerText = target;
        }
    }

    updateCount();
}
        </script>