<div class="row">
    <div class="col-md-6">
        <div class="block-web">
            <input type="hidden" name="muassasa_ish_id" id="muassasa_ish_id" value="<?php echo ''; ?>" />
            <div class="porlets-content">

                <div class="form-group">
                    <label class="col-sm-5 control-label">Фан тури</label>
                    <div class="col-sm-6">
                        <select name="lavozim_id" id="lavozim_id" class="form-control" required>
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getLavozimDropList(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Фан номи</label>
                    <div class="col-sm-6">
                        <select name="lavozim_id" id="lavozim_id" class="form-control" required>
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getLavozimDropList(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Дарс соати миқдори</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="shartnoma_num" id="shartnoma_num" class="form-control" maxlength="50" value="<?php echo '';?>" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">  || 1-семестрда</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="shartnoma_num" id="shartnoma_num" class="form-control" maxlength="50" value="<?php echo '';?>" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">  || 2-семестрда</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="shartnoma_num" id="shartnoma_num" class="form-control" maxlength="50" value="<?php echo '';?>" required>
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
                        <select name="lavozim_id" id="lavozim_id" class="form-control" required>
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getLavozimDropList(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Йиллик юкламаси</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="shartnoma_num" id="shartnoma_num" class="form-control" maxlength="50" value="<?php echo '';?>" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">  || ўқув юкламаси</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="shartnoma_num" id="shartnoma_num" class="form-control" maxlength="50" value="<?php echo '';?>" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">  || педагогик юкламаси</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="shartnoma_num" id="shartnoma_num" class="form-control" maxlength="50" value="<?php echo '';?>" required>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>

