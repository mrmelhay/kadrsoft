<div class="pull-left breadcrumb_admin clear_both">
    </div>

<div class="container clear_both padding_fix">
    <div class="block-web">
    <div class="header">
        <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a> <a class="refresh" href="#"><i class="fa fa-repeat"></i></a> <a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
        <h3 class="content-header" >Муассасалар рўйхати</h3>
    </div>
    <div class="porlets-content">
        <?php  if ($this->session->flashdata('message') != null) {  ?>
            <div class="alert alert-info alert-styled-left alert-bordered">
                <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Закрыть</span></button>
                <span class="text-semibold"><?php echo $this->session->flashdata('message'); ?></span>
            </div>
        <?php } ?>

        <?php if (validation_errors()) {  ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo validation_errors(); ?>
            </div>
        <?php } ?>
        <div class="adv-table editable-table ">
            <div class="clearfix">
                <div class="btn-group">
                    <button id="new_organ" type="button" class="btn btn-primary"  data-title="<?php echo $title;?>" data-toggle="modal" data-target="#myModal">
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
                    <th style="width: 250px;">Муассаса номи</th>
                    <th>Жойлашган ҳудуди</th>
                    <th>Жами ходимлар сони</th>
                    <th>Талабалар сони</th>
                    <th>Раҳбар номи</th>
                    <th>Тел. рақами</th>
                    <th>Амаллар</th>
         </tr>
                </thead>
                <tbody>
                    <?php
                    $counter=0;
                    foreach($kollejs as $kollej){
                        $counter++;
                        ?>
                <tr class="">
                    <td><? echo $counter?></td>
                    <td><?php echo $kollej['kollej_name']?></td>
                    <td><?php echo $kollej['viloyat'].' '.$kollej['tuman'].' '.$kollej['kollej_adres'];?></td>
                    <td><?php echo $kollej['empl_count1']?></td>
                    <td class="center"><?php echo $kollej['students_count']?></td>
                    <td class="center"><?php echo ($kollej['is_director']==1)?$kollej['name_f'].' '.$kollej['name_i'].' '.$kollej['name_o']:'';?></td>
                    <td class="center"><?php echo $kollej['phone']?></td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> ... <span class="caret"></span> </button>
                            <ul class="dropdown-menu">
                                <li> <a href="#"><span class="fa fa-edit"> </span>  Таҳрирлаш</a> </li>
                                <li> <a href="<?php echo base_url('preferences/del_organ/'.$kollej['kollej_id'])?>"><span class="fa fa-trash-o"> </span>  Ўчириш</a> </li>
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
            <form action="<?php echo base_url('/preferences/create_organ')?>" class="form-horizontal" method="post">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                        <div class="porlets-content">

                                <div class="form-group lable-padd">
                                    <label class="col-sm-3">Муассаса номи</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="kollej_name" id="kollej_name"/>
                                    </div>
                               </div>
                                <div class="form-group lable-padd">
                                    <label class="col-sm-3">Вилоят</label>
                                    <div class="col-sm-6">
                                        <select name="viloyat_id" id="viloyat_id" class="form-control">
                                            <option value="">Танланг...</option>
                                        <?php $this->PreferencesModel->getViloyatDropList(); ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group lable-padd">
                                    <label class="col-sm-3">Туман</label>
                                    <div class="col-sm-6">
                                        <select name="tuman_id" id="tuman_id" class="form-control">
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group lable-padd">
                                    <label class="col-sm-3">Манзил</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="kollej_adres" id="kollej_adres"/>
                                    </div>

                                </div>
                                <div class="form-group lable-padd">
                                    <label class="col-sm-3">Ходимлар сони</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="empl_count1" name="empl_count1"/>
                                    </div>
                                    <label class="col-sm-3">Пeдагогик ходимлар сони</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="empl_count2" name="empl_count2"/>
                                    </div>

                                </div>
<!--                                <div class="form-group lable-padd">-->
<!--                                    <label class="col-sm-3">Падагогик ходимлар сони</label>-->
<!--                                    <div class="col-sm-6">-->
<!--                                        <input type="text" class="form-control" id="empl_count2" name="empl_count2"/>-->
<!--                                    </div>-->
<!--                                </div>-->
                                <div class="form-group lable-padd">
                                    <label class="col-sm-3">Талабалар сони</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="students_count" name="students_count"/>
                                    </div>
                                </div>

                                <div class="form-group lable-padd">
                                    <label class="col-sm-3">Телефон</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control mask" data-inputmask="'mask':'(999) 99-999-9999'" name="phone" id="phone">
                                    </div>

                                </div>

                                <div class="form-group lable-padd">
                                    <label class="col-sm-3">Электрон почта</label>
                                    <div class="col-sm-6">
                                        <input type="email" class="form-control"  name="email" id="email" required/>
                                    </div>

                                </div>

                                <div class="form-group lable-padd">
                                    <label class="col-sm-3">Веб сайт</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="website" id="website"/>
                                    </div>
                                </div>

                        </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Чиқиш</button>
                <button type="submit"  class="btn btn-primary">Сақлаш</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(document).on('change', "#viloyat_id", function () {
            var page = $('select[name="viloyat_id"]').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('/preferences/ajax_data_tuman')?>",
                data: {viloyat_id: page},
                success: function(data) {
                    $('#tuman_id').html(data);
                }
            });
        });
    });

    $('#myModal').on('shown.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var modal = $(this);
        var title = button.data("title");
        modal.find('.modal-title').text(title);
//      modal.find('.modal-body').text(recipient);
    })
</script>

