<div class="row">
    <div class="col-md-6">
        <div class="block-web">
            <input type="hidden" name="qaytat_id" id="qaytat_id" value="<?php echo $qaytamalaka['qaytat_id']; ?>" />
            <div class="porlets-content">

                <div class="form-group">
                    <label class="col-sm-5 control-label">Қайта тайёрлов тури</label>
                    <div class="col-sm-5">
                        <select name="qayta_turi_id" id="qayta_turi_id" class="form-control">
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getQaytatturiDropList($qaytamalaka['qayta_turi_id']); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Қайта таёрланган фан</label>
                    <div class="col-sm-5">
                        <select name="qayta_fan_id" id="qayta_fan_id" class="form-control">
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getQaytatfanDropList($qaytamalaka['qayta_fan_id']); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Бошланган вақти</label>
                    <div class="col-sm-6">
                        <div class="input-group input-append date dpYears" id='datetimepicker2' data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" class="form-control" name="qayta_bdate" id="qayta_bdate" required value="<?php echo $qaytamalaka['qayta_bdate'];?>"/>
                            <span class="input-group-addon"> <i class="fa fa-calendar icon"></i></span> </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Тугатган вақти</label>
                    <div class="col-sm-6">
                        <div class="input-group input-append date dpYears" id='datetimepicker2' data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" class="form-control" name="qayta_tdate" id="qayta_tdate" required value="<?php echo $qaytamalaka['qayta_bdate'];?>"/>
                            <span class="input-group-addon"> <i class="fa fa-calendar icon"></i></span> </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="block-web">
            <div class="porlets-content">

                <div class="form-group">
                    <label class="col-sm-5 control-label">ҚТ муассасаси</label>
                    <div class="col-sm-6">
                        <select name="otm_id" id="otm_id" class="form-control">
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getUniverDropList($qaytamalaka['otm_id']); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Олган хужжати</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <select name="malaka_xujjat_id" id="malaka_xujjat_id" class="form-control">
                                <option value="">Танланг...</option>
                                <?php $this->PreferencesModel->getMalakaXujjatDropList($qaytamalaka['malaka_xujjat_id']); ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Хужжат рақами</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="qayta_xujjat_num" id="qayta_xujjat_num" class="form-control" maxlength="9" value="<?php echo $qaytamalaka['qayta_xujjat_num'];?>" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Хужжат санаси</label>
                    <div class="col-sm-6">
                        <div class="input-group input-append date dpYears" id='datetimepicker2' data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" class="form-control" name="qayta_xujjat_date" id="qayta_xujjat_date" required value="<?php echo $qaytamalaka['qayta_xujjat_date'];?>"/>
                            <span class="input-group-addon"> <i class="fa fa-calendar icon"></i></span> </div>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="col-sm-5 control-label">Статус</label>
                    <div class="col-sm-2  ">
                        <div class="input-group">
                            <input type="checkbox" name="is_active" id="is_active" value="1" <?php if ($qaytamalaka['is_active']) {?> checked="checked" <?php } ?>/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-5 control-label">Хужжат нусхаси</label>
        <div class="col-sm-5">

            <input type="file" name="photo" id="photo" class="form-control"/>
            <input type="hidden" name="scan_photo" id="scan_photo" value="<?php echo ''; ?>">

        </div>
    </div>
</div>

