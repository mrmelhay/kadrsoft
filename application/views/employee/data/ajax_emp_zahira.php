<div class="row">
    <div class="col-md-10">
        <div class="block-web">
            <div class="porlets-content">
                <div class="form-group">
                    <input type="hidden" name="dmukofot_id" id="dmukofot_id" value="<?php echo $zahira['zahira_id']; ?>">
                    <label class="col-sm-5 control-label">Қайси лавозимга захирага олинган</label>
                    <div class="col-sm-6">
                        <select name="lavozim_id" id="lavozim_id" class="form-control select22">
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getLavozimDropList($zahira['lavozim_id']); ?>
                        </select>
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-sm-5 control-label">Захирага олинган санаси</label>
                    <div class="col-sm-6">
                        <input type="text" name="zahira_year" class="form-control" id="zahira_year" value="<?php echo $zahira['zahira_year'];?>"/>
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
        $( "#zahira_year").datepicker({
            changeMonth: true,
            changeYear: true
        });
    } );
</script>