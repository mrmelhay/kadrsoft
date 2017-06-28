<div class="row">
    <div class="col-md-10">
        <div class="block-web">
            <div class="porlets-content">
                <div class="form-group">
                    <input type="hidden" name="moderator_id" id="moderator_id" value="<?php echo $moderator['moderator_id']; ?>">
                    <label class="col-sm-5 control-label">Лавозими</label>
                    <div class="col-sm-6">
                        <select name="lavozim_id" id="lavozim_id" class="form-control">
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getLavozimDropList($moderator['lavozim_id']); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Фан номи</label>
                    <div class="col-sm-6">
                        <select name="fanlar_id" id="fanlar_id" class="form-control">
                            <?php $this->PreferencesModel->getFanlarDropList(null,$moderator['fanlar_id']); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Тренинг номи</label>
                    <div class="col-sm-6">
                       <input type="text" name="training_name" class="form=control" id="training_name" value="<?php echo $moderator['training_name'];?>"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Тренинг санаси</label>
                    <div class="col-sm-6">
                        <input type="text" name="training_date" class="form=control" id="training_date" value="<?php echo $moderator['training_date'];?>"/>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>




