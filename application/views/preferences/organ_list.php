<div class="pull-left breadcrumb_admin clear_both">
    </div>
<div class="container clear_both padding_fix">
    <div class="block-web">
    <div class="header">
        <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a> <a class="refresh" href="#"><i class="fa fa-repeat"></i></a> <a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
        <h3 class="content-header">Муассасалар рўйхати</h3>
    </div>
    <div class="porlets-content">
        <div class="adv-table editable-table ">
            <div class="clearfix">
                <div class="btn-group">
                    <button id="editable-sample_new" class="btn btn-primary">
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
                    <td><a class="delete" href="javascript:;">Delete</a></td>
                </tr>
                <?php }?>

                </tbody>
            </table>
        </div>

    </div><!--/porlets-content-->
</div>
</div>