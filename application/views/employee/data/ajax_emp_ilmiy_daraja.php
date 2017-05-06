<div class="row">
    <div class="col-md-12">
        <div class="block-web">
            <div class="porlets-content">
                <div class="form-group">
                    <input type="hidden" name="ilm_daraja_id" id="ilm_daraja_id" value="<?php echo '';?>">
                    <label class="col-sm-5 control-label">Илмий даража</label>
                    <div class="col-sm-5">
                        <select name="ilm_daraja_id" id="ilm_daraja_id" class="form-control">
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getIlmiyDarajaDropList(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <input type="hidden" name="ilm_fan_id" id="ilm_fan_id" value="<?php echo '';?>">
                    <label class="col-sm-5 control-label">Илмий фан</label>
                    <div class="col-sm-5">
                        <select name="ilm_fan_id" id="ilm_fan_id" class="form-control">
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getIlmiyFanDropList(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Берилган вақти</label>
                    <div class="col-sm-5">
                        <div class="input-group input-append date dpYears" id='datetimepicker2' data-date="12-02-2012"
                             data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" class="form-control" name="berilgan_vaqt" id="berilgan_vaqt" required value="<?php echo '';?>"/>
                            <span class="input-group-addon"> <i class="fa fa-calendar icon"></i></span> </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Диплом номери</label>
                    <div class="col-sm-5">
                        <div class="input-group">
                            <input type="text" name="diplom_ser" id="diplom_ser">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-5 control-label">Диплом нусхаси</label>
                    <div class="col-sm-5">

                        <input type="file" name="photo" id="photo" class="form-control" />
                        <input type="hidden" name="scan_photo" id="scan_photo" value="<?php echo ''; ?>">

                    </div>
                </div>


            </div>

        </div>
    </div>
</div>


</div>

