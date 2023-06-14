<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="robots" content="index, follow">
  <meta property="og:type" content="website" />
  <meta property="og:locale" content="en_us" />
  <meta name="twitter:card" content="summary">
  <meta name="format-detection" content="telephone=no">
  <meta name="p:domain_verify" content="a222244fe1cc8033debafbf00200d8ee"/>
  <meta name="google-site-verification" content="KqvPbZeAjC4QjgEIM36jxroE7OpjFiDXoy13ocdkzcw" />
  <!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '527196301491765');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=527196301491765&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
  <link rel="icon" href="<?php echo base_url();  ?>assets/website/images/favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();  ?>assets/website/images/favicon.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/assets.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/typography.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/shortcodes.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/style.css">
  <link class="skin" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/color-1.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/layers.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/settings.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/navigation.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/website/font/css/font-awesome.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/website/font/css/font-awesome.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/website/css/custom.css" />
  <link href="<?php echo base_url(); ?>assets/website/css/jquery-ui.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/website/css/select2.min.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/website/css/selectcustom.css" rel="stylesheet" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <style type="text/css">
    .video-carousel .owl-nav {
      position: absolute;
      top: -70px;
      right: 5px;
    }

    .video-carousel .owl-nav .owl-prev {
      background-color: #b6242e;
      color: #fff;
    }

    .video-carousel .video-bx .video {
      width: 60px;
      height: 80x;
      border-radius: 60px;
      line-height: 60px;
      text-align: center;
      position: absolute;
      left: 50%;
      top: 50%;
    }

    .gallery-carousel .owl-nav .owl-prev {
      margin: 0px !important;
    }

    .gallery-carousel .owl-nav {
      position: absolute;
      top: -70px;
      right: 5px;
    }

    .gallery-carousel .owl-nav .owl-prev {
      background-color: #b6242e;
      color: #fff;
    }

    .gallery-carousel .video-bx .video {
      width: 60px;
      height: 80x;
      border-radius: 60px;
      line-height: 60px;
      text-align: center;
      position: absolute;
      left: 50%;
      top: 50%;
    }

    .gallery-carousel .owl-nav .owl-prev {
      margin: 0px !important;
    }
  </style>
  <script src="<?php echo base_url(); ?>assets/website/js/jquery.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#state').change(function() {

      var state_name = $('#state').val();
      if (state_name != '') {
        $.ajax({
          url: "<?php echo base_url(); ?>check-city",
          method: "POST",
          data: {
            state_name: state_name
          },
          success: function(data) {

            $('#city').html(data);
          }
        });
      }
    });
  });
</script>
<script type="text/javascript">
   $(document).ready(function(){
     var state_name_ = $('#state').val();
      if (state_name_ != '') {
        $.ajax({
          url: "<?php echo base_url(); ?>check-city",
          method: "POST",
          data: {
            state_name: state_name_,
            city_name:"<?php echo $city;?>",
          },
          success: function(data) {

            $('#city').append(data);
          }
        });
      }
  })
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#city').change(function() {

      var city_name = $('#city').val();
      if (city_name != '') {
        $.ajax({
          url: "<?php echo base_url(); ?>get-course",
          method: "POST",
          data: {
            city_name: city_name
          },
          success: function(data) {
            $('#course_id').html(data);
          }
        });
      }
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {

      var city_name_ = $('#city').val();
      if (city_name_ != '') {
        $.ajax({
          url: "<?php echo base_url(); ?>get-course",
          method: "POST",
          data: {
            city_name: city_name_,
            course_name:"<?php echo $course;?>",
          },
          success: function(data) {
            $('#course_id').append(data);
          }
        });
      }
    });
</script>
  