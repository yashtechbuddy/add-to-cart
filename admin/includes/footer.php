<div class="footer_part">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="footer_iner text-center">
                    <p>2023 © Influence - Designed by<a href="#"> RndTechnosoft </a></p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>



<script src="assets/js/jquery1-3.4.1.min.js"></script>

<script src="assets/js/popper1.min.js"></script>

<script src="assets/js/bootstrap1.min.js"></script>

<script src="assets/js/metisMenu.js"></script>

<script src="assets/js/drop-down.js"></script>

<script src="assets/vendors/count_up/jquery.waypoints.min.js"></script>

<script src="assets/vendors/chartlist/Chart.min.js"></script>

<script src="assets/vendors/count_up/jquery.counterup.min.js"></script>

<script src="assets/vendors/swiper_slider/js/swiper.min.js"></script>

<script src="assets/vendors/niceselect/js/jquery.nice-select.min.js"></script>

<script src="assets/vendors/owl_carousel/js/owl.carousel.min.js"></script>

<script src="assets/vendors/gijgo/gijgo.min.js"></script>

<script src="assets/vendors/datatable/js/jquery.dataTables.min.js"></script>
<script src="assets/vendors/datatable/js/dataTables.responsive.min.js"></script>
<script src="assets/vendors/datatable/js/dataTables.buttons.min.js"></script>
<script src="assets/vendors/datatable/js/buttons.flash.min.js"></script>
<script src="assets/vendors/datatable/js/jszip.min.js"></script>
<script src="assets/vendors/datatable/js/pdfmake.min.js"></script>
<script src="assets/vendors/datatable/js/vfs_fonts.js"></script>
<script src="assets/vendors/datatable/js/buttons.html5.min.js"></script>
<script src="assets/vendors/datatable/js/buttons.print.min.js"></script>
<script src="assets/js/chart.min.js"></script>

<script src="assets/vendors/progressbar/jquery.barfiller.js"></script>

<script src="assets/vendors/tagsinput/tagsinput.js"></script>

<script src="assets/vendors/text_editor/summernote-bs4.js"></script>
<script src="assets/vendors/apex_chart/apexcharts.js"></script>

<script src="assets/js/custom.js"></script>

<script src="assets/js/active_chart.js"></script>
<script src="assets/vendors/apex_chart/radial_active.js"></script>
<script src="assets/vendors/apex_chart/stackbar.js"></script>
<script src="assets/vendors/apex_chart/area_chart.js"></script>

<script src="assets/vendors/apex_chart/bar_active_1.js"></script>
<script src="assets/vendors/chartjs/chartjs_active.js"></script>

<script src="./tinymce/tinymce.min.js"></script>
<script src="./assets/js/script.js"></script>
<?php
include './includes/ajax.php';
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(function() {
    // Get the current filename from the URL
    var currentUrl = window.location.href;
    var filename = currentUrl.substring(currentUrl.lastIndexOf('/') + 1);

    // Find the <a> element with the matching href attribute
    $('#sidebar_menu  a').each(function() {
        if ($(this).attr('href') === filename) {
            // Add the "active" class to the <a> element
            $(this).addClass('active');
            
            // Add the "mm-active" class to the parent <li> element
            // $(this).closest('li').addClass('mm-active');

            // Add the "in" class to the parent <ul> element to expand submenu
            $(this).closest('ul').closest('li').addClass('mm-active');
            
            $(this).closest('ul').addClass('mm-show');
        }
    });
});
</script>



</body>

<!-- Mirrored from demo.dashboardpack.com/finance-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Jun 2023 08:41:12 GMT -->

</html>