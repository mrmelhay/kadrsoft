<div class="login_page">
    <div class="login_content">
          <?php if (validation_errors()) {  ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo validation_errors(); ?>
            </div>
        <?php } ?>
        <?php  if ($this->session->flashdata('message') != null) {  ?>
            <div class="alert alert-danger alert-styled-left alert-bordered">
                <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Закрыть</span></button>
                <span class="text-semibold"><?php echo $this->session->flashdata('message'); ?></span>
            </div>
        <?php } ?>
        <form role="form" class="form-horizontal" method="post" action="<?php echo base_url('users/check')?>">
            <div class="form-group">
                <div class="col-sm-10">
                    <input type="text" placeholder="Логин:" id="username" name="username" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <input type="password" placeholder="Пароль:" id="possword" name="password" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <div class=" col-sm-10">
                    <div class="checkbox checkbox_margin">
                            <button class="btn btn-default pull-right" type="submit">Кириш</button>
                        </div>
                </div>
            </div>
        </form>
    </div>
</div>



