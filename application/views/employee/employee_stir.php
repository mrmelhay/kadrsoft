<div class="pull-left breadcrumb_admin clear_both">
</div>
<div class="container clear_both padding_fix">
    <div class="block-web">
        <div class="header">
            <div class="actions"><a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a> <a class="refresh"
                                                                                                        href="#"><i
                        class="fa fa-repeat"></i></a> <a class="close-down" href="#"><i class="fa fa-times"></i></a>
            </div>
            <h3 class="content-header">Ходимлар рўйхати</h3>
        </div>
        <div class="porlets-content">
            <?php if ($this->session->flashdata('message') != null) { ?>
                <div class="alert alert-info alert-styled-left alert-bordered">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span
                            class="sr-only">Ёпиш</span></button>
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
                        <a type="button" class="btn btn-success" href="<?php echo base_url('/employee/exportstir') ?>">
                            <i class="fa fa-table"></i> Excel
                        </a>
                    </div>

                </div>

                <div class="margin-top-10"></div>
                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                    <thead>
                    <tr>
                        <th>ТР</th>
                        <th style="width: 250px;">Фамилияси, исми ва отасининг исми</th>
                        <th>Лавозими</th>
                        <th>СТИР</th>
                        <th>ЖБПДР</th>
<!--                        <th>Амаллар</th>-->
                    </tr>
                    </thead>
                    <tbody>
                                        <?php
                                        $counter = 0;
                                        foreach ($employees as $employee) {
                                            $counter++;
                                            ?>
                                            <tr class="">
                                                <td><? echo $counter ?></td>
                                                <td><a href="#" data-title="<?php echo $title;?>"
                                                       data-kollej_id=<?php echo $employee['kollej_id']; ?> data-toggle="modal"
                                                       data-target="#myModal"><?php echo $employee['name_f'] . ' ' . $employee['name_i'] . ' ' . $employee['name_o'] ?></a>
                                                </td>
                                                <td><?php echo $employee['lavozim_name']; ?></td>
                                                <td><?php echo $employee['inn'] ?></td>
                                                <td class="center"><?php echo $employee['inps'] ?></td>
<!--                                                <td>-->
<!--                                                    <div class="btn-group">-->
<!--                                                        <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> ... <span-->
<!--                                                                class="caret"></span></button>-->
<!--                                                        <ul class="dropdown-menu">-->
<!--                                                            <li><a href="#" data-title="--><?php //echo $title;?><!--"-->
<!--                                                                   data-kollej_id=--><?php //echo $employee['kollej_id']; ?><!-- data-toggle="modal"-->
<!--                                                                   data-target="#myModal"><span class="fa fa-edit"> </span> Таҳрирлаш</a>-->
<!--                                                            </li>-->
<!--                                                            <li>-->
<!--                                                                <a href="--><?php //echo base_url('preferences/del_organ/' . $employee['kollej_id']) ?><!--"><span-->
<!--                                                                        class="fa fa-trash-o"> </span> Ўчириш</a></li>-->
<!--                                                        </ul>-->
<!--                                                    </div>-->
<!--                                                </td>-->
                                            </tr>
                                        <?php } ?>

                    </tbody>
                </table>
            </div>

        </div><!--/porlets-content-->
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php echo base_url('/preferences/create_organ') ?>" class="form-horizontal" method="post">

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
    $(document).ready(function () {
        $(document).on('change', "#viloyat_id", function () {
            var page = $('select[name="viloyat_id"]').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('/preferences/ajax_data_tuman')?>",
                data: {viloyat_id: page},
                success: function (data) {
                    $('#tuman_id').html(data);
                }
            });
        });
    });

    $('#myModal').on('shown.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var modal = $(this);


        var kollej_id = button.data('kollej_id');
        var title = button.data("title");
        modal.find('.modal-title').text(title);

        $(".modal-body").html("Юкланмоқда...");
        $.ajax({
            type: "GET",
            url: "<?php echo base_url('preferences/ajax_data_organ')?>",
            data: {kollej_id: kollej_id},
            success: function (data) {

                $('.modal-body').html(data);
            }
        });

//      modal.find('.modal-body').text(recipient);
    })
</script>

