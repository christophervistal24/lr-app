<!-- Codebase Core JS -->
<script src="../../public/assets/js/core/jquery.min.js"></script>
<script src="../../public/assets/js/core/popper.min.js"></script>
<script src="../../public/assets/js/core/bootstrap.min.js"></script>
<script src="../../public/assets/js/core/jquery.slimscroll.min.js"></script>
<script src="../../public/assets/js/core/jquery.scrollLock.min.js"></script>
<script src="../../public/assets/js/core/jquery.appear.min.js"></script>
<script src="../../public/assets/js/core/jquery.countTo.min.js"></script>
<script src="../../public/assets/js/core/js.cookie.min.js"></script>
<script src="../../public/assets/js/codebase.js"></script>
<!-- Page JS Plugins -->
<script src="../../public/assets/js/plugins/chartjs/Chart.bundle.min.js"></script>
<!-- Page JS Code -->
<script src="../../public/assets/js/pages/be_pages_dashboard.js"></script>
<!-- Page JS Plugins -->
<!-- Customize this -->
<script src="../../public/assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
<!-- Page JS Code -->
<!-- Customize this -->
<!-- Page JS Plugins -->
<script src="../../public/assets/js/plugins/select2/select2.full.min.js"></script>
<script src="../../public/assets/js/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- Page JS Plugins -->
<script src="../../public/assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="../../public/assets/js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="../../public/assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="../../public/assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.js"></script>
<script src="../../public/assets/js/plugins/jquery-auto-complete/jquery.auto-complete.min.js"></script>
<script src="../../public/assets/js/plugins/masked-inputs/jquery.maskedinput.min.js"></script>
<script src="../../public/assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<script src="../../public/assets/js/plugins/dropzonejs/min/dropzone.min.js"></script>
<!-- Page JS Code -->
<script>
$(document).ready(function(){
jQuery(function () {
// Init page helpers (Select2 plugin)
Codebase.helpers('select2');
});
});
</script>
<script>
            jQuery(function () {
                // Init page helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs plugins)
                Codebase.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs']);
            });
        </script>

<script src="../../public/assets/js/pages/be_forms_validation.js"></script>
</body>
</html>