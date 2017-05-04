<?php $employee=$employee[0]; ?>
<div class="pull-left breadcrumb_admin clear_both">
</div>

        <div class="porlets-content">
            <?php if ($this->session->flashdata('message') != null) { ?>
                <div class="alert alert-info alert-styled-left alert-bordered">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span
                            class="sr-only">Закрыть</span></button>
                    <span class="text-semibold"><?php echo $this->session->flashdata('message'); ?></span>
                </div>
            <?php } ?>
            <?php if ($this->session->flashdata('exception') != null) {  ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('exception'); ?>
                </div>
            <?php } ?>
<div class="pull-left breadcrumb_admin clear_both"> </div>
<div class="col-lg-12">
    <section class="panel default blue_title h2">
        <div class="panel-heading">Ҳодим хақида қўшимча маълумотлар</div>

        <div class="row">
            <div class="col-sm-6">
                <div class="contact_people">
                    <a href="#"><img src="<?php echo base_url()?><?php echo $employee['photo']; ?>" /></a>
                    <div class="contact_people_body">
                        <h5><?php echo $employee['name_f'].' '.$employee['name_o'];?></h5>
                        <span><i class="fa fa-map-marker"></i><?php echo $employee['address']; ?></span>
                        <span><i class="fa fa-briefcase"></i><?php echo $employee['lavozim_name']; ?></span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="contact_people">
                    <a type="button" class="btn btn-info btn-danger" href="<? echo base_url('employee/employees');?>"> Ортга қайтиш <i class="fa fa-mail-reply-all"></i> </a>
                </div>
            </div>
         </div>

            <div class="panel-body">
            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a data-toggle="tab" data-emptype="1" href="#Tab1">Паспорт</a></li>
                <li><a data-toggle="tab" data-emptype="2" href="#Tab2">Тиллар</a></li>
                <li><a data-toggle="tab" data-emptype="3" href="#Tab3">Ўқув юрти</a></li>
                <li><a data-toggle="tab" data-emptype="4" href="#Tab3">Илмий унвон</a></li>
                <li><a data-toggle="tab" data-emptype="5" href="#Tab3">Илмий даража</a></li>
                <li><a data-toggle="tab" data-emptype="6" href="#Tab3">Малака ошириш</a></li>
                <li><a data-toggle="tab" data-emptype="7" href="#Tab3">Қайта тайёрлов</a></li>
                <li><a data-toggle="tab" data-emptype="8" href="#Tab3">Меҳнат</a></li>
                <li><a data-toggle="tab" data-emptype="9" href="#Tab3">Фаолият</a></li>
                <li><a data-toggle="tab" data-emptype="10" href="#Tab3">Фанлар</a></li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div id="Tab1" class="tab-pane fade in active">
                    <?php $this->load->view('employee/data/emp_passport');?>
                </div>
                <div id="Tab2" class="tab-pane fade">
                    <?php $this->load->view('employee/data/emp_passport');?>
                </div>
                <div id="Tab3" class="tab-pane fade">
                    <?php $this->load->view('employee/data/emp_passport');?>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="<?php echo base_url('/employee/ajax_emp_passport') ?>" class="form-horizontal" method="post">

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
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

        var target = $(e.target).attr("href");
        var emptype = $(e.target).data('emptype');

        $('#myModal').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var modal = $(this);
            var title = button.data("title");
//            var emptype = button.data('emptype');
            modal.find('.modal-title').text(target+" "+emptype);

            $(".modal-body").html("Юкланмоқда...");
            $.ajax({
                type: "GET",
                url: "<?php echo base_url('employee/ajax_data_employee')?>",
                data: {emptype: emptype},
                success: function (data) {
                    $('.modal-body').html(data);
                }
            });
        });

    });


</script>