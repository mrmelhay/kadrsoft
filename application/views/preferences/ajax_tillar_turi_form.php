<?php
if(count(@$tillar_turi)==0) {
    ?>
    <div class="porlets-content">
        <div class="form-group lable-padd">
            <label class="col-sm-3">Тиллар билиш даражаси номи</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="tillar_turi_nomi" id="tillar_turi_nomi" maxlength="150" required/>
            </div>
        </div>
    </div>


    <?php
} else
{

    foreach($tillar_turi as $tillarr) {?>
        <div class="porlets-content">
            <input type="hidden" name="tillar_turi" value="<?php echo $tillarr['tillar_turi_id'];?>" />
            <div class="form-group lable-padd">
                <label class="col-sm-3">Тиллар билиш даражаси номи</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tillar_turi_nomi" id="tillar_turi_nomi" maxlength="150"  value="<?php echo $tillarr['tillar_turi_nomi'];?> " required/>
                </div>
            </div>


        </div>
    <?php } }?>