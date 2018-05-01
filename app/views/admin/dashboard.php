<div class="block">
    <div class="block-header">
    </div>
    <div class="block-content block-content-full">
        <table class="table table-responsive table-bordered table-striped table-vcenter js-dataTable-full-pagination">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Student ID</th>
                </tr>
            </thead>
            <tbody>
                 <?php  $rows = []; ?>
                <?php foreach ($data['csv'] as $key => $value): ?>
                    <?php
                        if($key === 0){
                            $rows = $value;
                        } else {
                    ?>
                    <tr>
                     <?php foreach ($value as $keys => $values): ?>
                    <td><?= $values ?></td>
                        <?php endforeach ?>
                    </tr>
                    <?php
                        }
                    ?>
                <?php endforeach ?>

            </tbody>
        </table>
    </div>
    <!-- END OF BLOCK-CONTENT -->
</div>
<!-- END OF BLOCK -->