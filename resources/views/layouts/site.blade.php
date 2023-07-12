<!doctype html>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('frontend.partials.header')
<body>

<!-- preloader-start -->
<div id="preloader">
    <div class="rasalina-spin-box"></div>
</div>
<!-- preloader-end -->

<!-- Scroll-top -->
<button class="scroll-top scroll-to-target" data-target="html">
    <i class="fas fa-angle-up"></i>
</button>
<!-- Scroll-top-end-->

@include('frontend.partials.nav')
<!-- main-area -->
<main>
    {{ $slot }}
</main>
<!-- main-area-end -->

@include('frontend.partials.footer')
<!-- JS here -->
<script src="{{asset('frontend/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/element-in-view.js')}}"></script>
<script src="{{asset('frontend/assets/js/slick.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/ajax-form.js')}}"></script>
<script src="{{asset('frontend/assets/js/wow.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins.js')}}"></script>
<script src="{{asset('frontend/assets/js/main.js')}}"></script>
</body>
</html>
