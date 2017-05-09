<div class="row">
    <div class="col-md-6">
        <div class="block-web">
            <input type="hidden" name="attestatsiya_id" id="attestatsiya_id" value="<?php echo ''; ?>" />
            <div class="porlets-content">

                <div class="form-group">
                    <label class="col-sm-5 control-label">Амалдаги малака лавозими (тоифаси)</label>
                    <div class="col-sm-6">
                        <select name="malaka_lavozim_id" id="malaka_lavozim_id" class="form-control" required>
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getMalakaLavDropList(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Амалдаги малака лавозимини эгаллаган йили</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="amal_mal_lav_bdate" id="amal_mal_lav_bdate" class="form-control" maxlength="4" value="<?php echo '';?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Амалдаги малака лавозимидан аввалги тоифаси</label>
                    <div class="col-sm-6">
                        <select name="amal_mal_lav_old_toifa" id="amal_mal_lav_old_toifa" class="form-control" required>
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getMalakaLavDropList(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Охирги марта аттестация жалб этилган йили</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="oxirgi_att_yili" id="oxirgi_att_yili" class="form-control" maxlength="4" value="<?php echo '';?>">
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
                    <label class="col-sm-5 control-label">Аттестациядан ўтган фани</label>
                    <div class="col-sm-6">
                        <select name="mutax_kodi_id" id="mutax_kodi_id" class="form-control" required>
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getMutaxasislikDropList(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Навбатдаги аттестацияга жалб этилган йили</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="nav_att_yili" id="nav_att_yili" class="form-control" maxlength="4" value="<?php echo '';?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Охирги аттестация комиссия хулосаси</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <textarea  name="oxirgi_att_xulosa" id="oxirgi_att_xulosa" class="form-control" style="resize:vertical; height: 100px; min-height: 100px; max-height: 500px " rows="6" value="<?php echo '';?>"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Тест топшириш тили</label>
                    <div class="col-sm-6">
                        <select name="tillar_id" id="tillar_id" class="form-control" required>
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getLanguageDropList(); ?>
                        </select>
                    </div>
                </div>




            </div>
        </div>
    </div>

</div>

