<div class="pull-left breadcrumb_admin clear_both">
</div>
 <div class="container clear_both padding_fix">

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

    <div class="col-lg-6">
    <div class="block-web">
        <div class="header">
            <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a> <a class="refresh" href="#"><i class="fa fa-repeat"></i></a> <a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
            <h3 class="content-header">Тиллар рўйхати</h3>

        </div>
        <div class="porlets-content">

            <div class="adv-table editable-table ">
                <div class="clearfix">
                    <div class="btn-group">
                        <button id="new_lang" type="button" class="btn btn-primary" data-title="<?php echo $title; ?>"
                                data-toggle="modal" data-target="#myModal1">
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
                        <th>Тил номи</th>

                        <th>Амаллар</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $counter=0;
                    foreach($langs['tillar'] as $lang){
                        $counter++;
                        ?>
                        <tr class="">
                            <td><? echo $counter?></td>
                            <td><? echo $lang['tillar_nomi'];?></td>
                            <td>
                                <div class="btn-group btn-group-xs">
                                    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> ... <span class="caret"></span> </button>
                                    <ul class="dropdown-menu">
                                        <li> <a href="#" data-title="<?php echo $title;?>"
                                                data-tillar_id=<?php echo $lang['tillar_id']; ?> data-toggle="modal"
                                                data-target="#myModal1"><span class="fa fa-edit"> </span>  Таҳрирлаш</a> </li>
                                        <li> <a href="<?php echo base_url('preferences/del_tillar/' . $lang['tillar_id']) ?>"><span class="fa fa-trash-o"> </span>  Ўчириш</a> </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php }?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
    </div>






    <div class="col-lg-6">
        <div class="block-web">
            <div class="header">
                <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a> <a class="refresh" href="#"><i class="fa fa-repeat"></i></a> <a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
                <h3 class="content-header">Тилларни билиш даражаси</h3>
            </div>
            <div class="porlets-content">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <div class="btn-group">
                            <button id="new_langtype" type="button" class="btn btn-primary" data-title="<?php echo $title; ?>"
                                    data-toggle="modal" data-target="#myModal2">
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
                            <th>Тилларни билиш даражаси</th>

                            <th>Амаллар</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $counter=0;
                        foreach($langs['tillar_turi'] as $lang){
                            $counter++;
                            ?>
                            <tr class="">
                                <td><? echo $counter?></td>
                                <td><? echo $lang['tillar_turi_nomi'];?></td>
                                <td>
                                    <div class="btn-group btn-group-xs">
                                        <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> ... <span class="caret"></span> </button>
                                        <ul class="dropdown-menu">
                                            <li> <a href="#" data-title="<?php echo $title;?>"
                                                    data-tillar_turi_id=<?php echo $lang['tillar_turi_id']; ?> data-toggle="modal"
                                                    data-target="#myModal2"><span class="fa fa-edit"> </span>  Таҳрирлаш</a> </li>
                                            <li> <a href="<?php echo base_url('preferences/del_tillar_turi/' . $lang['tillar_turi_id']) ?>"><span class="fa fa-trash-o"> </span>  Ўчириш</a> </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php }?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

     </div>

 </div>

<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModal1Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php echo base_url('/preferences/create_tillar') ?>" class="form-horizontal" method="post">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModal1Label">Modal title</h4>
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

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModal2Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php echo base_url('/preferences/create_tillar_turi') ?>" class="form-horizontal" method="post">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModal2Label">Modal title</h4>
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


    $('#myModal1').on('shown.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var modal = $(this);
        var tillar_id = button.data('tillar_id');
        var title = button.data("title");
        modal.find('.modal-title').text(title);

        $(".modal-body").html("Юкланмоқда...");
        $.ajax({
            type: "GET",
            url: "<?php echo base_url('preferences/ajax_data_tillar')?>",
            data: {tillar_id: tillar_id},
            success: function (data) {

                $('.modal-body').html(data);
            }
        });

    })
</script>


<script>


    $('#myModal2').on('shown.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var modal = $(this);
        var tillar_turi_id = button.data('tillar_turi_id');
        var title = button.data("title");
        modal.find('.modal-title').text(title);

        $(".modal-body").html("Юкланмоқда...");
        $.ajax({
            type: "GET",
            url: "<?php echo base_url('preferences/ajax_data_tillar_turi')?>",
            data: {tillar_turi_id: tillar_turi_id},
            success: function (data) {

                $('.modal-body').html(data);
            }
        });

    })
</script>


