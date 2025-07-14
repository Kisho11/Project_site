<!--Copyright Start-->
<div class="footer-bottom text-center" style="background:#481210;padding:10px 0;">
  <div class="container">
    <div class="copyright-text" style="color: #FFF;">
      COPYRIGHTS <?php echo date("Y"); ?> © KN/Kilinochchi Maha Vidyalayam Fully funded by <b>KANISTA 94</b> & Developed by <b>TECH WING-OSA-KMV</b>
    </div>
  </div>
</div>
<!--Copyright End-->

<!-- Js -->
<script src="{{ asset('web/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('web/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('web/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('web/assets/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('web/assets/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
<!-- Jquery Fancybox -->
<script src="{{ asset('web/assets/js/jquery.fancybox.min.js') }}"></script>
<!-- Animate js -->
<script src="{{ asset('web/assets/js/animate.js') }}"></script>
<script>
  new WOW().init();
</script>
<!-- WOW file -->
<script src="{{ asset('web/assets/js/wow.js') }}"></script>
<!-- general script file -->
<script src="{{ asset('web/assets/js/owl.carousel.js') }}"></script>
<script src="{{ asset('web/assets/js/script.js') }}"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
  // Simulate loading time
  setTimeout(function() {
    document.getElementById("loader").style.display = "none"; // Hide the loader
    document.getElementById("content").style.display = "block"; // Show the content
  }, 1500); // 1.5-second loading time
});
</script>
