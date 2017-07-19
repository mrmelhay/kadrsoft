<div class="row">
    <div class="col-md-10">
        <div class="block-web">
            <div class="porlets-content">
                <div class="form-group">
                    <input type="hidden" name="dsaylov_id" id="dsaylov_id"
                           value="<?php echo $saylov['dsaylov_id']; ?>">
                    <label class="col-sm-5 control-label">Қаерга сайланган</label>
                    <div class="col-sm-6">
                        <select name="saylov_id" id="saylov_id" class="form-control">
                            <option value="">Танланг...</option>
                            <?php $this->PreferencesModel->getSaylovDropList($saylov['saylov_id']); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Сайланган йили</label>
                    <div class="col-sm-6">
                        <input type="text" name="saylov_year" class="form=control" id="saylov_year"
                               value="<?php echo $saylov['saylov_year']; ?>"/>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>





<script>

    $( function() {
        $( "#saylov_year" ).datepicker({
            changeMonth: true,
            changeYear: true
        });
    } );
</script>