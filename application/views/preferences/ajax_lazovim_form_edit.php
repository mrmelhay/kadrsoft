<div class="porlets-content">
    <input type="hidden" name="lavozim" value="<?php echo isset($lavozim['lavozim_id'])?$lavozim['lavozim_id']:0;?>" />
    <div class="form-group lable-padd">
        <label class="col-sm-3">Лавозим номи</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="lavozim_name" id="lavozim_name" maxlength="150"  value="<?php echo isset($lavozim['lavozim_name'])?$lavozim['lavozim_name']:"";?>" required/>
        </div>
    </div>
    <div class="form-group lable-padd">
        <label class="col-sm-3">Лавозим тури</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="type" id="type" maxlength="30" value="<?php echo isset($lavozim['type'])?$lavozim['type']:0;?>" required/>
        </div>

    </div>
</div>