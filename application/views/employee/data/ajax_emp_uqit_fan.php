<div class="row">
    <div class="col-md-6">
        <div class="block-web">
            <input type="hidden" name="uqit_fan_id" id="uqit_fan_id" value="<?php echo $fanlari['uqit_fan_id']; ?>" />
            <div class="porlets-content">

                <div class="form-group">
                    <label class="col-sm-5 control-label">Фан тури</label>
                    <div class="col-sm-6">
                        <select name="fan_turi_id" id="fan_turi_id" class="form-control" required>
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getFanTuriDropList($fanlari['fan_turi_id']); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Фан номи</label>
                    <div class="col-sm-6">
                        <select name="fanlar_id" id="fanlar_id" class="form-control select22" required>
                           <?php if ($fanlari['fanlar_id']) {?>
                            <?php $this->PreferencesModel->getFanlarDropList($fanlari['fan_turi_id'],$fanlari['fanlar_id']); ?>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Дарс соати миқдори</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="dars_soat_all" id="dars_soat_all" class="form-control" maxlength="5" value="<?php echo $fanlari['dars_soat_all'];?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">  || 1-семестрда</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="dars_soat1" id="dars_soat1" class="form-control" maxlength="5" value="<?php echo $fanlari['dars_soat1'];?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">  || 2-семестрда</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="dars_soat2" id="dars_soat2" class="form-control" maxlength="5" value="<?php echo $fanlari['dars_soat2'];?>">
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
                            <?php $this->PreferencesModel->getUqitSohaDropList($fanlari['uqit_soha_id']); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Йиллик юкламаси</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="yillik_yuklama" id="yillik_yuklama" class="form-control" maxlength="5" value="<?php echo $fanlari['yillik_yuklama'];?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">  || ўқув юклама</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="yil_uquv_yuklama" id="yil_uquv_yuklama" class="form-control" maxlength="5" value="<?php echo $fanlari['yil_uquv_yuklama'];?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">  || педагогик юклама</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="yil_ped_yuklama" id="yil_ped_yuklama" class="form-control" maxlength="5" value="<?php echo $fanlari['yil_ped_yuklama'];?>">
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>
<script>
    $(document).ready(function () {
        $(document).on('change', "#fan_turi_id", function () {
            var page = $('select[name="fan_turi_id"]').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('/preferences/ajax_data_fanlar')?>",
                data: {fan_turi_id: page},
                success: function (data) {
                    $('#fanlar_id').html(data);
                }
            });
        });
    });

    $(document).ready(function() {
        $(".select22").select2();
    });


    $( function() {
        $( "#lavozim_bdate, #lavozim_tdate" ).datepicker({
            changeMonth: true,
            changeYear: true
        });
    } );

</script>
