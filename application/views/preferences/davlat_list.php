<div class="pull-left breadcrumb_admin clear_both">
</div>
<div class="container clear_both padding_fix">
    <div class="block-web">
        <div class="header">
            <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a> <a class="refresh" href="#"><i class="fa fa-repeat"></i></a> <a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
            <h3 class="content-header">Давлатлар рўйхати</h3>
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
                        <th>Давлат номи</th>
                        <th>ISO коди</th>
                        <th>Домен номи</th>
                        <th>Амаллар</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $counter=0;
                    foreach($country as $davlat){
                        $counter++;
                        ?>
                        <tr class="">
                            <td><? echo $counter?></td>
                            <td><?php echo $davlat['gov_uzc']?></td>
                            <!--                            <td>--><?php //echo $bank['bank_name']?><!--</td>-->
                            <td><?php echo $davlat['iso'];?></td>
                            <td><?php echo $davlat['url']?></td>
                           <td><a class="delete" href="javascript:;">Delete</a></td>
                        </tr>
                    <?php }?>

                    </tbody>
                </table>
            </div>

        </div><!--/porlets-content-->
    </div>
</div>