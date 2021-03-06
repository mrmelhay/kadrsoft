<div class="porlets-content">
    <?php if ($this->session->flashdata('message') != null) { ?>
        <div class="alert alert-info alert-styled-left alert-bordered">
            <button type="button" class="close" data-dismiss="alert"><span>×</span><span
                    class="sr-only">Закрыть</span></button>
            <span class="text-semibold"><?php echo $this->session->flashdata('message'); ?></span>
        </div>
    <?php } ?>

    <?php if (validation_errors()) { ?>
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo validation_errors(); ?>
        </div>
    <?php } ?>
    <div class="invoice_header">
        <div class="row">
            <div class="col-sm-5">
                <div class="input-group">
                <span class="input-group-btn">
                <h4>Меҳнат фаолияти</h4> </span> </div>
            </div>
            <div class="col-sm-7">
                <div class="btn-group pull-right">
                    <div class="btn-group"> <a class="btn btn-sm btn-success" id="new_partiya" type="button" class="btn btn-primary" data-title="<?php echo $title; ?>"
                                               data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus"></i> Янги қўшиш </a> </div>
                </div>
            </div>
        </div>
    </div>


    <table class="table table-striped table-hover table-bordered" id="editable-sample">
        <thead>
        <tr>
            <th>ТР</th>
            <th>Ишлаган вақти</th>
            <th>Ишлаган муассаса номи</th>
           <th>Статус</th>
            <th>Амаллар</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i=0;
        foreach($mehnats as $mehnat){?>
        <tr class="">
            <td><? echo $i+=1; ?></td>
            <td><a href="#"  data-kadrid="<?php echo $mehnat['mehnat_id']; ?>" data-toggle="modal" data-target="#myModal" >
                    <?php echo $mehnat['ish_vaqti']; ?></a>
            </td>
            <td>
                <?php echo $mehnat['ish_tashkilot']; ?></td>
            <td>
                <?php echo $mehnat['ordering']; ?></td>
            <td>
                <div class="btn-group">
                    <a type="button" class="btn btn-default" href="#" data-kadrid="<?php echo $mehnat['mehnat_id']; ?>" data-toggle="modal" data-target="#myModal"> <i class="fa fa-edit green_info"></i> </a>
                    <a type="button" class="btn btn-default" href="#" data-kadrid="<?php echo $mehnat['mehnat_id']; ?>" data-toggle="modal" data-target="#myModalDelete">
                    <i class="fa fa-trash-o red"></i> </a>
                </div>
            </td>
        </tr>
<?php } ?>

        </tbody>
    </table>
</div>



