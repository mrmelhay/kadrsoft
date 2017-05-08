<?php
if(count($user)==0) {
    ?>
    <div class="porlets-content">
<!--        <input type="hidden" name="user" value="0" />-->
        <div class="form-group lable-padd">
            <label class="col-sm-3">Фамилияси</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="firstname" id="firstname" />
            </div>
        </div>
        <div class="form-group lable-padd">
            <label class="col-sm-3">Исми</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="lastname" id="lastname" />
            </div>
        </div>
        <div class="form-group lable-padd">
            <label class="col-sm-3">Шарифи</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="middlename" id="middlename" />
            </div>
        </div>
        <div class="form-group lable-padd">
            <label class="col-sm-3">Логин</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="username" id="username" />
            </div>
        </div>
        <div class="form-group lable-padd">
            <label class="col-sm-3">Пароль</label>
            <div class="col-sm-6">
                <input type="password" class="form-control" name="password" id="password" />
            </div>
        </div>

        <div class="form-group lable-padd">
            <label class="col-sm-3">Электрон почта</label>
            <div class="col-sm-6">
                <input type="email" class="form-control" name="email" id="email" />
            </div>
        </div>
        <div class="form-group lable-padd">
            <label class="col-sm-3">Телефон</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="phone" id="phone" />
            </div>
        </div>

        <div class="form-group lable-padd">
            <label class="col-sm-3">Рўйхатдан ўтиш санаси</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="regdate" id="regdate" value="<?php echo date('Y-m-d H:i:s');?>"  readonly/>
            </div>
        </div>

        <div class="form-group lable-padd">
            <label class="col-sm-3">Холати</label>
            <div class="col-sm-9">
                <label class="radio-inline">
                    <input type="radio" id="active" name="active" value="0" checked="checked">
                    Фаол </label>
                <label class="radio-inline">
                    <input type="radio" id="active" name="active" value="1" >
                    Фаол эмас </label>

            </div>
        </div>

        <div class="form-group lable-padd">
            <label class="col-sm-3">Муассаса номи</label>
            <div class="col-sm-6">
                <select name="kollej_id" id="kollej_id" class="form-control">
                    <option value="">Танланг...</option>
                    <?php $this->PreferencesModel->getKollejDropList(0,0, "&#166;&nbsp;&nbsp;&nbsp;&nbsp;", $usr['kollej_id']); ?>
                </select>

            </div>
        </div>
        <div class="form-group lable-padd">
            <label class="col-sm-3">Гурух</label>
            <div class="col-sm-6">
                <select name="group_id" id="group_id" class="form-control">
                    <option value="">Танланг...</option>
                    <?php $this->UserModel->getGroupDropList(); ?>
                </select>
            </div>

        </div>
        <div class="form-group lable-padd">
            <label class="col-sm-3">Роллар</label>
            <div class="col-sm-6">
                <select name="user_roll_id" id="user_roll_id" class="form-control">
                    <option value="">Танланг...</option>
                    <?php $this->UserModel->getRollsDropList(); ?>
                </select>
            </div>

        </div>


    </div>


    <?php


} else
{
    foreach($user as $usr) {?>
        <div class="porlets-content">
                    <input type="hidden" name="user" value="<?php echo $usr['user_id'] ?>" />
            <div class="form-group lable-padd">
                <label class="col-sm-3">Фамилияси</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $usr['firstname']?>" />
                </div>
            </div>
            <div class="form-group lable-padd">
                <label class="col-sm-3">Исми</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $usr['lastname']?>"/>
                </div>
            </div>
            <div class="form-group lable-padd">
                <label class="col-sm-3">Шарифи</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="middlename" id="middlename" value="<?php echo $usr['middlename']?>"/>
                </div>
            </div>
            <div class="form-group lable-padd">
                <label class="col-sm-3">Логин</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="username" id="username" value="<?php echo $usr['username']?>" />
                </div>
            </div>
            <div class="form-group lable-padd">
                <label class="col-sm-3">Пароль</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="password" id="password" />
                    <input type="hidden" class="form-control" name="password2" id="password2" value="<?php echo $usr['password'];?>"/>
                </div>
            </div>

            <div class="form-group lable-padd">
                <label class="col-sm-3">Электрон почта</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $usr['email']?>" />
                </div>
            </div>
            <div class="form-group lable-padd">
                <label class="col-sm-3">Телефон</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $usr['phone']?>"/>
                </div>
            </div>

            <div class="form-group lable-padd">
                <label class="col-sm-3">Рўйхатдан ўтиш санаси</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="regdate" id="regdate"  value="<?php echo $usr['reg_date']?>" readonly/>
                </div>
            </div>
            <div class="form-group lable-padd">
                <label class="col-sm-3">Ўзгартирилган сана</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="modify_date" id="modify_date"  value="<?php echo date('Y-m-d H:i:s');?>" readonly/>
                </div>
            </div>

            <div class="form-group lable-padd">
                <label class="col-sm-3">Холати</label>
                <div class="col-sm-9">
                    <label class="radio-inline">
                        <input type="radio" id="active" name="active" value="1" <?php if ($usr['active']) {?>checked="checked" <?php }?>>
                        Фаол </label>
                    <label class="radio-inline">
                        <input type="radio" id="active" name="active" value="0" <?php if (!$usr['active']) {?>checked="checked" <?php }?>>
                        Фаол эмас </label>

                </div>
            </div>

            <div class="form-group lable-padd">
                <label class="col-sm-3">Муассаса номи</label>
                <div class="col-sm-6">
                    <select name="kollej_id" id="kollej_id" class="form-control">
                        <option value="">Танланг...</option>
                        <?php $this->PreferencesModel->getKollejDropList(0,0, "&#166;&nbsp;&nbsp;&nbsp;&nbsp;", $usr['kollej_id']); ?>

                    </select>

                </div>
            </div>
            <div class="form-group lable-padd">
                <label class="col-sm-3">Гурух</label>
                <div class="col-sm-6">
                    <select name="group_id" id="group_id" class="form-control">
                        <option value="">Танланг...</option>
                        <?php $this->UserModel->getGroupDropList($usr['group_id']); ?>
                    </select>
                </div>

            </div>
            <div class="form-group lable-padd">
                <label class="col-sm-3">Роллар</label>
                <div class="col-sm-6">
                    <select name="user_roll_id" id="user_roll_id" class="form-control">
                        <option value="">Танланг...</option>
                        <?php $this->UserModel->getRollsDropList($usr['user_roll_id']); ?>
                    </select>
                </div>

            </div>


        </div>
    <?php }
}?>