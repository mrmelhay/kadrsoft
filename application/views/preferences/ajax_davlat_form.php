<?php
if(count(@$davlat)==0) {
    ?>
    <div class="porlets-content">
        <div class="form-group lable-padd">
            <label class="col-sm-3">Давлат номи (ўзб)</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="gov_uzc" id="gov_uzc" maxlength="150" required/>
            </div>
        </div>


        </div>
        <div class="form-group lable-padd">
            <label class="col-sm-3">Давлат номи (рус)</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="gov_ru" id="gov_ru" maxlength="150" required/>
            </div>

        </div>

        <div class="form-group lable-padd">
            <label class="col-sm-3">Мансублиги (2: МДХ, 3: Хорижий)</label>
            <div class="col-sm-6">
                <input type="number" class="form-control" id="cis" name="cis"  min="2" max="3" required/>
            </div>
        </div>

        <div class="form-group lable-padd">
            <label class="col-sm-3">ISO коди</label>
            <div class="col-sm-6">
                <input type="text" class="form-control mask" data-inputmask="'mask':'999'" name="iso" id="iso" maxlength="3" required />
            </div>

        </div>

        <div class="form-group lable-padd">
            <label class="col-sm-3">Қисқартма белги</label>
            <div class="col-sm-6">
                <input type="text" class="form-control"  name="url" id="url" maxlength="2" pattern="[A-Z]{2,6}" required placeholder="мисол учун: UZ"/>
            </div>

        </div>



    </div>


    <?php


} else
{
    foreach($davlat as $davlatt) {?>
        <div class="porlets-content">
            <input type="hidden" name="davlat" value="<?php echo $davlatt['davlat_id'];?>" />
            <div class="form-group lable-padd">
                <label class="col-sm-3">Давлат номи (ўзб)</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="gov_uzc" id="gov_uzc" value="<?php echo $davlatt['gov_uzc'];?> " required/>
                </div>
            </div>

            <div class="form-group lable-padd">
                <label class="col-sm-3">Давлат номи (рус)</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="gov_ru" id="gov_ru" value="<?php echo $davlatt['gov_ru'];?>" required/>
                </div>

            </div>

            <div class="form-group lable-padd">
                <label class="col-sm-3">Мансублиги (2: МДХ, 3: Хорижий)</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="cis" name="cis"  min="2" max="3"  value="<?php echo $davlatt['cis'];?>" required/>
                </div>
            </div>

            <div class="form-group lable-padd">
                <label class="col-sm-3">ISO коди</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control mask" data-inputmask="'mask':'999'" name="iso" id="iso" maxlength="3"  value="<?php echo $davlatt['iso'];?>" required/>
                </div>

            </div>

            <div class="form-group lable-padd">
                <label class="col-sm-3">Қисқартма белги</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"  name="url" id="url" maxlength="2" pattern="[A-Z]{2,6}" placeholder="мисол учун: UZ" value="<?php echo $davlatt['url'];?>" required/>
                </div>

            </div>
        </div>
    <?php } }?>