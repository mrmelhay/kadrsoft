<div class="pull-left breadcrumb_admin clear_both">
</div>
<div class="container clear_both padding_fix">
    <div class="block-web">
        <div class="header">
            <h3 class="content-header">Фойдаланувчи парольини алмаштириш</h3>
        </div>
        <div class="porlets-content">
            <?php if ($this->session->flashdata('message') != null) { ?>
                <div class="alert alert-info alert-styled-left alert-bordered">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span
                                class="sr-only">Закрыть</span></button>
                    <span class="text-semibold"><?php echo $this->session->flashdata('message'); ?></span>
                </div>
            <?php } ?>
            <?php if ($this->session->flashdata('exception') != null) { ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('exception'); ?>
                </div>
            <?php } ?>

            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo validation_errors(); ?>
                </div>
            <?php } ?>

            <div class="adv-table editable-table ">
                <form role="form" class="form-horizontal" method="post"
                      action="<?php echo base_url('users/update_login') ?>">
                    <input type="hidden" name="userid" value="<?php echo $userid; ?>"/>
                    <div class="form-group lable-padd">
                        <label class="col-sm-2">Янги пароль:</label>
                        <div class="col-sm-6">
                            <input type="password" placeholder="Янги пароль:" id="password" name="password"
                                   class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group lable-padd">
                        <label class="col-sm-2 label-control">Такрорлаш пароль:</label>
                        <div class="col-sm-6">
                            <input type="password" placeholder="Такрорлаш пароль:" id="possword1" name="password1"
                                   class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group lable-padd">
                        <div class=" col-sm-10">
                            <div class="checkbox checkbox_margin">
                                <button class="btn btn-info" type="submit">Саклаш</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


