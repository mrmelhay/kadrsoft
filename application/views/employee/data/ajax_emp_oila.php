<div class="row">
    <div class="well"> Эслатма! вафот этган қариндошлари: қайси йилда вафот этганини ва оҳирги иш жойини-қавс ичида
        лавозимга ёзилсин, манзилга ҳеч нарса ёзилмасин
        <span class="semi-bold">Мисол учун: "1985 йил вафот этган, (НамДУда доцент)" шаклида</span>
    </div>
    <div class="col-md-6">
        <div class="block-web">
            <div class="porlets-content">

                <div class="form-group">
                    <input type="hidden" name="d_oila_id" id="d_oila_id" value="<?php echo $oila['d_oila_id']; ?>">
                    <label class="col-sm-5 control-label">Қариндошлар</label>
                    <div class="col-sm-7">
                        <select name="qarindosh_id" id="qarindosh_id" class="form-control">
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getQarindoshDropList($oila['qarindosh_id']); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Исми</label>
                    <div class="col-sm-7">
                        <div class="input-group">
                            <input type="text" name="q_name" id="q_name" value="<?php echo $oila['q_name']; ?>"
                                   required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Фамилияси</label>
                    <div class="col-sm-7">
                        <div class="input-group">
                            <input type="text" name="q_lname" id="q_lname" value="<?php echo $oila['q_lname']; ?>"
                                   required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Отасининг исми</label>
                    <div class="col-sm-7">
                        <div class="input-group">
                            <input type="text" name="q_mname" id="q_mname" value="<?php echo $oila['q_mname']; ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Туғилган йили</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="text" name="q_bdate" id="q_bdate" value="<?php echo $oila['q_bdate']; ?>"
                                   required maxlength="4">
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
                    <label class="col-sm-5 control-label">Вилоят</label>
                    <div class="col-sm-7">
                        <div class="input-group">
                            <select name="viloyat_id" id="viloyat_id" class="form-control" required>
                                <option value="">Танланг...</option>
                                <?php $this->PreferencesModel->getViloyatDropList($oila['viloyat_id']); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Туман</label>
                    <div class="col-sm-7">
                        <div class="input-group">
                            <select name="tuman_id" id="tuman_id" class="form-control" required>
                                <option value="">Танланг...</option>
                                <?php $this->PreferencesModel->getTumanDropList($oila['viloyat_id'],$oila['tuman_id']); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Манзили</label>
                    <div class="col-sm-7">
                        <div class="input-group">
                            <input type="text" name="q_address" id="q_address" value="<?php echo $oila['q_address']; ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Иш жойи ва лавозими</label>
                    <div class="col-sm-7">
                        <div class="input-group">
                            <input type="text" name="q_work" id="q_work" value="<?php echo $oila['q_work']; ?>" required
                                   placeholder="Ишжойи, лавозими шаклида ёзинг">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




