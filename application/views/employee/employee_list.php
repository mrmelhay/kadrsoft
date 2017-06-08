<div class="pull-left breadcrumb_admin clear_both">
</div>
<div class="container clear_both padding_fix">
    <div class="block-web">
        <div class="header">
            <div class="actions"><a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a>
                <a class="refresh" href="#">
                    <i class="fa fa-repeat"></i></a> <a class="close-down" href="#"><i class="fa fa-times"></i></a>
            </div>
            <h3 class="content-header">Ходимлар рўйхати</h3>
        </div>
        <div class="porlets-content">
            <?php if ($this->session->flashdata('message') != null) { ?>
                <div class="alert alert-info alert-styled-left alert-bordered">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span
                                class="sr-only">Закрыть</span></button>
                    <span class="text-semibold"><?php echo $this->session->flashdata('message'); ?></span>
                </div>
            <?php } ?>

            <?php if ($this->session->flashdata('exception') != null) { ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('exception'); ?>
                </div>
            <?php } ?>
            <form class="form-horizontal" method="post" action="<?php echo base_url('employee/employees')?>">
            <div class="adv-table editable-table ">
                <div class="clearfix">
                    <div class="btn-group">
                        <a type="button" class="btn btn-primary"
                           href="<?php echo base_url('/employee/add_employee') ?>"><i class="fa fa-plus"></i> Янги қўшиш

                        </a>


                    </div>
                    <div class="btn-group">
                        <a type="button" class="btn btn-info"
                           href="<?php echo base_url('/employee/employee_info') ?>"><i class="fa fa-info"></i>
                            Маълумотнома

                        </a>
                    </div>

                    <div class="btn-group">
                        <a type="button" class="btn btn-warning"
                           href="<?php echo base_url('/employee/employee_info') ?>"> <i class="fa fa-edit"></i>
                            Тахрирлаш

                        </a>
                    </div>

                    <div class="btn-group">
                        <a type="button" class="btn btn-success"
                           href="<?php echo base_url('/employee/employee_info') ?>"> <i class="fa fa-file"></i>
                            Обективка

                        </a>
                    </div>
                    <div class="btn-group">
                        <a type="button" class="btn btn-danger"
                           href="<?php echo base_url('/employee/employee_info') ?>"> <i class="fa fa-trash-o"></i> Ишдан
                            бўшатиш
                        </a>
                    </div>
                    <div class="btn-group pull-right">
                        <button class="btn dropdown-toggle" data-toggle="dropdown">Амаллар <i
                                    class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="#">Чоп этиш</a></li>
                            <li><a href="#">PDF га сақлаш</a></li>
                            <li><a href="#">Excel га сақлаш</a></li>
                        </ul>
                    </div>
                </div>

                <div class="margin-top-10">
                    <div class="invoice_header">
                        <div class="row">
                            <div class="col-sm-5">
                                <select name="kollej_id" id="kollej_id" class="form-control" <?php echo $username['is_admin']==0?'readonly disabled':'';?>>
                                    <option value="">Танланг...</option>
                                    <?php $this->PreferencesModel->getKollejDropList(0,0, "&#166;&nbsp;&nbsp;&nbsp;&nbsp;", $username['kollej_id']); ?>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="query" id="query"/>
                                    <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> <?php echo empty($this->input->post('query',true))?'Излаш':'Тозалаш'?></button>
                  </span></div>

                            </div>

                        </div>
                    </div>

                </div>
                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>ТР</th>
                        <th>ID</th>
                        <th style="width: 250px;">Фамилияси, исми ва отасининг исми</th>
                        <th>Лавозими</th>
                        <th>Тугилган йили</th>
                        <th>Жинси</th>
                        <th>Маълумоти</th>
                        <th>Тел. рақами</th>
                        <th>Амаллар</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $counter = 0;
                    foreach ($employees as $empl) {
                        $counter++;
                        ?>
                        <tr class="">
                            <td><input type="checkbox" value="<?php echo $empl['kadrid'] ?>" name="kadr[]" id="kadr[]"/>
                            </td>
                            <td><? echo $counter ?></td>
                            <td><?php echo $empl['kadrid'] ?></td>
                            <td><a href="<?php echo base_url("/employee/edit_employee/" . $empl['kadrid']) ?>"
                                   data-title="<?php echo $title; ?>"
                                   data-kollej_id="<?php echo $empl['kollej_id']; ?>" data-toggle="modal"
                                >
                                    <?php echo $empl['name_f'] . ' ' . $empl['name_i'] . ' ' . $empl['name_o'] ?></a>
                            </td>
                            <td>
                                <?php echo $empl['lavozim_name'] ?></td>

                            <td>
                                <?php echo $empl['bdate'] ?></td>
                            <td>
                                <?php echo $empl['sex'] == 2 ? 'Эркак' : 'Аёл' ?></td>
                            <td>
                                <?php echo $empl['malumot_name'] ?></td>
                            <td class="center"><?php echo $empl['phone_mobile'] ?></td>
                            <td>

                                <div class="btn-group">
                                    <a type="button" class="btn btn-default"
                                       href="<?php echo base_url('/employee/data_employee/' . $empl['kadrid']); ?>"
                                       data-title="<?php echo $title; ?>"
                                       data-kadr_id=<?php echo $empl['kadrid']; ?>> <i
                                                class="fa fa-info-circle blue"></i> </a>
                                    <a type="button" class="btn btn-default"
                                       href="<?php echo base_url("/employee/edit_employee/" . $empl['kadrid']) ?>"> <i
                                                class="fa fa-edit green_info"></i> </a>
                                    <a type="button" class="btn btn-default"
                                       href="<?php echo base_url("/employee/objective/" . $empl['kadrid']) ?>"> <i
                                                class="fa fa-user magento"></i> </a>
                                    <a type="button" class="btn btn-default" href="#" data-title="<?php echo $title; ?>"
                                       data-kollej_id="<?php echo $empl['kadrid']; ?>"
                                       onclick="if (confirm('Ўчиришга ишончингиз комилми!!')==true){ document.location.href='<?php echo base_url('employee/delete_employee/' . $empl['kadrid']); ?>'; }">
                                        <i class="fa fa-trash-o red"></i> </a>

                                </div>
                            </td>
                        </tr>
                    <?php } ?>

                    </tbody>
                </table>
            </div>
            </form>
        </div><!--/porlets-content-->
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php echo base_url('/employee/add_employee') ?>" class="form-horizontal" method="post">


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

