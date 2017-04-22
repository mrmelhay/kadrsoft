<?php
if(count(@$sprcontract)==0) {
    ?>
    <div class="porlets-content">
        <div class="form-group lable-padd">
            <label class="col-sm-3">Шартнома тури номи</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="shartnoma_type_name" id="shartnoma_type_name" maxlength="150" required/>
            </div>
        </div>
    </div>


    <?php
} else
{

    foreach($sprcontract as $contractt) {?>
        <div class="porlets-content">
            <input type="hidden" name="spcontract" value="<?php echo $contractt['shartnoma_type_id'];?>" />
            <div class="form-group lable-padd">
                <label class="col-sm-3">Шартнома тури номи</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="shartnoma_type_name" id="shartnoma_type_name" maxlength="150"  value="<?php echo $contractt['shartnoma_type_name'];?> " required/>
                </div>
            </div>


        </div>
    <?php } }?>