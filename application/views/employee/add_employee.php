<div class="pull-left breadcrumb_admin clear_both">
</div>
<div class="container clear_both padding_fix">
    <div class="block-web">
        <div class="header">
            <div class="actions">
                <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a>
                <a class="refresh"  href="#"><i class="fa fa-repeat"></i></a>
                <a class="close-down" href="#"><i class="fa fa-times"></i></a>
            </div>
            <h3 class="content-header">Янги ходим қўшиш</h3>
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

            <?php if (validation_errors()) {  ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo validation_errors(); ?>
                </div>
            <?php } ?>
            <form    action="<?php echo base_url("/employee/create_employee")?>" method="post" class="form-horizontal row-border" enctype="multipart/form-data" >
                <input type="hidden" name="kadrid" value="<?php echo $employee->kadrid;?>">
            <div class="row">
                <div class="col-md-6">

                        <div class="form-group has-success lable-padd">
                            <label for="" class="col-md-3">Фамилияси</label>
                            <div class="col-md-6">
                                <input type="text" name="name_f" id="name_f" class="form-control" placeholder="Фамилия"  value="<?php echo $employee->name_f;?>"/>
                            </div>
                        </div>

                        <div class="form-group has-success lable-padd">
                            <label for="" class="col-md-3">Исми</label>
                            <div class="col-md-6">
                                <input type="text" name="name_i" id="name_i" class="form-control"  placeholder="Исм" value="<?php echo $employee->name_i;?>" />
                            </div>
                        </div>

                        <div class="form-group has-success lable-padd">
                            <label for="" class="col-md-3">Отасининг исми</label>
                            <div class="col-md-6">
                                <input type="text" name="name_o" id="name_o" class="form-control"  placeholder="Отасининг исми"  value="<?php echo $employee->name_o;?>">
                            </div>
                        </div>

                        <div class="form-group has-success lable-padd">
                            <label for="" class="col-md-3">Туғилган вақти</label>
                            <div class="col-md-6">
                                <input id="bdate" name="bdate" type="text" class="form-control mask" data-inputmask="'alias': 'date'"  value="<?php echo $employee->bdate;?>" placeholder="Кк/Ой/Йил">
                            </div>
                        </div>

                        <div class="form-group has-success lable-padd">
                            <label for="" class="col-md-3">Жинси</label>
                            <div class="col-md-6">
                                <select name="sex" id="sex" class="form-control">
                                    <option value="">Танланг...</option>
                                    <option value="1" <?php  if ($employee->sex==1) { ?>selected="selected" <?php }?>>Аёл</option>
                                    <option value="2" <?php  if ($employee->sex==2) { ?>selected="selected" <?php }?>>Эркак</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group has-success lable-padd">
                            <label for="" class="col-md-3">Лавозими</label>
                            <div class="col-md-6">
                                <select name="lavozim_id" id="lavozim_id" class="form-control">
                                    <option value="">Танланг...</option>
                                    <?php $this->PreferencesModel->getLavozimDropList($employee->lavozim_id); ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group has-success lable-padd">
                            <label for="" class="col-md-3">Маълумоти</label>
                            <div class="col-md-6">
                                <select name="malumot_id" id="malumot_id" class="form-control">
                                    <option value="">Танланг...</option>
                                    <?php $this->PreferencesModel->getMalumotDropList($employee->malumot_id); ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group has-success lable-padd">
                            <label for="" class="col-md-3">Тоифаси</label>
                            <div class="col-md-6">
                                <select name="malaka_lavozim_id" id="malaka_lavozim_id" class="form-control">
                                    <option value="">Танланг...</option>
                                    <?php $this->PreferencesModel->getMalakaLavDropList($employee->malaka_lavozim_id); ?>

                                </select>
                            </div>
                        </div><!--/form-group-->

                        <div class="form-group has-success lable-padd">
                            <label for="" class="col-md-3">Мутахасислик тури</label>
                            <div class="col-md-6">
                                <select name="mutax_turi_id" id="mutax_turi_id" class="form-control">
                                    <option value="">Танланг...</option>
                                    <?php $this->PreferencesModel->getMutaxasislikTurDropList($employee->mutax_turi_id); ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group has-success lable-padd">
                            <label for="" class="col-md-3">Мутахасислиги</label>
                            <div class="col-md-6">
                                <select name="mutax_kodi_id" id="mutax_kodi_id" class="form-control">
                                    <option value="">Танланг...</option>
                                    <?php $this->PreferencesModel->getMutaxasislikDropList($employee->mutax_kodi_id); ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group has-success lable-padd">
                            <label for="" class="col-md-3">Миллати</label>
                            <div class="col-md-6">
                                <select name="millat_id" id="millat_id" class="form-control">
                                    <option value="">Танланг...</option>
                                    <?php $this->PreferencesModel->getMillatiDropList($employee->millat_id); ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group has-success lable-padd">
                            <label for="" class="col-md-3">Оилавий ахволи</label>
                            <div class="col-md-6">
                                <select name="oila_id" id="oila_id" class="form-control">
                                    <option value="">Танланг...</option>
                                    <option value="1" <?php  if ($employee->oila_id==1) { ?>selected="selected" <?php }?>>Оилали</option>
                                    <option value="2" <?php  if ($employee->oila_id==2) { ?>selected="selected" <?php }?>>Оиласиз</option>

                                </select>
                            </div>
                        </div>
