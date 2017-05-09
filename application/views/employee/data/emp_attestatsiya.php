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
                <h4>Аттестация</h4> </span> </div>
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
            <th>Амалдаги малака лавозими</th>
            <th>Эгаллаган йили</th>
            <th>Охирги аттестацияга жалб этилган йили</th>
            <th>Навбатдаги аттестацияга жалб этиладиган йили</th>
            <th>Охирги аттестация хулосаси</th>
<!--           <th>Статус</th>-->
            <th>Амаллар</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($atestasiyas as $attes){?>
            <tr class="">
                <td><? echo 1; ?></td>
                <td><a href="#"  data-kadrid="<?php echo $attes['attestatsiya_id']; ?>" data-toggle="modal" data-target="#myModal">
                        <?php echo $attes['malaka_lavozim_name']; ?></a>
                </td>
                <td>
                    <?php echo $attes['amal_mal_lav_bdate']; ?></td>
                <td>
                    <?php echo $attes['oxirgi_att_yili']; ?></td>
                <td class="center"><?php echo $attes['nav_att_yili']; ?></td>
                <td class="center"><?php echo $attes['oxirgi_att_xulosa']; ?></td>

<!--                <td class="center">--><?php //echo $attes['is_active']; ?><!--</td>-->
                <td>

                    <div class="btn-group">

                        <a type="button" class="btn btn-default" href="#" data-kadrid="<?php echo $attes['attestatsiya_id']; ?>" data-toggle="modal" data-target="#myModal"> <i class="fa fa-edit green_info"></i> </a>
                        <a type="button" class="btn btn-default" href="#" data-kadrid="<?php echo $attes['attestatsiya_id']; ?>" data-toggle="modal" data-target="#myModalDelete">
                            <i class="fa fa-trash-o red"></i> </a>

                    </div>

                </td>
            </tr>
        <?php }?>

        </tbody>
    </table>
</div>



