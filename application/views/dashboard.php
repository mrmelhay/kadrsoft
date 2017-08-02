<!--echo-->
<div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
        <h1>Бошқарув панели</h1>
        <h2 class=""></h2>
    </div>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">Асосий</a></li>
            <li class="active">Бошқарув панели</li>
        </ol>
    </div>
</div>


<div class="container clear_both padding_fix">

    <div class="row">
        <div class="col-sm-3 col-sm-6">
            <div class="information green_info">
                <div class="information_inner" data-type="<?php echo base_url('employee/employees/') ?>">
                    <div class="info green_symbols"><i class="fa fa-users icon"></i></div>
                    <span>Жами ходимлар сони</span>
                    <h1 class="bolded"><?php echo $emp_count['total']; ?> та</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-sm-6">
            <div class="information blue_info">
                <div class="information_inner" data-type="<?php echo base_url('employee/employees/?type=pedagog') ?>">
                    <div class="info blue_symbols"><i class="fa fa-book icon"></i></div>
                    <span>Педагог ходимлар</span>
                    <h1 class="bolded"><?php echo $emp_count['pedagog']; ?> та</h1>
                </div>
            </div>
        </div>

        <div class="col-sm-3 col-sm-6">
            <div class="information gray_info">
                <div class="information_inner" data-type="<?php echo base_url('employee/employees/?type=rahbar') ?>">
                    <div class="info gray_symbols"><i class="fa fa-user icon"></i></div>
                    <span>Раҳбар ходимлар</span>
                    <h1 class="bolded"><?php echo $emp_count['rahbar']; ?> та</h1>

                </div>
            </div>
        </div>

        <div class="col-sm-3 col-sm-6">
            <div class="information red_info">
                <div class="information_inner" data-type="<?php echo base_url('employee/employees/?type=tehnik') ?>">
                    <div class="info red_symbols"><i class="fa fa-briefcase icon"></i></div>
                    <span>Техник  ходимлар</span>
                    <h1 class="bolded"><?php echo $emp_count['tehnik']; ?> та</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3 col-sm-6">
            <div class="information green_info">
                <div class="information_inner" data-type="<?php echo base_url('employee/employees/?type=malaka') ?>">
                    <div class="info green_symbols"><i class="fa fa-maxcdn icon"></i></div>
                    <span>МОга эхтиёж</span>
                    <h1 class="bolded"><?php echo $emp_count['malaka_soni']; ?> та</h1>

                </div>
            </div>
        </div>
        <div class="col-sm-3 col-sm-6">
            <div class="information blue_info">
                <div class="information_inner" data-type="<?php echo base_url('employee/employees/?type=attestatsiya') ?>">
                    <div class="info blue_symbols"><i class="fa fa-suitcase icon"></i></div>
                    <span>АТТга киради</span>
                    <h1 class="bolded"><?php echo $emp_count['att_soni']; ?> та</h1>

                </div>
            </div>
        </div>

        <div class="col-sm-3 col-sm-6">
            <div class="information gray_info">
                <div class="information_inner">
                    <div class="info gray_symbols"><i class="fa fa-sign-in icon"></i></div>
                    <span>Янги қабул қилинган</span>
                    <h1 class="bolded">12,254K</h1>

                </div>
            </div>
        </div>

        <div class="col-sm-3 col-sm-6">
            <div class="information red_info">
                <div class="information_inner">
                    <div class="info red_symbols"><i class="fa fa-sign-out icon"></i></div>
                    <span>Ишдан бўшаганлар</span>
                    <h1 class="bolded">12,254K</h1>
<!--                    <div class="infoprogress_red">-->
<!--                        <div class="redprogress"></div>-->
<!--                    </div>-->
<!--                    <b class="">-->
<!--                        <small>Умумий фоиз ( 7,5% )</small>-->
<!--                    </b>-->
<!--                    <div class="pull-right" id="work-progress3">-->
<!--                        <canvas style="display: inline-block; width: 47px; height: 25px; vertical-align: top;"-->
<!--                                width="47" height="25"></canvas>-->
<!--                    </div>-->
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    $('div.information_inner').click(function (event) {
        var type = $(this).data('type');
        window.location.href = type;
    })
</script>


<!----  Hello -->