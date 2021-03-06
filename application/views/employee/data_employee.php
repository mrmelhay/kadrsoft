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
        <div class="panel-heading">Ходим ҳақида қўшимча маълумотлар</div>

        <div class="row">
            <div class="col-sm-6">
                <div class="contact_people">
                    <a href="#"><img src="<?php echo  file_exists($employee['photo'])?base_url($employee['photo']):base_url('/images/photos/nophoto.jpg'); ?>" /></a>
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

                    <a type="button" class="btn btn-default" href="<?php echo base_url("/employee/objective/".$employee['kadrid'])?>"> <i class="fa fa-user magento"></i> </a>
                </div>
            </div>
         </div>

            <div class="panel-body">
            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a data-toggle="tab"  data-caption='Паспорт маълумотлари' data-emptype="1" href="#Tab1">Паспорт</a></li>
                <li><a data-toggle="tab"  data-caption='Тилларни билиш даражаси' data-emptype="2" href="#Tab2">Тиллар</a></li>
                <li><a data-toggle="tab"  data-caption='Битирган ўқув юрти' data-emptype="3" href="#Tab3">Ўқув юрти</a></li>
                <li><a data-toggle="tab"  data-caption='Илмий унвони' data-emptype="4" href="#Tab4">Унвон</a></li>
                <li><a data-toggle="tab"  data-caption='Илмий даражаси' data-emptype="5" href="#Tab5">Даража</a></li>
                <li><a data-toggle="tab"  data-caption='Малака ошириш' data-emptype="6" href="#Tab6">Малака</a></li>
                <li><a data-toggle="tab" data-caption='Қайта тайёрлов' data-emptype="7" href="#Tab7">Қайта</a></li>
                <li><a data-toggle="tab" data-caption='Меҳнат фаоляти' data-emptype="8" href="#Tab8">Меҳнат</a></li>
                <li><a data-toggle="tab" data-caption='Муассасадаги фаолияти' data-emptype="9" href="#Tab9">Фаолият</a></li>
                <li><a data-toggle="tab" data-caption='Ўқитадиган фанлари' data-emptype="10" href="#Tab10">Фанлар</a></li>
                <li><a data-toggle="tab" data-caption='Аттестация' data-emptype="11" href="#Tab11">Аттестация</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        Қўшимча ... <span class="fa fa-chevron-circle-down blue"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a data-toggle="tab" data-caption='Оила аъзолари' data-emptype="12" href="#Tab12">Оила</a></li>
                        <li><a data-toggle="tab" data-caption='Давлат мукофотлари' data-emptype="13" href="#Tab13">Мукофотлар</a></li>
                        <li><a data-toggle="tab" data-caption='Модераторлик қобилияти' data-emptype="14" href="#Tab14">Модератор</a></li>
                        <li><a data-toggle="tab" data-caption='Судланганлиги' data-emptype="15" href="#Tab15">Судланганлиги</a></li>
                        <li><a data-toggle="tab" data-caption='Интизомий чоралар' data-emptype="16" href="#Tab16">Интизомий чоралар</a></li>
                        <li><a data-toggle="tab" data-caption='Ижодий ишлар' data-emptype="17" href="#Tab17">Ижодий ишлар</a></li>
                        <li><a data-toggle="tab" data-caption='Заҳира кадр' data-emptype="18" href="#Tab18">Заҳира</a></li>
                        <li><a data-toggle="tab" data-caption='Депутатлик' data-emptype="19" href="#Tab19">Депутатлик</a></li>


                    </ul>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div id="Tab1" class="tab-pane fade in active">
                    <?php $this->load->view('employee/data/emp_passport');?>
                </div>
                <div id="Tab2" class="tab-pane fade">
                    <?php $this->load->view('employee/data/emp_language');?>
                </div>
                <div id="Tab3" class="tab-pane fade">
                    <?php $this->load->view('employee/data/emp_uqigan_tm');?>
                </div>
                <div id="Tab4" class="tab-pane fade">
                    <?php $this->load->view('employee/data/emp_ilmiy_unvon');?>
                </div>
                <div id="Tab5" class="tab-pane fade">
                    <?php $this->load->view('employee/data/emp_ilmiy_daraja');?>
                </div>
                <div id="Tab6" class="tab-pane fade">
                    <?php $this->load->view('employee/data/emp_malaka');?>
                </div>
                <div id="Tab7" class="tab-pane fade">
                    <?php $this->load->view('employee/data/emp_qaytat');?>
                </div>
                <div id="Tab8" class="tab-pane fade">
                    <?php $this->load->view('employee/data/emp_mehnat_faol');?>
                </div>
                <div id="Tab9" class="tab-pane fade">
                    <?php $this->load->view('employee/data/emp_muassasa_ish');?>
                </div>
                <div id="Tab10" class="tab-pane fade">
                    <?php $this->load->view('employee/data/emp_uqit_fan');?>
                </div>
                <div id="Tab11" class="tab-pane fade">
                    <?php $this->load->view('employee/data/emp_attestatsiya');?>
                </div>
                <div id="Tab12" class="tab-pane fade">
                    <?php $this->load->view('employee/data/emp_oila');?>
                </div>
                <div id="Tab13" class="tab-pane fade">
                    <?php $this->load->view('employee/data/emp_mukofot');?>
                </div>

                <div id="Tab14" class="tab-pane fade">
                    <?php $this->load->view('employee/data/emp_moderator');?>
                </div>

                <div id="Tab15" class="tab-pane fade">
                    <?php $this->load->view('employee/data/emp_sudlanganlik');?>
                </div>

                <div id="Tab16" class="tab-pane fade">
                    <?php $this->load->view('employee/data/emp_intizomchora');?>
                </div>
                <div id="Tab17" class="tab-pane fade">
                    <?php $this->load->view('employee/data/emp_ijodiyish');?>
                </div>
                <div id="Tab18" class="tab-pane fade">
                    <?php $this->load->view('employee/data/emp_zahira');?>
                </div>
                <div id="Tab19" class="tab-pane fade">
                    <?php $this->load->view('employee/data/emp_saylov');?>
                </div>

            </div>
        </div>
    </section>
