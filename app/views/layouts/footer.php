</div>
<!-- END Page Content -->
</main>
<!-- Pop In Modal For Import CSV-->
<div class="modal fade" id="modal-popin" tabindex="-1" role="dialog" aria-labelledby="modal-popin" aria-hidden="true">
<div class="modal-dialog modal-dialog-popin" role="document">
<div class="modal-content">
    <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
            <h3 class="block-title">Terms &amp; Conditions</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                <i class="si si-close"></i>
                </button>
            </div>
        </div>
        <div class="block-content">
            <form id="importCSV" action="" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="example-file-input-custom">Import CSV <span class="text-danger">*</span></label>
                    <div class="col-lg-7">
                        <input type="file" style="cursor: pointer;" class="custom-file-input" id="example-file-input-custom"  name="import"> <span class="custom-file-control">Browse</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-alt-success" >
            <i class="fa fa-check"></i> Import
            </button>
        </form>
    </div>
</div>
</div>
</div>
<!-- END Pop In Modal -->
<!-- Pop In Modal For Export CSV-->
<div class="modal fade" id="modal-popin2" tabindex="-1" role="dialog" aria-labelledby="modal-popin2" aria-hidden="true">
<div class="modal-dialog modal-dialog-popin" role="document">
<div class="modal-content">
    <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
            <h3 class="block-title">Terms &amp; Conditions</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                <i class="si si-close"></i>
                </button>
            </div>
        </div>
        <div class="block-content">
            <p>List</p>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-alt-success" data-dismiss="modal">
        <i class="fa fa-check"></i> Perfect
        </button>
    </div>
</div>
</div>
</div>
<!-- END Pop In Modal -->
<!-- END Main Container -->
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
<!-- Page JS Plugins -->
<script src="../../public/assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="../../public/assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="../../public/assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.js"></script>
<script src="../../public/assets/js/plugins/jquery-auto-complete/jquery.auto-complete.min.js"></script>
<script src="../../public/assets/js/plugins/masked-inputs/jquery.maskedinput.min.js"></script>
<script src="../../public/assets/js/plugins/select2/select2.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js"></script>
<script src="../../public/assets/js/custom.js"></script>
<script src="../../public/assets/js/forgot.js"></script>
<script src="../../public/assets/js/changeinfo.js"></script>
<script src="../../public/assets/js/changepassword.js"></script>
<script src="../../public/assets/js/changeusername.js"></script>
<script src="../../public/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../public/assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../../public/assets/js/pages/be_tables_datatables.js"></script>
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