<?php
if(count(@$uqit_soha)==0) {
    ?>
    <div class="porlets-content">
        <div class="form-group lable-padd">
            <label class="col-sm-3">Ўқитиш тури номи</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="uqit_soha_name" id="uqit_soha_name" maxlength="150" required/>
            </div>
        </div>
    </div>


    <?php
} else
{

    foreach($uqit_soha as $uqit_sohaa) {?>
        <div class="porlets-content">
            <input type="hidden" name="uqit_soha" value="<?php echo $uqit_sohaa['uqit_soha_id'];?>" />
            <div class="form-group lable-padd">
                <label class="col-sm-3">Ўқитиш тури номи</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="uqit_soha_name" id="uqit_soha_name" maxlength="150"
                           value="<?php echo $uqit_sohaa['uqit_soha_name'];?> " required/>
                </div>
            </div>

        </div>
    <?php } }?>