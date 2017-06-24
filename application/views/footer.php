
<!--<script src="--><?php //echo base_url('/assets/plugins/checkbox/zepto.js'); ?><!--"></script>-->
<!--<script src="--><?php //echo base_url('/assets/js/icheck.js'); ?><!--"></script>-->
<!--<script src="--><?php //echo base_url('/assets/js/icheck-init.js'); ?><!--"></script>-->
<script src="<?php echo base_url('assets/js/common-script.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.slimscroll.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js'); ?>"></script>





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

    case 'banks':
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

    case 'davlat':
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

    case 'otm':
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

    case 'partiya':
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

    case 'millat':
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

    case 'shartnoma':
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



    case 'uq_soha':
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

    case 'mutaxassislik':
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


    case 'tillar':
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

    case 'users':
        ?>
        <script src="<?php echo base_url('/assets/plugins/data-tables/jquery.dataTables.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/data-tables/DT_bootstrap.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/data-tables/dynamic_table_init.js') ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/edit-table/edit-table.js'); ?>"></script>
        <script type="text/javascript"  src="<?php echo base_url('/assets/plugins/input-mask/jquery.inputmask.min.js')?>"></script>
        <script type="text/javascript"  src="<?php echo base_url('/assets/plugins/input-mask/demo-mask.js')?>"></script>
        <script type="text/javascript"  src="<?php echo base_url('/assets/js/select2.min.js')?>"></script>
        <script>
            jQuery(document).ready(function () {
                EditableTable.init();
            });
        </script>
        <?php
        break;

    case 'add_employee':
        ?>

        <script src="<?php echo base_url('/assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/input-mask/jquery.inputmask.min.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/jquery-2.1.0.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/bootstrap.min.js'); ?>"></script>
        <script  src="<?php echo base_url('assets/plugins/toggle-switch/toggles.min.js'); ?>" type="text/javascript" ></script>
        <script type="text/javascript"  src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.min.js'); ?>"></script>
        <script type="text/javascript"  src="<?php echo base_url('assets/plugins/input-mask/demo-mask.js');?>"></script>
        <?php
        break;
    case 'create_employee':
        ?>

        <script src="<?php echo base_url('/assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/input-mask/jquery.inputmask.min.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/jquery-2.1.0.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/bootstrap.min.js'); ?>"></script>
        <script  src="<?php echo base_url('assets/plugins/toggle-switch/toggles.min.js'); ?>" type="text/javascript" ></script>
        <script type="text/javascript"  src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.min.js'); ?>"></script>
        <script type="text/javascript"  src="<?php echo base_url('assets/plugins/input-mask/demo-mask.js');?>"></script>
        <?php
        break;

    case 'edit_employee':
        ?>

        <script src="<?php echo base_url('/assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/input-mask/jquery.inputmask.min.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/jquery-2.1.0.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/bootstrap.min.js'); ?>"></script>
        <script  src="<?php echo base_url('assets/plugins/toggle-switch/toggles.min.js'); ?>" type="text/javascript" ></script>
        <script type="text/javascript"  src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.min.js'); ?>"></script>
        <script type="text/javascript"  src="<?php echo base_url('assets/plugins/input-mask/demo-mask.js');?>"></script>
        <?php
        break;


    case 'organ_list':
        ?>
        <script type="text/javascript"  src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.min.js'); ?>"></script>
        <script type="text/javascript"  src="<?php echo base_url('assets/plugins/input-mask/demo-mask.js');?>"></script>
        <script type="text/javascript"  src="<?php echo base_url('assets/plugins/x-editable/form-x-editable.js');?>"></script>
        <script type="text/javascript"  src="<?php echo base_url('assets/plugins/x-editable/form-x-editable-demo.js');?>"></script>
        <script type="text/javascript"  src="<?php echo base_url('assets/plugins/mockjax/jquery.mockjax.min.js');?>"></script>
        <script  src="<?php echo base_url('assets/plugins/toggle-switch/toggles.min.js'); ?>" type="text/javascript" ></script>




        <?php
        break;

}
?>
<script>
    $(function() {
        $('#datetimepicker1').datepicker({
            language: 'pt-BR'
        });
    });

    function checkSel(link){
        var ch = 0;
        for (var i=0; i<document.selform.length; i++){
            if(document.selform.elements[i].name == 'kadr[]'){
                if(document.selform.elements[i].checked){
                    ch++;
                }
            }
        }

        if (ch>0){
            document.selform.action = link;
            document.selform.submit();
        } else { alert(' Илтимос...   ходимни танланг!'); }

    }
</script>

