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
        <div class="panel-heading"> хақида қўшимча маълумотлар</div>
        <div class="panel-body">
            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a data-toggle="tab" href="#Tab1">Паспорт</a></li>
                <li><a data-toggle="tab" href="#Tab2">Tab2</a></li>
                <li><a data-toggle="tab" href="#Tab3">Tab3</a></li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div id="Tab1" class="tab-pane fade in active">

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
