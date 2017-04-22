<?php
if(count(@$nation)==0) {
    ?>
    <div class="porlets-content">
        <div class="form-group lable-padd">
            <label class="col-sm-3">Миллат номи</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="millat_name" id="millat_name" maxlength="150" required/>
            </div>
        </div>
    </div>


    <?php
} else
{

    foreach($nation as $nationn) {?>
        <div class="porlets-content">
            <input type="hidden" name="nation" value="<?php echo $nationn['millat_id'];?>" />
            <div class="form-group lable-padd">
                <label class="col-sm-3">Миллат номи</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="millat_name" id="millat_name" maxlength="150"  value="<?php echo $nationn['millat_name'];?> " required/>
                </div>
            </div>


        </div>
    <?php } }?>