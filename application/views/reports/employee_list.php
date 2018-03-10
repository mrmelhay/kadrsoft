<div class="pull-left breadcrumb_admin clear_both">
</div>
<div class="container clear_both padding_fix">
    <div class="block-web">
        <div class="header">
            <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a> <a class="refresh" href="#"><i class="fa fa-repeat"></i></a> <a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
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

            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo validation_errors(); ?>
                </div>
            <?php } ?>
            <div class="adv-table editable-table ">


                <div class="margin-top-10"></div>
                <table class="table table-striped table-hover table-bordered" id="editable-sample">

                    <thead>
                    <tr>
                        <th>ТР</th>
                        <th>Коллеж номи</th>
                        <th>Жами ходимлар сони</th>
                        <th>Раҳбар</th>
                        <th>Педагог</th>
                        <th>Техник</th>
                        <th>Эркак</th>
                        <th>Аёл</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $counter=0;
                    $sex_a=0;
                    $sex_e=0;
                    $total_emp=0;
                    $owner_emp=0;
                    $pedagog_emp=0;
                    $technik_emp=0;
                    foreach($alldata as $data){
                        $counter++;
                        if ($data['sex_a']!=0){
                            $sex_a+=$data['sex_a'];
                        }

                        if ($data['sex_e']!=0){
                            $sex_e+=$data['sex_e'];
                        }

                        if ($data['total_emp']!=0){
                            $total_emp+=$data['total_emp'];
                        }

                        if ($data['owner_emp']!=0){
                            $owner_emp+=$data['owner_emp'];
                        }

                        if ($data['pedagog_emp']!=0){
                            $pedagog_emp+=$data['pedagog_emp'];
                        }

                        if ($data['technik_emp']!=0){
                            $technik_emp+=$data['technik_emp'];
                        }
                        ?>
                        <tr class="">
                            <td><? echo $counter?></td>
                            <td><a href="#"><?php echo $data['kollej_name']?></td>

                            <td><?php echo $data['total_emp'];?></td>
                            <td><?php echo $data['owner_emp']?></td>
                            <td><?php echo $data['pedagog_emp']?></td>
                            <td><?php echo $data['technik_emp']?></td>
                            <td><?php echo $data['sex_e']?></td>
                            <td><?php echo $data['sex_a']?></td>
                        </tr>
                    <?php }?>

                    </tbody>
                    <tfoot>
                    <td></td>
                    <td>Жами</td>
                    <td><?php echo $total_emp;?></td>
                    <td><?php echo $owner_emp;?></td>
                    <td><?php echo $pedagog_emp;?></td>
                    <td><?php echo $technik_emp;?></td>
                    <td><?php echo $sex_e;?></td>
                    <td><?php echo $sex_a;?></td>
                    </tfoot>
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