</div>
</div>
<div class="modal fade" id="myModal"  role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <form action="<?php echo base_url('/employee/create_date_info') ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                <input type="hidden" name="kadr_id" id="kadr_id" value="<?php echo $employee['kadrid']; ?>"/>

                <input type="hidden" name="emptype" id="emptype"/>
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

<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <form action="<?php echo base_url('/employee/delete_data_info') ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                <input type="hidden" name="kadr_id" id="kadr_id"/>
                <input type="hidden" name="emptype" id="emptype"/>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Чиқиш</button>
                    <button type="submit" class="btn btn-primary">Ўчириш</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var target;
    var emptype;
    var title;
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        target = $(e.target).attr("href");
        emptype = $(e.target).data('emptype')?$(e.target).data('emptype'):1;
        title = $(e.target).data("caption")?$(e.target).data('caption'):'Паспорт';
    });

        $('#myModal').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var modal = $(this);
            //title = button.data("caption");
            var kadrid = button.data("kadrid");
            if (emptype==undefined && title==undefined){
                emptype=1;
                title='Паспорт';

            }
                modal.find('.modal-title').text(title);


            $(".modal-body").html("Юкланмоқда...");
            $.ajax({
                type: "GET",
                url: "<?php echo base_url('employee/ajax_data_employee')?>",
                data: {emptype: emptype,kadrid:kadrid},
                success: function (data) {
                    $('.modal-body').html(data);
                    $('#emptype').val(emptype);

                }
            });


        });


    $('#myModalDelete').on('shown.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var modal = $(this);
        var title = button.data("title");
        var kadrid = button.data("kadrid");
        if (emptype==undefined){
            emptype=1;

        }else{
            modal.find('.modal-title').text(target+" "+emptype);
        }

        $(".modal-body").html("<span>Ўчиришга ишончингиз комилми!!!</span>");
        modal.find('#emptype').val(emptype);
        modal.find('#kadr_id').val(kadrid);

        //        $.ajax({
//            type: "GET",
//            url: "",
//            data: {emptype: emptype,kadrid:kadrid},
//            success: function (data) {
//                $('.modal-body').html(data);
//                $('#emptype').val(emptype);
//            }
//        });
    });

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

    $(document).ready(function () {
        $(document).on('change', "#fan_turi_id", function () {
            var page = $('select[name="fan_turi_id"]').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('/preferences/ajax_data_fanlar')?>",
                data: {fan_turi_id: page},
                success: function (data) {

                    $('#fanlar_id').html(data);
                }
            });
        });
    });

//*********************************mytab*************//
    $('#myTab a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
    $("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
        var id = $(e.target).attr("href").substr(1);
        window.location.hash = id;
    });

      var hash = window.location.hash;
    $('#myTab a[href="' + hash + '"]').tab('show');

</script>


<script>

    $(document).ready(function() {
        $(".select22").select2()
        dropdownParent: $('#myModal');
    });


    $( function() {
        $( "#datepicker" ).datepicker({
            changeMonth: true,
            changeYear: true
        });
    } );


</script>


<script>
    $(function() {
        $('a[data-toggle="tab"]').on('shown.bs.tab', function () {
            // сохраним последнюю вкладку
            localStorage.setItem('lastTab', $(this).attr('href'));
        });

        //перейти к последней вкладки, если она существует:
        var lastTab = localStorage.getItem('lastTab');
        if (lastTab) {
            $('a[href=' + lastTab + ']').tab('show');
        }
        else
        {
            // установить первую вкладку активной если lasttab не существует
            $('a[data-toggle="tab"]:first').tab('show');
        }
    });





</script>