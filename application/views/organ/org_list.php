<div class="pull-left breadcrumb_admin clear_both">
</div>

<div class="row">
    <div class="col-md-12">
        <div class="block-web">
            <div class="header">
                <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a> <a class="refresh" href="#"><i class="fa fa-repeat"></i></a> <a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
                <h3 class="content-header">Муассаса ҳақида маълумотлар</h3>
            </div>
            <div class="porlets-content">
                <div style="float: right; margin-bottom: 10px">

                    <button type="button"

                            data-title="<?php echo $title;?>"
                            data-kollej_id="<?php echo $organ[0]['kollej_id'] ?>" data-toggle="modal"
                            data-target="#myOrganModal"
                            id="enable" class="btn btn-primary">Ўзгартириш</button>
                </div>

                <table id="user" class="table table-bordered table-striped" style="clear: both">
                    <tbody>
                    <tr>
                        <td width="35%">Муассаса номи</td>
                        <td width="65%"><a href="#" id="kollej_name" data-type="text" data-pk="1"><?php echo $organ[0]['kollej_name']?></a></td>
                    </tr>
                    <tr>
                        <td>Муассаса манзили</td>
                        <td><a href="#" id="adress" data-type="text" data-pk="1" ><?php echo $organ[0]['kollej_adress']?></a></td>
                    </tr>
                    <tr>
                        <td>Умумий ходимлар сони</td>
                        <td><a href="#" id="empl_count1" data-type="text" data-pk="1" data-value="" ><?php echo $organ[0]['empl_count1']?></a></td>
                    </tr>
                    <tr>
                        <td>Педагог ходимлар сони</td>
                        <td><a href="#" id="empl_count2" data-type="text" data-pk="1" data-value="5"><?php echo $organ[0]['empl_count2']?></a></td>
                    </tr>
                    <tr>
                        <td>Ўқувчилар сони</td>
                        <td><a href="#" id="students_count" data-type="text" data-pk="1" ><?php echo $organ[0]['students_count']?></a></td>
                    </tr>
                    <tr>
                        <td>Телефон рақами</td>
                        <td><a href="#" id="phone" data-type="text"><?php echo $organ[0]['phone']?></a></td>
                    </tr>
                    <tr>
                        <td>Электрон почтаси</td>
                        <td><a href="#" id="email" data-type="text" data-pk="1"  data-title="Эл.почта"><?php echo $organ[0]['email']?></a></td>
                    </tr>
                    <tr>
                        <td>Расмий сайти</td>
                        <td><a href="#" id="website" data-type="text" data-pk="1"  data-title="Веб сайти"><?php echo $organ[0]['website']?></a></td>
                    </tr>
<!--                    <tr>-->
<!--                        <td>Банк номи</i></td>-->
<!--                                                <td><a href="#" id="bank_id" data-type="text" data-pk="1"  data-title="Банк номи">--><?php //echo $organ[0]['bank_name']?><!--</a></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td>Банк хисоб рақами</td>-->
<!--                        <td><a href="#" id="bank_acc_number" data-type="text" data-pk="1" data-placement="right" data-title="Банк Х/Рси">--><?php //echo $organ[0]['bank_acc_number']?><!--</a></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td>Муассаса СТИР рақами</td>-->
<!--                        <td><a href="#" id="kollej_inn" data-type="text" data-value="2,3" data-title="СТИР">--><?php //echo $organ[0]['kollej_inn']?><!--</a></td>-->
<!--                    </tr>-->
                    </tbody>
                </table>
            </div><!--/porlets-content-->
        </div><!--/block-web-->
    </div><!--/col-md-12-->
</div><!--/row-->
<div class="modal fade" id="myOrganModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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

    $('#myOrganModal').on('shown.bs.modal', function (event) {
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