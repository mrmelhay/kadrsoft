<div class="row">
    <div class="col-md-6">
        <div class="block-web">
            <input type="hidden" name="muassasa_ish_id" id="muassasa_ish_id" value="<?php echo $muassasaish['muassasa_ish_id']; ?>" />
            <div class="porlets-content">

                <div class="form-group">
                    <label class="col-sm-5 control-label">Лавозим</label>
                    <div class="col-sm-6">
                        <select name="lavozim_id" id="lavozim_id" class="form-control" required>
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getLavozimDropList($muassasaish['lavozim_id']); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Мазкур лавозимда қачондан бери ишлайди</label>
                    <div class="col-sm-6">
                        <div class="input-group input-append date dpYears" id='datetimepicker2' data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" class="form-control" name="lavozim_bdate" id="lavozim_bdate" required value="<?php echo $muassasaish['lavozim_bdate'];?>"/>
                            <span class="input-group-addon"> <i class="fa fa-calendar icon"></i></span> </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Шартнома тури</label>
                    <div class="col-sm-6">
                        <select name="shartnoma_type_id" id="shartnoma_type_id" class="form-control" required>
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getShartnomatypeDropList($muassasaish['shartnoma_type_id']); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Шартнома номери</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="shartnoma_num" id="shartnoma_num" class="form-control" maxlength="50" value="<?php echo $muassasaish['shartnoma_num'];?>" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Ставкаси</label>
                    <div class="col-sm-4">
                        <input type="number" name="stavka" id="stavka" step="0.25" class="form-control" min="0" max="3" value="<?php echo $muassasaish['stavka'];?>" required>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="block-web">
            <div class="porlets-content">
                <div class="form-group">
                    <label class="col-sm-5 control-label">Ишга тайинланган буйруқ</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="ish_kir_buyruq" id="ish_kir_buyruq" class="form-control" maxlength="9" value="<?php echo $muassasaish['ish_kir_buyruq'];?>" >
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Ишдан бўшаган вақти</label>
                    <div class="col-sm-6">
                        <div class="input-group input-append date dpYears" id='datetimepicker2' data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" class="form-control" name="lavozim_tdate" id="lavozim_tdate"  value="<?php echo $muassasaish['lavozim_tdate'];?>"/>
                            <span class="input-group-addon"> <i class="fa fa-calendar icon"></i></span> </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Ишдан бўшаш сабаби</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="ish_bush_sabab" id="ish_bush_sabab" class="form-control" maxlength="9" value="<?php echo $muassasaish['ish_bush_sabab'];?>"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Ишдан бўшаган буйруқ</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="ish_bush_buyruq" id="ish_bush_buyruq" class="form-control" maxlength="9" value="<?php echo $muassasaish['ish_bush_buyruq'];?>" />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-5 control-label">Хужжат нусхаси</label>
                    <div class="col-sm-6">

                        <input type="file" name="photo" id="photo" class="form-control"/>
                        <input type="hidden" name="scan_photo" id="scan_photo" value="">

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

