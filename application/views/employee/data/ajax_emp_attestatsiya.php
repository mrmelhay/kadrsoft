<div class="row">
    <div class="col-md-6">
        <div class="block-web">
            <input type="hidden" name="attestatsiya_id" id="attestatsiya_id" value="<?php echo $attestasiya['attestatsiya_id']; ?>" />
            <div class="porlets-content">

                <div class="form-group">
                    <label class="col-sm-5 control-label">Амалдаги малака лавозими (тоифаси)</label>
                    <div class="col-sm-6">
                        <select name="malaka_lavozim_id" id="malaka_lavozim_id" class="form-control" required>
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getMalakaLavDropList($attestasiya['malaka_lavozim_id']); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Амалдаги малака лавозимини эгаллаган йили</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="amal_mal_lav_bdate" id="amal_mal_lav_bdate" class="form-control" maxlength="4" value="<?php echo $attestasiya['amal_mal_lav_bdate'];?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Амалдаги малака лавозимидан аввалги тоифаси</label>
                    <div class="col-sm-6">
                        <select name="amal_mal_lav_old_toifa" id="amal_mal_lav_old_toifa" class="form-control" required>
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getMalakaLavDropList($attestasiya['amal_mal_lav_old_toifa']); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Охирги марта аттестация жалб этилган йили</label>
                    <div class="col-sm-6">
                        <div id="datetimepicker1" class="input-group date">
                            <input type="text" name="oxirgi_att_yili" id="oxirgi_att_yili"  class="form-control" maxlength="4"
                                   value="<?php echo $attestasiya['oxirgi_att_yili'];?>">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar icon"></i>
<!--                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>-->
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Тест топшириш тили</label>
                    <div class="col-sm-6">
                        <select name="tillar_id" id="tillar_id" class="form-control" required>
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getLanguageDropList($attestasiya['tillar_id']); ?>
                        </select>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="block-web">
            <div class="porlets-content">
                <div class="form-group">
                    <label class="col-sm-5 control-label">Фан тури</label>
                    <div class="col-sm-6">
                        <select name="fan_turi_id" id="fan_turi_id" class="form-control" required>
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getFanTuriDropList($attestasiya['fan_turi_id']); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Фан номи</label>
                    <div class="col-sm-6">
                        <select name="fanlar_id" id="fanlar_id" class="form-control select22" required>
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getFanlarDropList($attestasiya['fan_turi_id'],$attestasiya['fanlar_id']); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Навбатдаги аттестацияга жалб этилган йили</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="nav_att_yili" id="nav_att_yili" class="form-control" maxlength="4" value="<?php echo $attestasiya['nav_att_yili'];?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Охирги аттестация комиссия хулосаси</label>
                    <div class="col-sm-6">
                        <div class="input-group ">
                            <textarea  name="oxirgi_att_xulosa" id="oxirgi_att_xulosa" class="form-control" style="resize:vertical; height: 100px; min-height: 100px; max-height: 500px " rows="6" ><?php echo $attestasiya['oxirgi_att_xulosa'];?></textarea>
                        </div>
                    </div>
                </div>





            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
        $(".select22").select2();
    });


    $( function() {
        $( "#amal_mal_lav_bdate, #oxirgi_att_yili, #nav_att_yili" ).datepicker({
            changeMonth: true,
            changeYear: true
        });
    } );
</script>