<!--                    <div class="form-group has-success lable-padd">-->
<!--                        <label for="" class="col-md-3">Давлат мукофотлари</label>-->
<!--                        <div class="col-md-6">-->
<!--                            <select name="mukofot_id" id="mukofot_id" class="form-control">-->
<!--                                <option value="">Танланг...</option>-->
<!--                                --><?php //$this->PreferencesModel->getMukofotDropList($employee->mukofot_id); ?>
<!--                            </select>-->
<!--                        </div>-->
<!--                    </div>-->

                </div>
           <div class="col-md-6">

                    <div class="form-group has-success lable-padd">
                        <label for="" class="col-md-3">Давлат</label>
                        <div class="col-md-6">
                            <select name="davlat_id" id="davlat_id" class="form-control">
                                <option value="">Танланг...</option>
                                <?php $this->PreferencesModel->getDavlatDropList($employee->davlat_id); ?>
                            </select>
                        </div>
                    </div><!--/form-group-->

                    <div class="form-group has-success lable-padd">
                        <label for="" class="col-md-3">Вилоят</label>
                        <div class="col-md-6">
                            <select name="viloyat_id" id="viloyat_id" class="form-control">
                                <option value="">Танланг...</option>
                                <?php $this->PreferencesModel->getViloyatDropList($employee->viloyat_id); ?>
                            </select>
                        </div>
                    </div><!--/form-group-->

                    <div class="form-group has-success lable-padd">
                        <label for="" class="col-md-3">Туман</label>
                        <div class="col-md-6">
                            <select name="tuman_id" id="tuman_id" class="form-control">
                                <option value="">Танланг...</option>
                                <?php if ($employee->tuman_id) {?>
                                <?php $this->PreferencesModel->getTumanDropList($employee->viloyat_id,$employee->tuman_id); ?>
                                <?php }?>
                            </select>
                        </div>
                    </div><!--/form-group-->

               <div class="form-group has-success lable-padd">
                   <label for="" class="col-md-3">Манзил</label>
                   <div class="col-md-6">
                       <textarea name="address" id="address" class="form-control">
                           <?php echo $employee->address; ?>
                       </textarea>
                   </div>
               </div>

                    <div class="form-group has-success lable-padd">
                        <label for="" class="col-md-3">Умумий стажи</label>
                        <div class="col-md-6">
                            <input type="text" name="umumiy_staj" id="umumiy_staj" class="form-control"  placeholder="Умумий стаж"  value="<?php echo $employee->umumiy_staj; ?>" parsley-trigger="change" maxlength="2">
                        </div>
                    </div><!--/form-group-->

                    <div class="form-group has-success lable-padd">
                        <label for="" class="col-md-3">Педагогик стажи</label>
                        <div class="col-md-6">
                            <input type="text" name="ped_staj" id="ped_staj" class="form-control"  placeholder="Педагогик стаж" value="<?php echo $employee->ped_staj; ?>" parsley-trigger="change" maxlength="2">
                        </div>
                    </div>

                    <div class="form-group has-success lable-padd">
                        <label for="" class="col-md-3">Партиявийлиги</label>
                        <div class="col-md-6">
                            <select name="partiya_id" id="partiya_id" class="form-control">
                                <option value="">Танланг...</option>
                                <?php $this->PreferencesModel->getParpiaDropList($employee->partiya_id); ?>
                            </select>
                        </div>
                    </div><!--/form-group-->

                    <div class="form-group has-success lable-padd">
                        <label for="" class="col-md-3">СТИР</label>
                        <div class="col-md-6">
                            <input type="text" name="inn" id="inn" class="form-control"  placeholder="СТИР рақами"  value="<?php echo $employee->inn; ?>"  parsley-trigger="change" maxlength="9">
                        </div>
                    </div>

                    <div class="form-group has-success lable-padd">
                        <label for="" class="col-md-3">ЖБПДР</label>
                        <div class="col-md-6">
                            <input type="text" name="inps" id="inps" class="form-control"  placeholder="ЖБПДР" value="<?php echo $employee->inps; ?>"  parsley-trigger="change" maxlength="14">
                        </div>
                    </div>

                    <div class="form-group has-success lable-padd">
                        <label for="" class="col-md-3">Эл.почтаси</label>
                        <div class="col-md-6">
                            <input type="email" name="email" id="email" class="form-control"  placeholder="Электрон почта"  value="<?php echo $employee->email; ?>"  parsley-trigger="change">
                        </div>
                    </div>

                    <div class="form-group has-success lable-padd">
                        <label for="" class="col-md-3">Телефон</label>
                        <div class="col-md-6">
                            <input type="text" name="phone_work" id="phone_work" value="<?php echo $employee->phone_work; ?>" class="form-control mask" data-inputmask="'mask':'(999)99-999-9999'"  placeholder="Иш телефон рақами"  parsley-trigger="change">
                        </div>
                    </div>

                    <div class="form-group has-success lable-padd">
                        <label for="" class="col-md-3">Мобил телефон</label>
                        <div class="col-md-6">
                            <input type="text" name="phone_mobile" id="phone_mobile" value="<?php echo $employee->phone_mobile; ?>" class="form-control mask" data-inputmask="'mask':'(999)99-999-9999'"  placeholder="Уй телефон рақами"  parsley-trigger="change">
                        </div>
                    </div>

               <div class="form-group">
                   <label for="" class="col-md-3">Расм</label>
                   <div class="col-md-6">
                       <input type="file" name="photo" id="photo" class="form-control" />
                       <input type="hidden" name="old_picture" value="<?php echo $employee->photo ?>">
                   </div>
               </div>

            </div>
            </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-primary"
                       href="<?php echo base_url('/employee/employees') ?>"> <i class="fa fa-power-off"></i> Чиқиш </a>
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Сақлаш </button>
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
</script>


