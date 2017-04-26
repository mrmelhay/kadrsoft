
<script src="<?php echo base_url('/assets/js/common-script.js') ?>"></script>
<script src="<?php echo base_url('/assets/js/jquery.slimscroll.min.js') ?>"></script>
<script>
    jQuery(document).ready(function () {
        EditableTable.init();
    });
</script>

<?php
switch ($this->uri->segment(2)) {
    case 'organ':
        ?>
        <script src="<?php echo base_url('/assets/plugins/data-tables/jquery.dataTables.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/data-tables/DT_bootstrap.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/data-tables/dynamic_table_init.js') ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/edit-table/edit-table.js'); ?>"></script>
        <script type="text/javascript"  src="<?php echo base_url('/assets/plugins/input-mask/jquery.inputmask.min.js')?>"></script>
        <script type="text/javascript"  src="<?php echo base_url('/assets/plugins/input-mask/demo-mask.js')?>"></script>
        <script type="text/javascript"  src="<?php echo base_url('/assets/js/select2.min.js')?>"></script>

        <?php
        break;

    case 'region':
        ?>
        <script src="<?php echo base_url('/assets/plugins/data-tables/jquery.dataTables.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/data-tables/DT_bootstrap.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/data-tables/dynamic_table_init.js') ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/edit-table/edit-table.js'); ?>"></script>

        <?php
        break;

    case 'banks':
        ?>
        <script src="<?php echo base_url('/assets/plugins/data-tables/jquery.dataTables.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/data-tables/DT_bootstrap.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/data-tables/dynamic_table_init.js') ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/edit-table/edit-table.js'); ?>"></script>

        <?php
        break;

    case 'davlat':
        ?>
        <script src="<?php echo base_url('/assets/plugins/data-tables/jquery.dataTables.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/data-tables/DT_bootstrap.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/data-tables/dynamic_table_init.js') ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/edit-table/edit-table.js'); ?>"></script>

        <?php
        break;

    case 'otm':
        ?>
        <script src="<?php echo base_url('/assets/plugins/data-tables/jquery.dataTables.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/data-tables/DT_bootstrap.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/data-tables/dynamic_table_init.js') ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/edit-table/edit-table.js'); ?>"></script>

        <?php
        break;

    case 'partiya':
        ?>
        <script src="<?php echo base_url('/assets/plugins/data-tables/jquery.dataTables.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/data-tables/DT_bootstrap.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/data-tables/dynamic_table_init.js') ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/edit-table/edit-table.js'); ?>"></script>

        <?php
        break;

    case 'millat':
        ?>
        <script src="<?php echo base_url('/assets/plugins/data-tables/jquery.dataTables.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/data-tables/DT_bootstrap.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/data-tables/dynamic_table_init.js') ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/edit-table/edit-table.js'); ?>"></script>

        <?php
        break;

    case 'shartnoma':
        ?>
        <script src="<?php echo base_url('/assets/plugins/data-tables/jquery.dataTables.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/data-tables/DT_bootstrap.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/data-tables/dynamic_table_init.js') ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/edit-table/edit-table.js'); ?>"></script>

        <?php
        break;



    case 'uq_soha':
        ?>
        <script src="<?php echo base_url('/assets/plugins/data-tables/jquery.dataTables.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/data-tables/DT_bootstrap.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/data-tables/dynamic_table_init.js') ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/edit-table/edit-table.js'); ?>"></script>

        <?php
        break;

    case 'mutaxassislik':
        ?>
        <script src="<?php echo base_url('/assets/plugins/data-tables/jquery.dataTables.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/data-tables/DT_bootstrap.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/data-tables/dynamic_table_init.js') ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/edit-table/edit-table.js'); ?>"></script>

        <?php
        break;


    case 'tillar':
        ?>
        <script src="<?php echo base_url('/assets/plugins/data-tables/jquery.dataTables.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/data-tables/DT_bootstrap.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/data-tables/dynamic_table_init.js') ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/edit-table/edit-table.js'); ?>"></script>

        <?php
        break;

    case 'users':
        ?>
        <script src="<?php echo base_url('/assets/plugins/data-tables/jquery.dataTables.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/data-tables/DT_bootstrap.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/data-tables/dynamic_table_init.js') ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/edit-table/edit-table.js'); ?>"></script>
        <script type="text/javascript"  src="<?php echo base_url('/assets/plugins/input-mask/jquery.inputmask.min.js')?>"></script>
        <script type="text/javascript"  src="<?php echo base_url('/assets/plugins/input-mask/demo-mask.js')?>"></script>
        <script type="text/javascript"  src="<?php echo base_url('/assets/js/select2.min.js')?>"></script>

        <?php
        break;


}


?>
