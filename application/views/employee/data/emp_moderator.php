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
                <h4>Модераторлик қобилияти</h4> </span> </div>
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
                <th>Лавозими</th>
                <th>Фанлар</th>
                <th>Тренинг номлари</th>
                <th>Тренинг санаси</th>
                <th>Амаллар</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i=0;
            foreach($moderators as $moderator){?>
                <tr class="">
                    <td><? echo $i+=1; ?></td>
                    <td><a href="#" data-title="" data-kadrid="<?php echo $moderator['moderator_id']?>" data-toggle="modal" data-target="#myModal">
                            <?php echo $moderator['lavozim_name']; ?></a>
                    </td>
                    <td>
                        <?php echo $moderator['fanlar_name']; ?></td>
                    <td>
                        <?php echo $moderator['training_name']; ?></td>
                    <td class="center"><?php echo $moderator['training_date']; ?></td>
                    <td>
    
                        <div class="btn-group">
    
                            <a type="button" class="btn btn-default" href="#" data-kadrid="<?php echo $moderator['moderator_id']?>" data-toggle="modal"data-target="#myModal"> <i class="fa fa-edit green_info"></i> </a>
                            <a type="button" class="btn btn-default" href="#"  data-kadrid="<?php echo $moderator['moderator_id']?>" data-toggle="modal"data-target="#myModalDelete">
                                <i class="fa fa-trash-o red"></i> </a>
    
                        </div>
    
                    </td>
                </tr>
            <?php }?>
    
            </tbody>
        </table>
</div>



