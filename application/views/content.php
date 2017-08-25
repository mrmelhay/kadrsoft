<?php
$action=array('organ','davlat','region','otm','banks','partiya','mutaxassislik','millat','shartnoma','tillar','uq_soha');
$action2=array('dashboard','organ_info');
$action3=array('employees','archives','stir');
$action4=array('employee_list','stir_list','malaka_osh');
$action5=array('organ_list');
?>
<div class="wrapper">
    <?php if ($this->session->userdata('logged_in') != false) { ?>
        <div class="inner">
            <div class="left_nav">
                <form action="<?php echo base_url('employee/employees') ?>" method="post">
                <div class="search_bar"><i class="fa fa-search"></i>
                    <input type="text" class="search" name="query" id="query" placeholder="Излаш...">
                </div>
                </form>
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 600px">
                   <div class="left_nav_slidebar" style="overflow: hidden; width: auto; height: auto">
                        <ul>
                            <li class="left_nav_active theme_border ">
                                <a href="/dashboard"><i
                                            class="fa fa-home"></i> Асосий ойна <span class="left_nav_pointer"></span>

                                </a>

                            </li>

                            <li <?php if (in_array($this->uri->segment(2),$action2)) { ?>class="left_nav_active theme_border <?php }?>">
                                <a href="javascript:void(0);"><i
                                            class="fa fa-home"></i> Муассаса <span class="left_nav_pointer"></span>
                                    <span  class="plus"><i class="fa fa-plus"></i></span>
                                </a>
                                <ul <?php  if (in_array($this->uri->segment(2),$action5)) { ?> class="opened" style="display:block;" <?php }?>>
                                    <li><a href="<?php echo base_url("/organ/organ_list")?>"> <span>&nbsp;</span> <i
                                                    class="fa fa-circle theme_color"></i> <b
                                                    class="theme_color">Муассаса хақида</b> </a></li>

                                </ul>
                            </li>
                            <li <?php if (in_array($this->uri->segment(2),$action3)) { ?>class="left_nav_active theme_border <?php }?>"><a href="javascript:void(0);"> <i class="fa fa-edit"></i> Ходимлар <span class="plus"><i
                                                class="fa fa-plus"></i></span></a>
                                <ul <?php  if (in_array($this->uri->segment(2),$action3)) { ?> class="opened" style="display:block;" <?php }?>>
                                    <li><a href="<?php echo base_url('/employee/employees')?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Ходимлар</b>
                                        </a></li>
                                    <li><a href="<?php echo base_url('/employee/archives')?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Архив</b>
                                        </a></li>
                                    <li><a href="<?php echo base_url('/employee/stir')?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i>
                                            <b>ШИР ва СТИР</b> </a></li>

                                </ul>
                            </li>
                            <li <?php if (in_array($this->uri->segment(2),$action4)) { ?>class="left_nav_active theme_border <?php }?>"><a href="javascript:void(0);"> <i class="fa fa-tasks"></i> Хисоботлар <span
                                            class="plus"><i
                                                class="fa fa-plus"></i></span></a>
                                <ul <?php  if (in_array($this->uri->segment(2),$action4)) { ?> class="opened" style="display:block;" <?php }?>>
                                    <li><a href="<?php echo base_url("/reports/employee_list")?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Ходимлар
                                                рўйхати</b>
                                        </a></li>
                                    <li><a href="<?php echo base_url("/reports/stir_list")?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>СТИР
                                                рўйхати</b>
                                        </a></li>
                                    <li><a href="<?php echo base_url("/reports/malaka_osh")?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i>
                                            <b>Малака ошириш</b> </a></li>
                                    <!--                                    <li><a href="--><?php //echo base_url("/reports/employees")?><!--"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Others</b>-->
                                    <!--                                        </a></li>-->
                                </ul>
                            </li>

                            <?php if ($username['is_admin']){?>
                            <li <?php if (in_array($this->uri->segment(2),$action)) { ?>class="left_nav_active theme_border" <?php }?>><a href="javascript:void(0);"> <i class="fa fa-glass"></i> Маълумотнома <span
                                            class="plus"><i
                                                class="fa fa-plus"></i></span></a>
                                <ul <?php

                                    if (in_array($this->uri->segment(2),$action)) {?>class="opened" style="display:block;" <?php }?>>
                                    <li><a href="<?php echo base_url('/preferences/organ') ?>"> <span>&nbsp;</span> <i
                                                    class="fa fa-circle"></i> <b>Муассасалар</b></a></li>
                                    <li><a href="<?php echo base_url('/preferences/davlat') ?>"> <span>&nbsp;</span> <i
                                                    class="fa fa-circle"></i> <b>Давлатлар</b></a></li>
                                    <li><a href="<?php echo base_url('/preferences/region') ?>"> <span>&nbsp;</span> <i
                                                    class="fa fa-circle"></i> <b>Худудлар</b></a></li>
                                    <li><a href="<?php echo base_url('/preferences/otm') ?>"> <span>&nbsp;</span> <i
                                                    class="fa fa-circle"></i><b>ОТМ лар</b> </a></li>
                                    <li><a href="<?php echo base_url('/preferences/banks') ?>"> <span>&nbsp;</span> <i
                                                    class="fa fa-circle"></i><b>Банклар</b> </a></li>
                                    <li><a href="<?php echo base_url('/preferences/partiya') ?>"> <span>&nbsp;</span> <i
                                                    class="fa fa-circle"></i><b>Партиялар</b> </a></li>
                                    <li><a href="<?php echo base_url('/preferences/mutaxassislik') ?>">
                                            <span>&nbsp;</span> <i class="fa fa-circle"></i><b>Мутахассисликлар</b> </a>
                                    </li>
                                    <li>  </li>
                                    <li><a href="<?php echo base_url('/preferences/millat') ?>"> <span>&nbsp;</span> <i
                                                    class="fa fa-circle"></i><b>Миллатлар</b> </a></li>
                                    <li><a href="<?php echo base_url('/preferences/shartnoma') ?>"> <span>&nbsp;</span>
                                            <i class="fa fa-circle"></i><b>Шартнома турлари</b> </a></li>
                                    <li><a href="<?php echo base_url('/preferences/tillar') ?>"> <span>&nbsp;</span> <i
                                                    class="fa fa-circle"></i><b>Тиллар</b> </a></li>
                                    <li><a href="<?php echo base_url('/preferences/uq_soha') ?>"> <span>&nbsp;</span> <i
                                                    class="fa fa-circle"></i><b>Ўқитиш соҳалари</b> </a></li>
                                </ul>
                            </li>


                            <li><a href="javascript:void(0);"> <i class="fa fa-user"></i> Фойдаланувчилар <span
                                            class="plus"><i
                                                class="fa fa-plus"></i></span> </a>
                                <ul>
                                    <li><a href="<?php echo base_url('/users/users') ?>"> <span>&nbsp;</span> <i
                                                    class="fa fa-circle"></i> <b>Фойдаланувчилар</b></a></li>
                                    <li><a href="<?php echo base_url('/users/user_group') ?>"> <span>&nbsp;</span> <i
                                                    class="fa fa-circle"></i> <b>Гурухлар</b></a></li>
                                    <li><a href="<?php echo base_url('/users/user_rolls') ?>"> <span>&nbsp;</span> <i
                                                    class="fa fa-circle"></i> <b>Роллар</b></a></li>
                                    <li><a href="<?php echo base_url('/users/user_access') ?>"> <span>&nbsp;</span> <i
                                                    class="fa fa-circle"></i> <b>Рухсат бериш</b></a></li>

                                </ul>

                            </li>
                            <?php }?>
                            <li><a href="javascript:void(0);"> <i class="fa fa-info"></i> Ёрдам </a>
                                <ul>
                                    <li><a href="<?php echo base_url('/assets/book/index.php') ?>"> <span>&nbsp;</span> <i
                                                    class="fa fa-circle"></i> <b> Ёрдам</b></a></li>


                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="slimScrollBar"
                         style="background: rgb(161, 178, 189); width: 5px; position: absolute; opacity: 0.4; border-radius: 7px; z-index: 99; right: 1px; top: 0px; height: 139.834px; display: block;"></div>
                    <div class="slimScrollRail"
                         style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
                </div>
            </div>
        </div>
        <div class="contentpanel">
            <div class="pull-left breadcrumb_admin clear_both">
                <div class="pull-left page_title theme_color">
                    <h1><?php echo $username['kollej_name']?></h1>
                </div>

            </div>
            <?php echo(!empty($content) ? $content : null) ?>
        </div>
    <?php } else { ?>
        <?php echo(!empty($content) ? $content : null) ?>
    <?php } ?>
</div>
