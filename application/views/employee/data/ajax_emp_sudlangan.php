<div class="row">
    <div class="col-md-12">
        <div class="block-web">
            <input type="hidden" name="sudlanganlik_id" id="sudlanganlik_id" value="<?php echo $sudlanganlik['sudlanganlik_id']; ?>">
            <div class="porlets-content">

                <div class="form-group">
                    <label class="col-sm-3 control-label">Судланган йили</label>
                    <div class="col-sm-9">
                        <input type="text" name="sud_year" class="form=control" id="sud_year" value="<?php echo $sudlanganlik['sud_year'];?>"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Судланганлик ҳолати <br/><i>қайси кодекс ва қайси статья бўйича</i></label>
                    <div class="col-sm-9">
                        <textarea name="sud_kodeks" rows="8" cols="75" class="form=control" id="sud_kodeks"><?php echo $sudlanganlik['sud_kodeks'];?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>




