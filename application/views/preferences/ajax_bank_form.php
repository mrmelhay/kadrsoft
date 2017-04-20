<?php
if(count(@$bank)==0) {
    ?>
    <div class="porlets-content">
        <div class="form-group lable-padd">
            <label class="col-sm-3">Банк номи</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="bank_name" id="bank_name" maxlength="150" required/>
            </div>
        </div>
    </div>
    <div class="form-group lable-padd">
        <label class="col-sm-3">Банк филиали номи</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="bank_filial_name" id="bank_filial_name" maxlength="255" required/>
        </div>

    </div>
    <div class="form-group lable-padd">
        <label class="col-sm-3">Банк филиали манзили</label>
        <div class="col-sm-9">
            <input type="text" class="form-control mask"  name="bank_addres" id="bank_addres" maxlength="255"   required />
        </div>

    </div>

    <div class="form-group lable-padd">
        <label class="col-sm-3">Банк МФО рақами</label>
        <div class="col-sm-3">
            <input type="text" class="form-control"  name="bank_mfo" id="bank_mfo" maxlength="5" required />
        </div>

    </div>

    <div class="form-group lable-padd">
        <label class="col-sm-3">Банк СТИР рақами</label>
        <div class="col-sm-3">
            <input type="text" class="form-control"  name="bank_stir" id="bank_stir" maxlength="9"  required />
        </div>

    </div>

    </div>

    <?php
} else
{

    foreach($bank as $bankt) {?>
        <div class="porlets-content">
            <input type="hidden" name="bank" value="<?php echo $bankt['bank_id'];?>" />
            <div class="form-group lable-padd">
                <label class="col-sm-3">Банк номи</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="bank_name" id="bank_name" maxlength="150"  value="<?php echo $bankt['bank_name'];?> " required/>
                </div>
            </div>
            <div class="form-group lable-padd">
                <label class="col-sm-3">Банк филиали номи</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="bank_filial_name" id="bank_filial_name" maxlength="255" value="<?php echo $bankt['bank_filial_name'];?>" required/>
                </div>

            </div>
            <div class="form-group lable-padd">
                <label class="col-sm-3">Банк филиали манзили</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control mask"  name="bank_addres" id="bank_addres"  maxlength="255" value="<?php echo $bankt['bank_addres'];?>" required/>
                </div>
            </div>
            <div class="form-group lable-padd">
                <label class="col-sm-3">Банк МФО рақами</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control"  name="bank_mfo" id="bank_mfo" value="<?php echo $bankt['bank_mfo'];?>" maxlength="5"  required/>
                </div>

            </div>

            <div class="form-group lable-padd">
                <label class="col-sm-3">Банк СТИР рақами</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control"  name="bank_stir" id="bank_stir" value="<?php echo $bankt['bank_stir'];?>" maxlength="9" required/>
                </div>

            </div>
        </div>
    <?php } }?>