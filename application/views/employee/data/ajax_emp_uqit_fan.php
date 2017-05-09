<div class="row">
    <div class="col-md-6">
        <div class="block-web">
            <input type="hidden" name="uqit_fan_id" id="uqit_fan_id" value="<?php echo ''; ?>" />
            <div class="porlets-content">

                <div class="form-group">
                    <label class="col-sm-5 control-label">Фан тури</label>
                    <div class="col-sm-6">
                        <select name="fan_turi_id" id="fan_turi_id" class="form-control" required>
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getFanTuriDropList(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Фан номи</label>
                    <div class="col-sm-6">
                        <select name="fanlar_id" id="fanlar_id" class="form-control" required>
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getFanlarDropList(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Дарс соати миқдори</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="dars_soat_all" id="dars_soat_all" class="form-control" maxlength="5" value="<?php echo '';?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">  || 1-семестрда</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="dars_soat1" id="dars_soat1" class="form-control" maxlength="5" value="<?php echo '';?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">  || 2-семестрда</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="dars_soat2" id="dars_soat2" class="form-control" maxlength="5" value="<?php echo '';?>">
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
                    <label class="col-sm-5 control-label">Ўқитиш соҳаси</label>
                    <div class="col-sm-6">
                        <select name="uqit_soha_id" id="uqit_soha_id" class="form-control">
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getUqitSohaDropList(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Йиллик юкламаси</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="yillik_yuklama" id="yillik_yuklama" class="form-control" maxlength="5" value="<?php echo '';?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">  || ўқув юклама</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="yil_uquv_yuklama" id="yil_uquv_yuklama" class="form-control" maxlength="5" value="<?php echo '';?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">  || педагогик юклама</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="yil_ped_yuklama" id="yil_ped_yuklama" class="form-control" maxlength="5" value="<?php echo '';?>">
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>

