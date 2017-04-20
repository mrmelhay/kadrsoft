<?php
if(count(@$direction)==0) {
    ?>
    <div class="porlets-content">
        <div class="form-group lable-padd">
            <label class="col-sm-3">Мутахассислик коди</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="mutax_kodi" id="mutax_kodi" maxlength="8" required/>
            </div>
        </div>
    </div>
    <div class="form-group lable-padd">
        <label class="col-sm-3">Мутахассислик номи</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="mutax_kodi_name" id="mutax_kodi_name" maxlength="250" required/>
        </div>

    </div>

    <?php
} else
{

    foreach($direction as $directionn) {?>
        <div class="porlets-content">
            <input type="hidden" name="direction" value="<?php echo $directionn['mutax_kodi_id'];?>" />
            <div class="form-group lable-padd">
                <label class="col-sm-3">Мутахассислик коди</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="mutax_kodi" id="mutax_kodi" maxlength="8"  value="<?php echo $directionn['mutax_kodi'];?> " required/>
                </div>
            </div>
            <div class="form-group lable-padd">
                <label class="col-sm-3">Мутахассислик номи</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="mutax_kodi_name" id="mutax_kodi_name" maxlength="250" value="<?php echo $directionn['mutax_kodi_name'];?>" required/>
                </div>

            </div>

        </div>
    <?php } }?>