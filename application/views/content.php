<div class="wrapper">
    <?php if ($this->session->userdata('logged_in') != false) { ?>
        <div class="inner">
            <div class="left_nav">
                <div class="search_bar"><i class="fa fa-search"></i>
                    <input name="" type="text" class="search" placeholder="Излаш...">
                </div>
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 266px;">
                    <div class="left_nav_slidebar" style="overflow: hidden; width: auto; height: 266px;">
                        <ul>
                            <li class="left_nav_active theme_border"><a href="javascript:void(0);"><i class="fa fa-home"></i> Муассаса <span class="left_nav_pointer"></span> <span
                                        class="plus"><i class="fa fa-plus"></i></span> </a>
                                <ul class="" style="display:none">
                                    <li><a href="index.html"> <span>&nbsp;</span> <i
                                                class="fa fa-circle theme_color"></i> <b
                                                class="theme_color">Муассаса хақида</b> </a></li>
                                    <li><a href="settings.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Маълумотларни киритиш</b>
                                        </a></li>
<!--                                    <li><a href="layouts.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Layouts</b>-->
<!--                                        </a></li>-->
<!--                                    <li><a href="themes.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Themes</b>-->
<!--                                        </a></li>-->
<!--                                    <li><a href="widgets.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Widgets</b>-->
<!--                                        </a></li>-->
<!--                                    <li><a href="animations.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Animations</b>-->
<!--                                        </a></li>-->
                                </ul>
                            </li>
                            <li><a href="javascript:void(0);"> <i class="fa fa-edit"></i> Ходимлар <span class="plus"><i
                                            class="fa fa-plus"></i></span></a>
                                <ul>
                                    <li><a href="typography.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Ходимлар</b>
                                        </a></li>
                                    <li><a href="buttons.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Архив</b>
                                        </a></li>
                                    <li><a href="icons.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i>
                                            <b>ШИР ва СТИР</b> </a></li>

                                </ul>
                            </li>
                            <li><a href="javascript:void(0);"> <i class="fa fa-tasks"></i> Хисоботлар <span class="plus"><i
                                            class="fa fa-plus"></i></span></a>
                                <ul>
                                    <li><a href="components.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Components</b>
                                        </a></li>
                                    <li><a href="validation.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Validation</b>
                                        </a></li>
                                    <li><a href="multi-upload.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i>
                                            <b>Multi-upload</b> </a></li>
                                    <li><a href="other-forms.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Others</b>
                                        </a></li>
                                </ul>
                            </li>
<!--                            <li><a href="javascript:void(0);"> <i class="fa fa-users icon"></i> APPS <span class="plus"><i-->
<!--                                            class="fa fa-plus"></i></span> </a>-->
<!--                                <ul>-->
<!--                                    <li><a href="todo.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i>-->
<!--                                            <b>To-Do</b> </a></li>-->
<!--                                    <li><a href="task.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i>-->
<!--                                            <b>Task</b> </a></li>-->
<!--                                    <li><a href="notes.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i>-->
<!--                                            <b>Notes</b> </a></li>-->
<!--                                    <li><a href="media.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Media-->
<!--                                                Manager</b> </a></li>-->
<!--                                    <li><a href="calendar.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Calendar</b>-->
<!--                                        </a></li>-->
<!--                                    <li><a href="ticket.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Ticket-->
<!--                                                Support</b> </a></li>-->
<!--                                    <li><a href="invoice.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Invoice</b>-->
<!--                                        </a></li>-->
<!--                                </ul>-->
<!--                            </li>-->
<!--                            <li><a href="javascript:void(0);"> <i class="fa fa-envelope"></i> EMAIL <span-->
<!--                                        class="plus"><i class="fa fa-plus"></i></span> </a>-->
<!--                                <ul>-->
<!--                                    <li><a href="inbox.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i>-->
<!--                                            <b>Inbox</b> </a></li>-->
<!--                                    <li><a href="compose.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Compose</b>-->
<!--                                        </a></li>-->
<!--                                    <li><a href="readmail.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Read-->
<!--                                                Mail</b> </a></li>-->
<!--                                </ul>-->
<!--                            </li>-->
<!--                            <li><a href="javascript:void(0);"> <i class="fa fa-folder-open-o"></i> PAGES <span-->
<!--                                        class="plus"><i class="fa fa-plus"></i></span> </a>-->
<!--                                <ul>-->
<!--                                    <li><a href="login.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i>-->
<!--                                            <b>Login</b> </a></li>-->
<!--                                    <li><a href="registration.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i>-->
<!--                                            <b>Registration</b> </a></li>-->
<!--                                    <li><a href="lockscreen.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Lock-->
<!--                                                Screen</b> </a></li>-->
<!--                                    <li><a href="blankpage.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Blank-->
<!--                                                Page</b> </a></li>-->
<!--                                    <li><a href="404error.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>404-->
<!--                                                Error</b> </a></li>-->
<!--                                    <li><a href="500error.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>500-->
<!--                                                Error</b> </a></li>-->
<!--                                    <li><a href="search.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Search</b>-->
<!--                                        </a></li>-->
<!--                                    <li><a href="about.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i>-->
<!--                                            <b>About</b> </a></li>-->
<!--                                    <li><a href="contact.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Contact</b>-->
<!--                                        </a></li>-->
<!--                                </ul>-->
<!--                            </li>-->
<!--                            <li><a href="javascript:void(0);"> <i class="fa fa-th"></i> TABLES <span class="plus"><i-->
<!--                                            class="fa fa-plus"></i></span> </a>-->
<!--                                <ul>-->
<!--                                    <li><a href="statictable.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Static-->
<!--                                                Table</b> </a></li>-->
<!--                                    <li><a href="datatable.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Data-->
<!--                                                Table</b> </a></li>-->
<!--                                </ul>-->
<!--                            </li>-->
                            <li><a href="javascript:void(0);"> <i class="fa fa-glass"></i> Маълумотнома <span class="plus"><i
                                            class="fa fa-plus"></i></span></a>
                                <ul>
                                    <li><a href="<?php echo base_url('/preferences/organ')?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Муассасалар</b>
                                        </a></li>
                                    <li><a href="profile.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Profile</b>
                                        </a></li>
                                    <li><a href="contactlist.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Contact
                                                List</b> </a></li>
                                    <li><a href="maps.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i>
                                            <b>Maps</b> </a></li>
                                    <li><a href="gallery.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Gallery</b>
                                        </a></li>
                                    <li><a href="help.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i>
                                            <b>Help</b> </a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0);"> <i class="fa fa-info"></i> Ёрдам </a>

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
            <?php echo(!empty($content) ? $content : null) ?>
        </div>
    <?php } else { ?>
        <?php echo(!empty($content) ? $content : null) ?>
    <?php } ?>
</div>
