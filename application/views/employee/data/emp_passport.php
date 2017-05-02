<div class="btn-group">
    <a type="button" class="btn btn-primary"
       href="<?php echo base_url('/employee/add_employee') ?>"> Янги қўшиш
        <i class="fa fa-plus"> </i>
    </a>
</div>
<div class="header">
    <p>&nbsp;</p>
</div>

<table class="table table-striped table-hover table-bordered" id="editable-sample">
    <thead>
    <tr>
        <th>ТР</th>
        <th style="width: 250px;">Фамилияси, исми ва отасининг исми</th>
        <th>Лавозими</th>
        <th>Маълумоти</th>
        <th>Тел. рақами</th>
        <th>Амаллар</th>
    </tr>
    </thead>
    <tbody>

    <tr class="">
        <td><? echo 1; ?></td>
        <td><a href="#" data-title="" data-kollej_id="" data-toggle="modal" >
                <?php echo ""; ?></a>
        </td>
        <td>
            <?php echo ""; ?></td>
        <td>
            <?php echo ''; ?></td>
        <td class="center"><?php ''; ?></td>
        <td>

            <div class="btn-group">

                <a type="button" class="btn btn-default" href="#" data-title="<?php echo ''; ?>" data-kollej_id=<?php echo ''; ?> data-toggle="modal"
                   data-target="#myModal"> <i class="fa fa-edit green_info"></i> </a>
                <a type="button" class="btn btn-default" href="" ">
                <i class="fa fa-trash-o red"></i> </a>

            </div>

        </td>
    </tr>


    </tbody>
</table>

