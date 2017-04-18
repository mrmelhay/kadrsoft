<div class="pull-left breadcrumb_admin clear_both">
</div>
<div class="container clear_both padding_fix">
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
                                <td><a class="delete" href="javascript:;">Delete</a></td>
                            </tr>
                        <?php }?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>