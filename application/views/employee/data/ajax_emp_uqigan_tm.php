<div class="row">
    <div class="col-md-6">
        <div class="block-web">
            <input type="hidden" name="passport_id" id="passport_id" value="<?php echo ""; ?>" />
            <div class="porlets-content">

                <div class="form-group">
                    <label class="col-sm-3 control-label">Давлат</label>
                    <div class="col-sm-8">
                        <select name="davlat_id" id="davlat_id" class="form-control">
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getDavlatDropList(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">ОТМ номи</label>
                    <div class="col-sm-8">
                        <select name="otm_id" id="otm_id" class="form-control">
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getUniverDropList(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Кирган йили</label>
                    <div class="col-sm-6">
                        <div class="input-group input-append date dpYears" id='datetimepicker2' data-date="12-02-2012"
                             data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" class="form-control" name="kirgan_yili" id="kirgan_yili" required value="<?php echo '';?>"/>
                            <span class="input-group-addon"> <i class="fa fa-calendar icon"></i></span> </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Битирган йили</label>
                    <div class="col-sm-6">
                        <div class="input-group input-append date dpYears" id='datetimepicker2' data-date="12-02-2012"
                             data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" class="form-control" name="tugatgan_yili" id="tugatgan_yili" required value="<?php echo '';?>"/>
                            <span class="input-group-addon"> <i class="fa fa-calendar icon"></i></span> </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Мутахасислиги</label>
                    <div class="col-sm-8">
                        <select name="mutax_kodi_id" id="mutax_kodi_id" class="form-control">
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getMutaxasislikDropList(); ?>
                        </select>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="block-web">
            <div class="porlets-content">

                <div class="form-group">
                    <label class="col-sm-4 control-label">Диплом номери</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                           <input type="text" name="diplom_num" id="diplom_num">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Берилган сана</label>
                    <div class="col-sm-6">
                        <div class="input-group input-append date dpYears" id='datetimepicker2' data-date="12-02-2012"
                             data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" class="form-control" name="diplom_sana" id="diplom_sana" required value="<?php echo '';?>"/>
                            <span class="input-group-addon"> <i class="fa fa-calendar icon"></i></span> </div>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Ўқитиш даражаси</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <select name="malumot_id" id="malumot_id" class="form-control">
                                <option value="">Танланг...</option>
                                <?php $this->PreferencesModel->getMalumotDropList(); ?>

                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Ностарифи-кация</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <input type="text" name="diplom_num" id="diplom_num">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-4">Диплос нусхаси</label>
                    <div class="col-sm-8">
                        <input type="file" name="photo" id="photo" class="form-control" />
                        <input type="hidden" name="scan_photo" id="scan_photo" value="<?php echo ''; ?>">
                    </div>
                </div>

                <div class="form-group icheck ">
                    <label class="col-sm-4 control-label">Статус</label>
                    <div class="col-sm-2">
                        <div class="input-group">
                            <input type="checkbox" name="is_active" id="is_active" value="1" <?php if (0) {?>checked="checked" <?php }?> />
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>

