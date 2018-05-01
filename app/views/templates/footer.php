</div>
<!-- END Page Content -->
</main>
<!-- Modal for Import CSV -->
<?php //include_once APP['APP_ROOT'] . 'views/templates/modal_browse.php'; ?>
<!-- End of Modal for Import CSV -->
<!-- END Main Container -->
<!-- Codebase Core JS -->
<script src="<?= APP['DOC_ROOT'] ?>public/assets/js/core/jquery.min.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>public/assets/js/core/popper.min.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>public/assets/js/core/bootstrap.min.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>public/assets/js/core/jquery.slimscroll.min.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>public/assets/js/core/jquery.scrollLock.min.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>public/assets/js/core/jquery.appear.min.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>public/assets/js/core/jquery.countTo.min.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>public/assets/js/core/js.cookie.min.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>public/assets/js/codebase.js"></script>

<!-- Page JS Plugins -->
<script src="<?= APP['DOC_ROOT'] ?>public/assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>public/assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>public/assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>public/assets/js/plugins/jquery-auto-complete/jquery.auto-complete.min.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>public/assets/js/plugins/masked-inputs/jquery.maskedinput.min.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>public/assets/js/plugins/select2/select2.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>public/assets/js/custom.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>public/assets/js/forgot.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>public/assets/js/changeinfo.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>public/assets/js/changepassword.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>public/assets/js/changeusername.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>public/assets/js/changeprofile.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>public/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>public/assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>public/assets/js/pages/be_tables_datatables.js"></script>
<script>
jQuery(function () {
// Init page helpers (Select2 plugin)
Codebase.helpers('select2');
});
jQuery(function () {
// Init page helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs plugins)
Codebase.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs']);
});
</script>
</script>
</body>
</html>
<?php ob_end_flush(); ?>