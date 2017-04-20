<?php
if(count(@$partiya)==0) {
    ?>
    <div class="porlets-content">
        <div class="form-group lable-padd">
            <label class="col-sm-3">Партия номи</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="partiya_name" id="partiya_name" maxlength="150" required/>
            </div>
        </div>
    </div>
    <div class="form-group lable-padd">
        <label class="col-sm-3">Партия расмий сайти</label>
        <div class="col-sm-6">
            <input type="url" class="form-control" name="partiya_web" id="partiya_web" maxlength="150" required/>
        </div>

    </div>

    <?php
} else
{

    foreach($partiya as $partiyat) {?>
        <div class="porlets-content">
            <input type="hidden" name="partiya" value="<?php echo $partiyat['partiya_id'];?>" />
            <div class="form-group lable-padd">
                <label class="col-sm-3">Партия номи</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="partiya_name" id="partiya_name" maxlength="150"  value="<?php echo $partiyat['partiya_name'];?> " required/>
                </div>
            </div>
            <div class="form-group lable-padd">
                <label class="col-sm-3">Партия расмий сайти</label>
                <div class="col-sm-6">
                    <input type="url" class="form-control" name="partiya_web" id="partiya_web" maxlength="150" value="<?php echo $partiyat['partiya_web'];?>" required/>
                </div>

            </div>

        </div>
    <?php } }?>