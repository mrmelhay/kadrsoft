<div class="row">
    <div class="col-md-12">
        <div class="block-web">
            <div class="porlets-content">
                <div class="form-group">
                    <input type="hidden" name="tillar_bind_id" id="ilmiy_unvon_id" value="<?php echo '';?>">
                    <label class="col-sm-5 control-label">Илмий унвони</label>
                    <div class="col-sm-5">
                        <select name="ilmiy_unvon_id" id="ilmiy_unvon_id" class="form-control">
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getIlmiyunvonDropList(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Берилган вақти</label>
                    <div class="col-sm-5">
                        <div class="input-group input-append date dpYears" id='datetimepicker2' data-date="12-02-2012"
                             data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" class="form-control" name="diplom_date" id="diplom_date" required value="<?php echo '';?>"/>
                            <span class="input-group-addon"> <i class="fa fa-calendar icon"></i></span> </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Диплом номери</label>
                    <div class="col-sm-5">
                        <div class="input-group">
                            <input type="text" name="diplom_num" id="diplom_num">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-5 control-label">Диплом нусхаси</label>
                    <div class="col-sm-5">

                        <input type="file" name="photo" id="photo" class="form-control" />
                        <input type="hidden" name="scan_photo" id="scan_photo" value="<?php echo ''; ?>">

                    </div>
                </div>


                </div>

            </div>
        </div>
    </div>


</div>

