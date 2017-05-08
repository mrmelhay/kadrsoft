<div class="row">
    <div class="col-md-6">
        <div class="block-web">
<input type="hidden" name="passport_id" id="passport_id" value="<?php echo $passport['passport_id'] ?>" />
            <div class="porlets-content">

                <div class="form-group">
                    <label class="col-sm-5 control-label">Паспорт серия</label>
                    <div class="col-sm-5">
                        <input type="text" name="ps_ser" id="ps_ser" class="form-control" maxlength="2" required value="<?php echo $passport['ps_ser'];?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Паспорт номери</label>
                    <div class="col-sm-5">
                        <input type="text" name="ps_num" id="ps_num" class="form-control" maxlength="7" value="<?php echo $passport['ps_num'];?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Берилган вақти</label>
                    <div class="col-sm-6">
                        <div class="input-group input-append date dpYears" id='datetimepicker2' data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" class="form-control" name="date_of_given" id="date_of_given" required value="<?php echo $passport['date_of_given'];?>"/>
                            <span class="input-group-addon"> <i class="fa fa-calendar icon"></i></span> </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Амал қилиш муддати</label>
                    <div class="col-sm-6">
                        <div class="input-group input-append date dpYears" id='datetimepicker2' data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" class="form-control" name="date_of_expr" id="date_of_expr" required value="<?php echo $passport['date_of_expr'];?>"/>
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
                    <label class="col-sm-3 control-label">Давлат</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <select name="davlat_id" id="davlat_id" class="form-control">
                                <option value="">Танланг...</option>
                                <?php $this->PreferencesModel->getDavlatDropList($passport['davlat_id']); ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Вилоят</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <select name="viloyat_id" id="viloyat_id" class="form-control">
                                <option value="">Танланг...</option>
                                <?php $this->PreferencesModel->getViloyatDropList($passport['viloyat_id']); ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Туман</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <select name="tuman_id" id="tuman_id" class="form-control">
                                <option value="">Танланг...</option>

                                    <?php $this->PreferencesModel->getTumanDropList($passport['viloyat_id'], $passport['tuman_id']); ?>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group icheck ">
                    <label class="col-sm-3 control-label">Статус</label>
                    <div class="col-sm-2">
                        <div class="input-group">
                            <input type="checkbox" name="is_active" id="is_active" value="1" <?php if ($passport['is_active']) {?>checked="checked" <?php }?> />
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

