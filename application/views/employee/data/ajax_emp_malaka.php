<div class="row">
    <div class="col-md-6">
        <div class="block-web">
            <input type="hidden" name="malaka_id" id="malaka_id" value="<?php echo ''; ?>" />
            <div class="porlets-content">

                <div class="form-group">
                    <label class="col-sm-5 control-label">Малака ошириш тури</label>
                    <div class="col-sm-5">
                        <select name="malaka_turi_id" id="malaka_turi_id" class="form-control">
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getMalakaTuriDropList(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">МО йўналиши номи</label>
                    <div class="col-sm-5">
                        <input type="text" name="ps_num" id="ps_num" class="form-control" maxlength="7" value="<?php echo '';?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Бошланган вақти</label>
                    <div class="col-sm-6">
                        <div class="input-group input-append date dpYears" id='datetimepicker2' data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" class="form-control" name="kirgan_yili" id="kirgan_yili" required value="<?php echo '';?>"/>
                            <span class="input-group-addon"> <i class="fa fa-calendar icon"></i></span> </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Тугатган вақти</label>
                    <div class="col-sm-6">
                        <div class="input-group input-append date dpYears" id='datetimepicker2' data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" class="form-control" name="kirgan_yili" id="kirgan_yili" required value="<?php echo '';?>"/>
                            <span class="input-group-addon"> <i class="fa fa-calendar icon"></i></span> </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">МО муассасаси</label>
                    <div class="col-sm-6">
                        <select name="davlat_id" id="davlat_id" class="form-control">
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getUniverDropList(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Олган хужжати</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <select name="malaka_xujjat_id" id="malaka_xujjat_id" class="form-control">
                                <option value="">Танланг...</option>
                                <?php $this->PreferencesModel->getMalakaXujjatDropList(); ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Хужжат рақами</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="ps_num" id="ps_num" class="form-control" maxlength="9" value="<?php echo '';?>" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Хужжат санаси</label>
                    <div class="col-sm-6">
                        <div class="input-group input-append date dpYears" id='datetimepicker2' data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" class="form-control" name="kirgan_yili" id="kirgan_yili" required value="<?php echo '';?>"/>
                            <span class="input-group-addon"> <i class="fa fa-calendar icon"></i></span> </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-5 control-label">МО соатлари</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="ps_num" id="ps_num" class="form-control" maxlength="4" value="<?php echo '';?>" required>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="block-web">
            <div class="porlets-content">

                <div class="form-group">
                    <label class="col-sm-5 control-label">Кейинги МО санаси</label>
                    <div class="col-sm-6">
                        <div class="input-group input-append date dpYears" id='datetimepicker2' data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" class="form-control" name="kirgan_yili" id="kirgan_yili" required value="<?php echo '';?>"/>
                            <span class="input-group-addon"> <i class="fa fa-calendar icon"></i></span> </div>
                    </div>
                </div>


                <div class="panel-body center">
                    <h5 class="blue_text">Хорижда малака ошириш</h5>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Қайси давлат</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <select name="malaka_xujjat_id" id="malaka_xujjat_id" class="form-control">
                                <option value="">Танланг...</option>
                                <?php $this->PreferencesModel->getDavlatDropList(); ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Хорижий муассаса номи</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="ps_num" id="ps_num" class="form-control" maxlength="4" value="<?php echo '';?>" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Бошланган вақти</label>
                    <div class="col-sm-6">
                        <div class="input-group input-append date dpYears" id='datetimepicker2' data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" class="form-control" name="kirgan_yili" id="kirgan_yili" required value="<?php echo '';?>"/>
                            <span class="input-group-addon"> <i class="fa fa-calendar icon"></i></span> </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Тугатган вақти</label>
                    <div class="col-sm-6">
                        <div class="input-group input-append date dpYears" id='datetimepicker2' data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" class="form-control" name="kirgan_yili" id="kirgan_yili" required value="<?php echo '';?>"/>
                            <span class="input-group-addon"> <i class="fa fa-calendar icon"></i></span> </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Ташкилотчи номи</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="ps_num" id="ps_num" class="form-control" maxlength="4" value="<?php echo '';?>" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">МО йўналиши</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="ps_num" id="ps_num" class="form-control" maxlength="4" value="<?php echo '';?>" required>
                        </div>
                    </div>
                </div>


                <div class="form-group ">
                    <label class="col-sm-5 control-label">Статус</label>
                    <div class="col-sm-2  ">
                        <div class="input-group">
                            <input type="checkbox" name="is_active" id="is_active" value="1" checked />
                        </div>
                    </div>
                </div>







            </div>
        </div>
    </div>
</div>

