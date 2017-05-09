<div class="row">
    <div class="col-md-12">
        <div class="block-web">
            <input type="hidden" name="mehnat_id" id="mehnat_id" value="<?php echo $mehnat['mehnat_id'];?>"/>
            <div class="porlets-content">
                <div class="form-group">
                    <label class="col-md-4 control-label">Ишлаган вақти</label>
                    <div class="col-md-8">
                        <input type="text" name="ish_vaqti" id="ish_vaqti" value="<?php echo $mehnat['ish_vaqti'];?>" >
                        <p class="help-block">мисол: 2000-2005 йй, ёки 2005 - ҳ.в</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Ишлаган муассаси номи ва лавозими</label>
                    <div class="col-md-8">
                        <input type="text" name="ish_tashkilot" id="ish_tashkilot" value="<?php echo $mehnat['ish_tashkilot'];?>">
                        <p class="help-block">мисол: Муассаса номи, лавозими</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Жойлашиш тартиби</label>
                    <div class="col-md-3">
                        <input type="number" name="ordering" id="ordering" value="<?php echo $mehnat['ordering'];?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

