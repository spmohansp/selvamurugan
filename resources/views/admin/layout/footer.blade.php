<!-- Footer -->
<footer class="sticky-footer">
    <div class="container">
        <div class="text-center">
            <small class="font-15">Copyright © <a href="https://greefitech.com">Greefi Technologies</a> <i class="fa fa-heart cl-danger"></i> In Tiruchengode</small>
        </div>
    </div>
</footer>
<!-- Switcher -->
<!-- /Switcher -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded cl-white gredient-bg" href="#page-top">
    <i class="ti-angle-double-up"></i>
</a>



<!-- Bootstrap core JavaScript-->

<script src="{{ url('/assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ url('/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- select 2 -->
<link href="{{ url('/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
<script src="{{ url('/assets/plugins/select2/select2.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ url('/assets/plugins/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Slick Slider Js -->
<script src="{{ url('/assets/plugins/slick-slider/slick.js') }}"></script>

<!-- Slim Scroll -->
<script src="{{ url('assets\plugins\slim-scroll\jquery.slimscroll.min.js') }}"></script>

<!-- Angular Tooltip -->
<script src="{{ url('assets\plugins\angular-tooltip\angular.js') }}"></script>
<script src="{{ url('assets\plugins\angular-tooltip\angular-tooltips.js') }}"></script>
<script src="{{ url('assets\plugins\angular-tooltip\index.js') }}"></script>

<!-- Validator JavaScript -->
<script src="{{ url('assets\plugins\validator\validator.js') }}"></script>

<!-- Custom scripts for all pages -->
<script src="{{ url('/assets/dist/js/glovia.js') }}"></script>
<script src="{{ url('/assets/dist/js/jQuery.style.switcher.js') }}"></script>
<script src="{{ url('/js/customer.js') }}"></script>
<script src="{{ url('/js/yarn.js') }}"></script>
<script src="{{ url('/js/chemical.js') }}"></script>

<script src="{{ url('/js/warping.js') }}"></script>
<script src="{{ url('/js/delevery.js') }}"></script>
<script>
    function openRightMenu() {
        document.getElementById("rightMenu").style.display = "block";
    }
    function closeRightMenu() {
        document.getElementById("rightMenu").style.display = "none";
    }

    $(document).ready(function() {
        $('#styleOptions').styleSwitcher();
    });
    
 $('.text-only').keydown(function (e) {
      if (e.ctrlKey || e.altKey) {
          e.preventDefault();
      } else {
          var key = e.keyCode;
          if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
              e.preventDefault();
          }
      }
  });

     $('.number-only').keypress(function(e){
      if (e.which != 46 && e.which != 45 && e.which != 46 &&
      !(e.which >= 48 && e.which <= 57)) {
      return false;
      }
  });

    $('.dropdown-toggle').dropdown();

    $(document).ready(function() {
        $('.SearchableDropDownSelect').select2();
    });
</script>

