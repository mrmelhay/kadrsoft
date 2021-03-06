<div class="row">
    <div class="col-md-12">
        <div class="block-web">
            <div class="porlets-content">
                <div class="form-group">
                    <input type="hidden" name="ilmiy_un_id" id="ilmiy_un_id"
                           value="<?php echo $ilmiyunvon['ilmiy_un_id']; ?>">
                    <label class="col-sm-5 control-label">Илмий унвони</label>
                    <div class="col-sm-5">
                        <select name="ilmiy_unvon_id" id="ilmiy_unvon_id" class="form-control">
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getIlmiyunvonDropList($ilmiyunvon['ilmiy_unvon_id']); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Берилган вақти</label>
                    <div class="col-sm-5">
                        <div class="input-group input-append date dpYears" id='datetimepicker2' data-date="12-02-2012"
                             data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" class="form-control" name="diplom_date" id="diplom_date" required
                                   value="<?php echo $ilmiyunvon['diplom_date']; ?>"/>
                            <span class="input-group-addon"> <i class="fa fa-calendar icon"></i></span></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Диплом номери</label>
                    <div class="col-sm-5">
                        <div class="input-group">
                            <input type="text" name="diplom_num" id="diplom_num"
                                   value="<?php echo $ilmiyunvon['diplom_ser']; ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-5 control-label">Диплом нусхаси</label>
                    <div class="col-sm-5">

                        <input type="file" name="photo" id="photo" class="form-control"/>
                        <input type="hidden" name="scan_photo" id="scan_photo" value="<?php echo $ilmiyunvon['scan_photo'];?>">

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
        $( "#diplom_date" ).datepicker({
            changeMonth: true,
            changeYear: true
        });
    } );


</script>