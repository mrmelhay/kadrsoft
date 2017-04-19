<?php
if(count(@$otm)==0) {
    ?>
    <div class="porlets-content">
        <div class="form-group lable-padd">
            <label class="col-sm-3">Олий таълим муассаси номи</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="otm_name" id="otm_name" maxlength="150" required/>
            </div>
        </div>
    </div>
    <div class="form-group lable-padd">
        <label class="col-sm-3">ОТМ қисқартма номи</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="otm_lname" id="otm_lname" maxlength="30" required/>
        </div>

    </div>
    <div class="form-group lable-padd">
        <label class="col-sm-3">ОТМ веб сайти</label>
        <div class="col-sm-6">
            <input type="url" class="form-control mask"  name="otm_web" id="otm_web"  required />
        </div>

    </div>

    <div class="form-group lable-padd">
        <label class="col-sm-3">ОТМ эл.почтаси</label>
        <div class="col-sm-6">
            <input type="email" class="form-control"  name="otm_email" id="otm_email" required />
        </div>

    </div>
   </div>

    <?php
} else
{

    foreach($otm as $otmt) {?>
        <div class="porlets-content">
            <input type="hidden" name="otm" value="<?php echo $otmt['otm_id'];?>" />
            <div class="form-group lable-padd">
                <label class="col-sm-3">Олий таълим муассаси номи</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="otm_name" id="otm_name" maxlength="150"  value="<?php echo $otmt['otm_name'];?> " required/>
                </div>
            </div>
            <div class="form-group lable-padd">
                <label class="col-sm-3">ОТМ қисқартма номи</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="otm_lname" id="otm_lname" maxlength="30" value="<?php echo $otmt['otm_lname'];?>" required/>
                </div>

            </div>
            <div class="form-group lable-padd">
                <label class="col-sm-3">ОТМ веб сайти</label>
                <div class="col-sm-6">
                    <input type="url" class="form-control mask"  name="otm_web" id="otm_web" value="<?php echo $otmt['otm_web'];?>" required/>
                </div>
            </div>
            <div class="form-group lable-padd">
                <label class="col-sm-3">ОТМ эл.почтаси</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control"  name="otm_email" id="otm_email" value="<?php echo $otmt['otm_email'];?>" required/>
                </div>

            </div>
        </div>
    <?php } }?>