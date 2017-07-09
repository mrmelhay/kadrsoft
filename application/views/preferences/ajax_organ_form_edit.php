<?php
if(count($kollej)==0) {
?>
    <div class="porlets-content">
<!--    <input type="hidden" name="kollej" value="0" />-->
    <div class="form-group lable-padd">
        <label class="col-sm-3">Муассаса номи</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="kollej_name" id="kollej_name" />
        </div>
    </div>

        <div class="form-group lable-padd">
        <label class="col-sm-3">Муассаса номи</label>
        <div class="col-sm-6">
            <select name="kollej_parent_id" id="kollej_parent_id" class="form-control">
                <option value="0">Танланг...</option>
                <?php $this->PreferencesModel->getKollejDropList(0, 0, "&#166;&nbsp;&nbsp;&nbsp;&nbsp;", 0); ?>
            </select>
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
            <label class="col-sm-3">Жойлашуви</label>
            <div class="col-sm-6">
                <select name="joylash_xudud" id="joylash_xudud" class="form-control">
                    <option value="">Танланг</option>
                    <option value="шаҳар">Шаҳар</option>
                    <option value="туман">Туман</option>
                </select>
            </div>
        </div>
    <div class="form-group lable-padd">
        <label class="col-sm-3">Манзил</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="kollej_adress" id="kollej_adress" />
        </div>

    </div>
    <div class="form-group lable-padd">
        <label class="col-sm-3">Ходимлар сони</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="empl_count1" name="empl_count1" />
        </div>
        <label class="col-sm-3">Пeдагог ходимлар сони</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="empl_count2" name="empl_count2" />
        </div>

    </div>
      <div class="form-group lable-padd">
        <label class="col-sm-3">Ўқувчилар сони</label>
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


    } else {
    ?>

<div class="porlets-content">
    <input type="hidden" name="kollej" value="<?php echo $kollej[0]['kollej_id'];?>" />
    <div class="form-group lable-padd">
        <label class="col-sm-3">Муассаса номи</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="kollej_name" id="kollej_name" value="<?php echo $kollej[0]['kollej_name'];?>"/>
        </div>
    </div>


    <div class="form-group lable-padd">
        <label class="col-sm-3">Муассаса номи</label>
        <div class="col-sm-6">
            <select name="kollej_parent_id" id="kollej_parent_id" class="form-control">
                <option value="">Танланг...</option>
                <?php $this->PreferencesModel->getKollejDropList(0, 0, "&#166;&nbsp;&nbsp;&nbsp;&nbsp;", $kollej[0]['kollej_id']); ?>
            </select>
        </div>
    </div>




    <div class="form-group lable-padd">
        <label class="col-sm-3">Вилоят</label>
        <div class="col-sm-6">
            <select name="viloyat_id" id="viloyat_id" class="form-control">
                <option value="">Танланг...</option>
                <?php $this->PreferencesModel->getViloyatDropList($kollej[0]['viloyat_id']); ?>
            </select>

        </div>
    </div>
    <div class="form-group lable-padd">
        <label class="col-sm-3">Туман</label>
        <div class="col-sm-6">
            <select name="tuman_id" id="tuman_id" class="form-control">
                <?php $this->PreferencesModel->getTumanDropList($kollej[0]['viloyat_id'],$kollej[0]['tuman_id']); ?>
            </select>
        </div>

    </div>
    <div class="form-group lable-padd">
        <label class="col-sm-3">Манзил</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="kollej_adress" id="kollej_adress" value="<?php echo $kollej[0]['kollej_adress'];?>"/>
        </div>

    </div>
    <div class="form-group lable-padd">
        <label class="col-sm-3">Ходимлар сони</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="empl_count1" name="empl_count1" value="<?php echo $kollej[0]['empl_count1'];?>"/>
        </div>
        <label class="col-sm-3">Пeдагог ходимлар сони</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="empl_count2" name="empl_count2" value="<?php echo $kollej[0]['empl_count2'];?>"/>
        </div>

    </div>
    <!--                                <div class="form-group lable-padd">-->
    <!--                                    <label class="col-sm-3">Падагогик ходимлар сони</label>-->
    <!--                                    <div class="col-sm-6">-->
    <!--                                        <input type="text" class="form-control" id="empl_count2" name="empl_count2"/>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <div class="form-group lable-padd">
        <label class="col-sm-3">Ўқувчилар сони</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="students_count" name="students_count" value="<?php echo $kollej[0]['students_count'];?>"/>
        </div>
    </div>

    <div class="form-group lable-padd">
        <label class="col-sm-3">Телефон</label>
        <div class="col-sm-6">
            <input type="text" class="form-control mask" data-inputmask="'mask':'(999) 99-999-9999'" name="phone" id="phone" value="<?php echo $kollej[0]['phone'];?>"/>
        </div>

    </div>

    <div class="form-group lable-padd">
        <label class="col-sm-3">Электрон почта</label>
        <div class="col-sm-6">
            <input type="email" class="form-control"  name="email" id="email" value="<?php echo $kollej[0]['email'];?>" />
        </div>

    </div>

    <div class="form-group lable-padd">
        <label class="col-sm-3">Веб сайт</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="website" id="website" value="<?php echo $kollej[0]['website'];?>"/>
        </div>
    </div>

</div>
<?php  }?>