<div class="row">
    <div class="col-md-12">
        <div class="block-web">
            <div class="porlets-content">
                <div class="form-group">
                    <input type="hidden" name="tillar_bind_id" id="tillar_bind_id" value="<?php echo $language['tillar_bind_id']?>">
                    <label class="col-sm-5 control-label">Тил</label>
                    <div class="col-sm-5">
                        <select name="tillar_id" id="tillar_id" class="form-control">
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getLanguageDropList($language['tillar_id']); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Билиш даражаси</label>
                    <div class="col-sm-5">
                        <select name="tillar_turi_id" id="tillar_turi_id" class="form-control">
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getLanguageTypeDropList($language['tillar_turi_id']); ?>
                        </select>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>

