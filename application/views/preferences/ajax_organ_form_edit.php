<?php
if(count($kollej)==0) {

?>

    <div class="porlets-content">
    <input type="hidden" name="kollej" value="0" />
    <div class="form-group lable-padd">
        <label class="col-sm-3">Муассаса номи</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="kollej_name" id="kollej_name" />
        </div>
    </div>
    <div class="form-group lable-padd">
        <label class="col-sm-3">Вилоят</label>
        <div class="col-sm-6">
            <select name="viloyat_id" id="viloyat_id" class="form-control">
                <option value="">Танланг...</option>
                <?php $this->PreferencesModel->getViloyatDropList(); ?>
    </select>

    </div>
    </div>
    <div class="form-group lable-padd">
        <label class="col-sm-3">Туман</label>
        <div class="col-sm-6">
            <select name="tuman_id" id="tuman_id" class="form-control">
            </select>
        </div>

    </div>
    <div class="form-group lable-padd">
        <label class="col-sm-3">Манзил</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="kollej_adres" id="kollej_adres" />
        </div>

    </div>
    <div class="form-group lable-padd">
        <label class="col-sm-3">Ходимлар сони</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="empl_count1" name="empl_count1" />
        </div>
        <label class="col-sm-3">Пeдагогик ходимлар сони</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="empl_count2" name="empl_count2" />
        </div>

    </div>
    <!--                                <div class="form-group lable-padd">-->
    <!--                                    <label class="col-sm-3">Падагогик ходимлар сони</label>-->
    <!--                                    <div class="col-sm-6">-->
    <!--                                        <input type="text" class="form-control" id="empl_count2" name="empl_count2"/>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <div class="form-group lable-padd">
        <label class="col-sm-3">Талабалар сони</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="students_count" name="students_count" />
        </div>
    </div>

    <div class="form-group lable-padd">
        <label class="col-sm-3">Телефон</label>
        <div class="col-sm-6">
            <input type="text" class="form-control mask" data-inputmask="'mask':'(999) 99-999-9999'" name="phone" id="phone" />
        </div>

    </div>

    <div class="form-group lable-padd">
        <label class="col-sm-3">Электрон почта</label>
        <div class="col-sm-6">
            <input type="email" class="form-control"  name="email" id="email"  />
        </div>

    </div>

    <div class="form-group lable-padd">
        <label class="col-sm-3">Веб сайт</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="website" id="website" />
        </div>
    </div>

    </div>


<?php


    } else
{
foreach($kollej as $kollj) {?>
<div class="porlets-content">
    <input type="hidden" name="kollej" value="<?php echo $kollj['kollej_id'];?>" />
    <div class="form-group lable-padd">
        <label class="col-sm-3">Муассаса номи</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="kollej_name" id="kollej_name" value="<?php echo $kollj['kollej_name'];?>"/>
        </div>
    </div>
    <div class="form-group lable-padd">
        <label class="col-sm-3">Вилоят</label>
        <div class="col-sm-6">
            <select name="viloyat_id" id="viloyat_id" class="form-control">
                <option value="">Танланг...</option>
                <?php $this->PreferencesModel->getViloyatDropList($kollj['viloyat_id']); ?>
            </select>

        </div>
    </div>
    <div class="form-group lable-padd">
        <label class="col-sm-3">Туман</label>
        <div class="col-sm-6">
            <select name="tuman_id" id="tuman_id" class="form-control">
                <?php $this->PreferencesModel->getTumanDropList($kollj['viloyat_id'],$kollj['tuman_id']); ?>
            </select>
        </div>

    </div>
    <div class="form-group lable-padd">
        <label class="col-sm-3">Манзил</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="kollej_adres" id="kollej_adres" value="<?php echo $kollj['kollej_adres'];?>"/>
        </div>

    </div>
    <div class="form-group lable-padd">
        <label class="col-sm-3">Ходимлар сони</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="empl_count1" name="empl_count1" value="<?php echo $kollj['empl_count1'];?>"/>
        </div>
        <label class="col-sm-3">Пeдагогик ходимлар сони</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="empl_count2" name="empl_count2" value="<?php echo $kollj['empl_count2'];?>"/>
        </div>

    </div>
    <!--                                <div class="form-group lable-padd">-->
    <!--                                    <label class="col-sm-3">Падагогик ходимлар сони</label>-->
    <!--                                    <div class="col-sm-6">-->
    <!--                                        <input type="text" class="form-control" id="empl_count2" name="empl_count2"/>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <div class="form-group lable-padd">
        <label class="col-sm-3">Талабалар сони</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="students_count" name="students_count" value="<?php echo $kollj['students_count'];?>"/>
        </div>
    </div>

    <div class="form-group lable-padd">
        <label class="col-sm-3">Телефон</label>
        <div class="col-sm-6">
            <input type="text" class="form-control mask" data-inputmask="'mask':'(999) 99-999-9999'" name="phone" id="phone" value="<?php echo $kollj['phone'];?>"/>
        </div>

    </div>

    <div class="form-group lable-padd">
        <label class="col-sm-3">Электрон почта</label>
        <div class="col-sm-6">
            <input type="email" class="form-control"  name="email" id="email" value="<?php echo $kollj['email'];?>" />
        </div>

    </div>

    <div class="form-group lable-padd">
        <label class="col-sm-3">Веб сайт</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="website" id="website" value="<?php echo $kollj['website'];?>"/>
        </div>
    </div>

</div>
<?php } }?>