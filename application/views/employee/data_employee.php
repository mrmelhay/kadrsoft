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
                    <a href="#"><img src="<?php echo base_url()?>images/aa-1.png" /></a>
                    <div class="contact_people_body">
                        <h5>Камол Жамолов</h5>
                        <span><i class="fa fa-map-marker"></i>New York,USA</span>
                        <span><i class="fa fa-briefcase"></i>Software Enginner at<a href="#"> abc.com</a></span>
                        <ul class="contact_social_list">
                            <li><a href="#"><i class="fa fa-envelope-o"></i></a></li>
                            <li><a href="#"><i class="fa fa-phone"></i></a></li>
                            <li><a href="#"><i class="fa fa-mobile-phone"></i></a></li>

                        </ul>
                    </div>
                </div>
            </div>
         </div>

            <div class="panel-body">
            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a data-toggle="tab" href="#Tab1">Паспорт</a></li>
                <li><a data-toggle="tab" href="#Tab2">Тиллар</a></li>
                <li><a data-toggle="tab" href="#Tab3">Ўқув юрти</a></li>
                <li><a data-toggle="tab" href="#Tab3">Илмий унвон</a></li>
                <li><a data-toggle="tab" href="#Tab3">Илмий даража</a></li>
                <li><a data-toggle="tab" href="#Tab3">Малака ошириш</a></li>
                <li><a data-toggle="tab" href="#Tab3">Қайта тайёрлов</a></li>
                <li><a data-toggle="tab" href="#Tab3">Меҳнат</a></li>
                <li><a data-toggle="tab" href="#Tab3">Фаолият</a></li>
                <li><a data-toggle="tab" href="#Tab3">Фанлар</a></li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div id="Tab1" class="tab-pane fade in active">
                    <?php $this->load->view('employee/data/emp_passport');?>
                </div>
                <div id="Tab2" class="tab-pane fade">
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet</p>
                </div>
                <div id="Tab3" class="tab-pane fade">
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
