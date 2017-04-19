<div class="pull-left breadcrumb_admin clear_both">
</div>
<div class="container clear_both padding_fix">
    <div class="block-web">
        <div class="header">
            <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a> <a class="refresh" href="#"><i class="fa fa-repeat"></i></a> <a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
            <h3 class="content-header">Олий таълим муассасалари рўйхати</h3>
        </div>
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
            <div class="adv-table editable-table ">
                <div class="clearfix">
                    <div class="btn-group">
                        <button id="new_otm" type="button" class="btn btn-primary" data-title="<?php echo $title; ?>"
                                data-toggle="modal" data-target="#myModal">
                            Янги қўшиш <i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <div class="btn-group pull-right">
                        <button class="btn dropdown-toggle" data-toggle="dropdown">Амаллар <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="#">Чоп этиш</a></li>
                            <li><a href="#">PDF га сақлаш</a></li>
                            <li><a href="#">Excel га сақлаш</a></li>
                        </ul>
                    </div>
                </div>

                <div class="margin-top-10"></div>
                <table class="table table-striped table-hover table-bordered" id="editable-sample">

                    <thead>
                    <tr>
                        <th>ТР</th>
                        <th>ОТМ номи</th>
                        <th>ОТМ қиска номи</th>
                        <th>ОТМ расмий сайти</th>
                        <th>ОТМ эл.почтаси</th>
                        <th>Амаллар</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $counter=0;
                    foreach($otms as $univer){
                        $counter++;
                        ?>
                        <tr class="">
                            <td><? echo $counter?></td>
                            <td><a href="#" data-title="<?php echo $title;?>"
                                   data-otm_id=<?php echo $univer['otm_id']; ?> data-toggle="modal"
                                   data-target="#myModal"><?php echo $univer['otm_name']?></td>
                            <!--                            <td>--><?php //echo $bank['bank_name']?><!--</td>-->
                            <td><?php echo $univer['otm_lname'];?></td>
                            <td><a href="<?php echo $univer['otm_web']?>" target="_blank"><?php echo $univer['otm_web']?></a></td>
                            <td><?php echo $univer['otm_email']?></td>
                            <td>
                                <div class="btn-group btn-group-xs">
                                    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> ... <span class="caret"></span> </button>
                                    <ul class="dropdown-menu">
                                        <li> <a href="#" data-title="<?php echo $title;?>"
                                                data-otm_id=<?php echo $univer['otm_id']; ?> data-toggle="modal"
                                                data-target="#myModal"><span class="fa fa-edit"> </span>  Таҳрирлаш</a> </li>
                                        <li> <a href="<?php echo base_url('preferences/del_otm/' . $univer['otm_id']) ?>"><span class="fa fa-trash-o"> </span>  Ўчириш</a> </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php }?>

                    </tbody>
                </table>
            </div>

        </div><!--/porlets-content-->
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php echo base_url('/preferences/create_otm') ?>" class="form-horizontal" method="post">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Чиқиш</button>
                    <button type="submit" class="btn btn-primary">Сақлаш</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>


    $('#myModal').on('shown.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var modal = $(this);
        var otm_id = button.data('otm_id');
        var title = button.data("title");
        modal.find('.modal-title').text(title);

        $(".modal-body").html("Юкланмоқда...");
        $.ajax({
            type: "GET",
            url: "<?php echo base_url('preferences/ajax_data_otm')?>",
            data: {otm_id: otm_id},
            success: function (data) {

                $('.modal-body').html(data);
            }
        });

    })
</script>