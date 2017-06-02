<div class="row">
    <div class="col-md-10">
        <div class="block-web">
            <div class="porlets-content">
                <div class="form-group">
                    <input type="hidden" name="dmukofot_id" id="dmukofot_id" value="<?php echo $mukofot['dmukofot_id']; ?>">
                    <label class="col-sm-5 control-label">Давлат мукофотлари</label>
                    <div class="col-sm-7">
                        <select name="mukofot_id" id="mukofot_id" class="form-control">
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getMukofotDropList($mukofot['mukofot_id']); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Олган йили</label>
                    <div class="col-sm-7">
                        <div class="input-group">
                            <input type="text" name="year" id="year" value="<?php echo $mukofot['year']; ?>"
                                   required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>




