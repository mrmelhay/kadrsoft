<script src="<?php echo base_url('/assets/js/jquery-2.1.0.js') ?>"></script>
<script src="<?php echo base_url('/assets/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('/assets/js/common-script.js') ?>"></script>
<script src="<?php echo base_url('/assets/js/jquery.slimscroll.min.js') ?>"></script>

<?php
switch ($this->uri->segment(2)) {
    case 'organ':
        ?>
        <script src="<?php echo base_url('/assets/plugins/data-tables/jquery.dataTables.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/data-tables/DT_bootstrap.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/data-tables/dynamic_table_init.js') ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/edit-table/edit-table.js'); ?>"></script>
        <script>
            jQuery(document).ready(function () {
                EditableTable.init();
            });
        </script>
        <?php
        break;

    case 'region':
        ?>
        <script src="<?php echo base_url('/assets/plugins/data-tables/jquery.dataTables.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/data-tables/DT_bootstrap.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/data-tables/dynamic_table_init.js') ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/edit-table/edit-table.js'); ?>"></script>
        <script>
            jQuery(document).ready(function () {
                EditableTable.init();
            });
        </script>
        <?php
        break;
    }
?>
</body>
</html>