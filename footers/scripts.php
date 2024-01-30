    <script src="public/vendors/popper/popper.min.js"></script>
    <script src="public/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="public/vendors/anchorjs/anchor.min.js"></script>
    <script src="public/vendors/is/is.min.js"></script>
    <script src="public/vendors/fontawesome/all.min.js"></script>
    <script src="public/vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="public/vendors/prism/prism.js"></script>
    <script src="public/vendors/swiper/swiper-bundle.min.js"></script>
    <script src="public/assets/js/theme.js"></script>
    <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>