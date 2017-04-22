<?php
if(count(@$tillar)==0) {
    ?>
    <div class="porlets-content">
        <div class="form-group lable-padd">
            <label class="col-sm-3">Тиллар номи</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="tillar_nomi" id="tillar_nomi" maxlength="150" required/>
            </div>
        </div>
    </div>


    <?php
} else
{

    foreach($tillar as $tillarr) {?>
        <div class="porlets-content">
            <input type="hidden" name="tillar" value="<?php echo $tillarr['tillar_id'];?>" />
            <div class="form-group lable-padd">
                <label class="col-sm-3">Тиллар номи</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tillar_nomi" id="tillar_nomi" maxlength="150"  value="<?php echo $tillarr['tillar_nomi'];?> " required/>
                </div>
            </div>


        </div>
    <?php } }?>