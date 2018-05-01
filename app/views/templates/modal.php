<?php extract($data); ?>
<div class="modal fade" id="modal-popin" tabindex="-1" role="dialog" aria-labelledby="modal-popin" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popin" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title"><?= $title ?></h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                        <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <?php if (isset($_SESSION['id'])): ?>
                    <form id="importCSV" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="example-file-input-custom">Import CSV <span class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <input type="file" style="cursor: pointer;" class="custom-file-input" id="example-file-input-custom"  name="import"> <span class="custom-file-control">Browse</span>
                            </div>
                        </div>
                        <?php else: ?>
                        <?= $content ?>
                        <?php endif ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <?php if (isset($_SESSION['id'])): ?>
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-alt-success" >
                    <i class="fa fa-check"></i> Import
                    </button>
                </form>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
<!-- END Pop In Modal