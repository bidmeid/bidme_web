<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.2.2/lazysizes.min.js" async=""></script>
      <script src="{{ asset('frontend') }}/js/vendor/waypoints.min.js"></script>
      <script src="{{ asset('frontend') }}/js/bootstrap.bundle.min.js"></script>
      <script src="{{ asset('frontend') }}/js/jquery.meanmenu.js"></script>
      <script src="{{ asset('frontend') }}/js/owl.carousel.min.js"></script>
      <script src="{{ asset('frontend') }}/js/jquery.fancybox.min.js"></script>
      <script src="{{ asset('frontend') }}/js/isotope.pkgd.min.js"></script>
      <script src="{{ asset('frontend') }}/js/parallax.min.js"></script>
      <script src="{{ asset('frontend') }}/js/backToTop.js"></script>
      <script src="{{ asset('frontend') }}/js/ajax-form.js"></script>
      <script src="{{ asset('frontend') }}/js/wow.min.js"></script>
      <script src="{{ asset('frontend') }}/js/imagesloaded.pkgd.min.js"></script>
      <script src="{{ asset('frontend') }}/js/main.js"></script>
	  <script>
    $('#logout').click(() => {
        $.ajax({
            url: 'https://services.bidme.id/api/auth/logout',
            method: 'POST',
            complete: (response) => {
                if(response.status == 200) {
					//document.cookie = "access_tokenku = null";
					document.cookie = "access_tokenku= ; expires = Thu, 01 Jan 1970 00:00:00 GMT"
                    window.location.replace('{{ url("/") }}');
                }
            }
        });
    });
</script>
@stack('js')