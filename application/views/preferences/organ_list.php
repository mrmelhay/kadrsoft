<div class="pull-left breadcrumb_admin clear_both">
    </div>
<div class="container clear_both padding_fix">
    <div class="block-web">
    <div class="header">
        <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a> <a class="refresh" href="#"><i class="fa fa-repeat"></i></a> <a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
        <h3 class="content-header" >Муассасалар рўйхати</h3>
    </div>
    <div class="porlets-content">
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
                                <li> <a href="#"><span class="fa fa-trash-o"> </span>  Ўчириш</a> </li>
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <section class="panel">
                    <div class="block-web">
                        <div class="porlets-content">
                            <form action="" class="form-horizontal row-border">
                                <div class="form-group lable-padd">
                                    <label class="col-sm-3">Муассаса</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control mask" data-inputmask="'alias': 'date'">
                                    </div>
                                    <div class="col-sm-3 left-align">
                                        <p class="help-block">alias:date</p>
                                    </div>
                                </div>
                                <div class="form-group lable-padd">
                                    <label class="col-sm-3">Phone</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control mask" data-inputmask="'mask':'(999) 999-9999'">
                                    </div>
                                    <div class="col-sm-3 left-align">
                                        <p class="help-block">(999) 999-9999</p>
                                    </div>
                                </div>
                                <div class="form-group lable-padd">
                                    <label class="col-sm-3">Phone + Ext</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control mask" data-inputmask="'mask':'(999) 999-9999 x999
                            99'">
                                    </div>
                                    <div class="col-sm-3 left-align">
                                        <p class="help-block">(999) 999-9999 x99999</p>
                                    </div>
                                </div>
                                <div class="form-group lable-padd">
                                    <label class="col-sm-3">Int' Phone</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control mask" data-inputmask="'mask':'+33 999 999 999'">
                                    </div>
                                    <div class="col-sm-3 left-align">
                                        <p class="help-block">+33 999 999 999</p>
                                    </div>
                                </div>
                                <div class="form-group lable-padd">
                                    <label class="col-sm-3">TaxID</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control mask" data-inputmask="'mask':'99-9999999'">
                                    </div>
                                    <div class="col-sm-3 left-align">
                                        <p class="help-block">99-9999999</p>
                                    </div>
                                </div>
                                <div class="form-group lable-padd">
                                    <label class="col-sm-3">SSN</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control mask" data-inputmask="'mask':'999-99-9999'">
                                    </div>
                                    <div class="col-sm-3 left-align">
                                        <p class="help-block">999-99-9999</p>
                                    </div>
                                </div>
                                <div class="form-group lable-padd">
                                    <label class="col-sm-3">Product Key</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control mask" data-inputmask="'mask':'a*-999-a999'">
                                    </div>
                                    <div class="col-sm-3 left-align">
                                        <p class="help-block">a*-999-a999</p>
                                    </div>
                                </div>
                                <div class="form-group lable-padd">
                                    <label class="col-sm-3">Purchase Order</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control mask" data-inputmask="'mask':'PO: aaa-999-***'">
                                    </div>
                                    <div class="col-sm-3 left-align">
                                        <p class="help-block">PO: aaa-999-***</p>
                                    </div>
                                </div>
                                <div class="form-group lable-padd">
                                    <label class="col-sm-3">Percent</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control mask" data-inputmask="'mask':'99%'">
                                    </div>
                                    <div class="col-sm-3 left-align">
                                        <p class="help-block">99%</p>
                                    </div>
                                </div>
                                <div class="form-group lable-padd">
                                    <label class="col-sm-3">Currency</label>
                                    <div class="col-sm-6">
                                        <input type="text" style="text-align: right;" class="form-control mask" data-inputmask="'mask':'999,999,999.99 $', 'numericInput' : true">
                                    </div>
                                    <div class="col-sm-3 left-align">
                                        <p class="help-block">right alignment</p>
                                    </div>
                                </div>
                                <div class="form-group lable-padd">
                                    <label class="col-sm-3">Currency 2</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control mask" data-inputmask="'mask':'$ 999,999,999.99', 'greedy' : false, 'rightAlignNumerics' : false">
                                    </div>
                                    <div class="col-sm-3 left-align">
                                        <p class="help-block">left alignment</p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>
//    $(document).ready(function() {
//        $(document).on('click', "#editable-sample_new1", function () {
//
//        });
//    });

    $('#myModal').on('shown.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var modal = $(this);
        var title = button.data("title");
        modal.find('.modal-title').text(title);
//      modal.find('.modal-body').text(recipient);
    })
</script>

