<div class="row">
    <div class="col-md-6">
        <div class="block-web">
            <input type="hidden" name="malaka_id" id="malaka_id" value="<?php echo $malaka['malaka_id']; ?>" />
            <div class="porlets-content">

                <div class="form-group">
                    <label class="col-sm-5 control-label">Малака ошириш тури</label>
                    <div class="col-sm-5">
                        <select name="malaka_turi_id" id="malaka_turi_id" class="form-control">
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getMalakaTuriDropList($malaka['malaka_turi_id']); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">МО йўналиши номи</label>
                    <div class="col-sm-5">
                        <input type="text" name="malaka_nomi" id="malaka_nomi" class="form-control"  value="<?php echo $malaka['malaka_nomi'];?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Бошланган вақти</label>
                    <div class="col-sm-6">
                        <div class="input-group input-append date dpYears" id='datetimepicker2' data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" class="form-control" name="b_vaqti" id="b_vaqti" value="<?php echo $malaka['b_vaqti'];?>"/>
                            <span class="input-group-addon"> <i class="fa fa-calendar icon"></i></span> </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Тугатган вақти</label>
                    <div class="col-sm-6">
                        <div class="input-group input-append date dpYears" id='datetimepicker2' data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" class="form-control" name="t_vaqti" id="t_vaqti" required value="<?php echo $malaka['t_vaqti'];?>"/>
                            <span class="input-group-addon"> <i class="fa fa-calendar icon"></i></span> </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">МО муассасаси</label>
                    <div class="col-sm-6">
                        <select name="otm_id" id="otm_id" class="form-control select22">
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getUniverDropList($malaka['otm_id']); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Олган хужжати</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <select name="malaka_xujjat_id" id="malaka_xujjat_id" class="form-control">
                                <option value="">Танланг...</option>
                                <?php $this->PreferencesModel->getMalakaXujjatDropList($malaka['malaka_xujjat_id']); ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Хужжат рақами</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="malaka_xujjat_num" id="malaka_xujjat_num" class="form-control" maxlength="9" value="<?php echo $malaka['malaka_xujjat_num'];?>" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Хужжат санаси</label>
                    <div class="col-sm-6">
                        <div class="input-group input-append date dpYears" id='datetimepicker2' data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" class="form-control" name="malaka_xujjat_date" id="malaka_xujjat_date" required value="<?php echo $malaka['malaka_xujjat_date'];?>"/>
                            <span class="input-group-addon"> <i class="fa fa-calendar icon"></i></span> </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-5 control-label">МО соатлари</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="malaka_soat" id="malaka_soat" class="form-control" maxlength="4" value="<?php echo $malaka['malaka_soat'];?>" required>
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
                    <label class="col-sm-5 control-label">Кейинги МО санаси</label>
                    <div class="col-sm-6">
                        <div class="input-group input-append date dpYears" id='datetimepicker2' data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" class="form-control" name="malaka_keyingi_sana" id="malaka_keyingi_sana" required value="<?php echo $malaka['malaka_keyingi_sana'];?>"/>
                            <span class="input-group-addon"> <i class="fa fa-calendar icon"></i></span> </div>
                    </div>
                </div>


                <div class="panel-body center">
                    <h5 class="blue_text">Хорижда малака ошириш</h5>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Қайси давлат</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <select name="davlat_id" id="davlat_id" class="form-control">
                                <option value="">Танланг...</option>
                                <?php $this->PreferencesModel->getDavlatDropList($malaka['davlat_id']); ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Хорижий муассаса номи</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="malaka_xorij_institut" id="malaka_xorij_institut" class="form-control"  value="<?php echo $malaka['malaka_xorij_institut'];?>"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Бошланган вақти</label>
                    <div class="col-sm-6">
                        <div class="input-group input-append date dpYears" id='datetimepicker2' data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" class="form-control" name="xmb_vaqti" id="xmb_vaqti"  value="<?php echo $malaka['xmb_vaqti'];?>"/>
                            <span class="input-group-addon"> <i class="fa fa-calendar icon"></i></span> </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Тугатган вақти</label>
                    <div class="col-sm-6">
                        <div class="input-group input-append date dpYears" id='datetimepicker2' data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" class="form-control" name="xmt_vaqti" id="xmt_vaqti" value="<?php echo $malaka['xmt_vaqti'];?>"/>
                            <span class="input-group-addon"> <i class="fa fa-calendar icon"></i></span> </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">Ташкилотчи номи</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="malaka_organizator" id="malaka_organizator" class="form-control" value="<?php echo $malaka['malaka_organizator'];?>"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label">МО йўналиши</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="malaka_yunalishi" id="malaka_yunalishi" class="form-control" value="<?php echo $malaka['malaka_yunalishi'];?>">
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="col-sm-5 control-label">Статус</label>
                    <div class="col-sm-2  ">
                        <div class="input-group">
                            <input type="checkbox" name="is_active" id="is_active" value="1" <?php if ($malaka['is_active']) {?> checked="checked" <?php }?> />
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
        $( "#b_vaqti, #t_vaqti, #malaka_keyingi_sana, #xmb_vaqti, #xmt_vaqti, #malaka_xujjat_date" ).datepicker({
            changeMonth: true,
            changeYear: true
        });
    } );


</script>