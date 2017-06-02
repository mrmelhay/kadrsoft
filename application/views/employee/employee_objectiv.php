<div class="pull-left breadcrumb_admin clear_both">
</div>

<div class="container clear_both padding_fix">

    <div class="block-web">
        <div class="header">
            <div class="actions"><a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a>
                <a class="refresh" href="#">
                    <i class="fa fa-repeat"></i></a> <a class="close-down" href="#"><i class="fa fa-times"></i></a>
            </div>
            <h3 class="content-header">Ходим хақида маълумотлар</h3>
        </div>
        <div class="porlets-content">
            <button type="button" class="btn btn-info" onclick="document.location.href='<?php echo base_url('employee/download/'.$employee->kadrid)?>'">Скачать</button>
            <?php if ($this->session->flashdata('message') != null) { ?>
                <div class="alert alert-info alert-styled-left alert-bordered">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span
                                class="sr-only">Закрыть</span></button>
                    <span class="text-semibold"><?php echo $this->session->flashdata('message'); ?></span>
                </div>
            <?php } ?>

            <?php if ($this->session->flashdata('exception') != null) { ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('exception'); ?>
                </div>
            <?php } ?>

            <div id="" align="center">
                <table cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                    <tr>
                        <td>
                            <table cellspacing="0" cellpadding="0" border="0">
                                <tbody>
                                <tr>

                                    <td>
                                        <h2 style="text-align: center;">МАЪЛУМОТНОМА</h2>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <h2 style="text-align:center;"><?php echo $employee->name_f . ' ' . $employee->name_i . ' ' . $employee->name_o; ?></h2>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table cellpadding="0" cellspacing="0" border="0">
                                <tbody>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                    <td rowspan="3" align="center">
                                        <img src="<?php echo file_exists($employee->photo) ? base_url($employee->photo) : base_url('/images/photos/nophoto.jpg'); ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <strong>
                                            <?php echo $employee->kollej_name; ?>,<?php echo $employee->lavozim_name; ?>
                                        </strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Туғилган йили:</b></td>
                                    <td><b>Туғилган жойи:</b></td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo date_format(date_create($employee->bdate),'d.m.Y');?>
                                    </td>
                                    <td colspan="2"><?php echo $employee->viloyat;?></td>
                                </tr>
                                <tr>
                                    <td><b>Миллати:</b></td>
                                    <td colspan="2"><b>Партиявийлиги:</b></td>
                                </tr>
                                <tr>
                                    <td><?php echo $employee->millat_name;?></td>
                                    <td colspan="2"><?php echo !empty($employee->partiya_name)?$employee->partiya_name:'Йўқ';?></td>
                                </tr>
                                <tr>
                                    <td><b>Маълумоти:</b></td>
                                    <td colspan="2"><b>Тамомлаган:</b></td>
                                </tr>
                                <tr>
                                    <td><?php echo $employee->malumot_name;?></td>
                                    <td colspan="2">
                                        <?php echo $employee->otm_name;?>
                                        <!--                                        1983 й. Наманган педагогика институти-->
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Маълумоти бўйича мутахассислиги:</b></td>
                                    <td colspan="2">
                                        рус тили ва адабиёти
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Илмий даражаси:</b></td>
                                    <td colspan="2"><b>Илмий унвони:</b></td>
                                </tr>
                                <tr>
                                    <td>Йўқ</td>
                                    <td colspan="2">Йўқ</td>
                                </tr>
                                <tr>
                                    <td colspan="3"><b>Қайси чет тилларини билади:</b></td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        Рус тили мукаммал билади
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        Инглиз тили Луғат ёрдамида ўқийди
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"><b>Давлат мукофотлари билан тақдирланганми (қанақа):</b></td>
                                </tr>

                                <tr>
                                    <td colspan="3"><b>Халқ депутатлари, республика, вилоят, шаҳар ва туман Кенгаши
                                            депутатими ёки бошқа сайланадиган органларнинг аъзосими:</b></td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>МЕҲНАТ ФАОЛИЯТИ</h3>
                            <table cellpadding="10" cellspacing="5">
                                <tbody>
                                <tr>
                                    <td>13.08.1976-</td>
                                    <td>01.08.1977-</td>
                                    <td>Наманган шахар 6-мактаб котиба</td>
                                </tr>
                                <tr>
                                    <td>19.10.1977-</td>
                                    <td>01.03.1981-</td>
                                    <td>НамДу лаборант</td>
                                </tr>
                                <tr>
                                    <td>01.03.1981-</td>
                                    <td>01.02.1983-</td>
                                    <td>НамДУ Стенаграфист</td>
                                </tr>
                                <tr>
                                    <td>01.09.1983-</td>
                                    <td>10.11.1983-</td>
                                    <td>НамДУ катта лаборант</td>
                                </tr>
                                <tr>
                                    <td>06.11.1985-</td>
                                    <td>31.07.1989-</td>
                                    <td>НамДУ ўқув бўлими инспектори</td>
                                </tr>
                                <tr>
                                    <td>01.08.1989-</td>
                                    <td></td>
                                    <td>НамДУ 2-бўлим бошлиғи</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>МУХИТДИНОВА Гулнора Харисовна нинг яқин қариндошлари ҳақида</h3>
                            <h3>МАЪЛУМОТ</h3>
                            <table cellpadding="5" cellspacing="0" style="border-collapse: collapse;">
                                <tbody>
                                <tr>
                                    <th style="border: 1px solid black; text-align:center;">Қариндошлиги</th>
                                    <th style="border: 1px solid black; text-align:center;">Фамилияси, исми ва отасининг
                                        исми
                                    </th>
                                    <th style="border: 1px solid black; text-align:center;">Туғилган йили ва жойи</th>
                                    <th style="border: 1px solid black; text-align:center;">Иш жойи ва лавозими</th>
                                    <th style="border: 1px solid black; text-align:center;">Турар жойи</th>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid black; text-align:center;">
                                        Отаси
                                    </td>
                                    <td style="border: 1px solid black; text-align:center;">Мухитдинов Харис
                                        Харибуллаевич
                                    </td>
                                    <td style="border: 1px solid black; text-align:center;">
                                        1933 ,
                                        Наманган вилояти,
                                        Наманган шаҳри
                                    </td>
                                    <td style="border: 1px solid black; text-align:center;">пенционер</td>
                                    <td style="border: 1px solid black; text-align:center;">Наманган шахар</td>

                                </tr>
                                <tr>
                                    <td style="border: 1px solid black; text-align:center;">
                                        Онаси
                                    </td>
                                    <td style="border: 1px solid black; text-align:center;">Шакирзянова Фанзиля
                                        Рахимовна
                                    </td>
                                    <td style="border: 1px solid black; text-align:center;">
                                        1939 ,
                                        Наманган вилояти,
                                        Наманган шаҳри
                                    </td>
                                    <td style="border: 1px solid black; text-align:center;">2004 йил вафот этган</td>
                                    <td style="border: 1px solid black; text-align:center;">Наманган шахар</td>

                                </tr>
                                <tr>
                                    <td style="border: 1px solid black; text-align:center;">
                                        Синглиси
                                    </td>
                                    <td style="border: 1px solid black; text-align:center;">Петрова Салима Харисовна
                                    </td>
                                    <td style="border: 1px solid black; text-align:center;">
                                        1960 ,
                                        Наманган вилояти,
                                        Наманган шаҳри
                                    </td>
                                    <td style="border: 1px solid black; text-align:center;">1992 йил вафот этган</td>
                                    <td style="border: 1px solid black; text-align:center;">Россия</td>

                                </tr>
                                <tr>
                                    <td style="border: 1px solid black; text-align:center;">
                                        Синглиси
                                    </td>
                                    <td style="border: 1px solid black; text-align:center;">Мухитдинова Элмира
                                        Харисовна
                                    </td>
                                    <td style="border: 1px solid black; text-align:center;">
                                        1964 ,
                                        Наманган вилояти,
                                        Наманган шаҳри
                                    </td>
                                    <td style="border: 1px solid black; text-align:center;">Хоразм вилоти тренер</td>
                                    <td style="border: 1px solid black; text-align:center;">Хоразм вилояти урганч</td>

                                </tr>
                                <tr>
                                    <td style="border: 1px solid black; text-align:center;">
                                        Турмуш ўртоғи
                                    </td>
                                    <td style="border: 1px solid black; text-align:center;">Махмудов Марат Рахманович
                                    </td>
                                    <td style="border: 1px solid black; text-align:center;">
                                        1956 ,
                                        Наманган вилояти,
                                        Наманган шаҳри
                                    </td>
                                    <td style="border: 1px solid black; text-align:center;">2010 йил вафот этган</td>
                                    <td style="border: 1px solid black; text-align:center;">Наманган шахар</td>

                                </tr>
                                <tr>
                                    <td style="border: 1px solid black; text-align:center;">
                                        Қизи
                                    </td>
                                    <td style="border: 1px solid black; text-align:center;">Махмудова Элвина Маратовна
                                    </td>
                                    <td style="border: 1px solid black; text-align:center;">
                                        1980 ,
                                        Наманган вилояти,
                                        Наманган шаҳри
                                    </td>
                                    <td style="border: 1px solid black; text-align:center;">Намнган шахар 1-мактаб
                                        ўқитувчиси
                                    </td>
                                    <td style="border: 1px solid black; text-align:center;">Наманган шахар</td>

                                </tr>
                                <tr>
                                    <td style="border: 1px solid black; text-align:center;">
                                        Қизи
                                    </td>
                                    <td style="border: 1px solid black; text-align:center;">Махмудова Регина Маратовна
                                    </td>
                                    <td style="border: 1px solid black; text-align:center;">
                                        1987 ,
                                        Наманган вилояти,
                                        Наманган шаҳри
                                    </td>
                                    <td style="border: 1px solid black; text-align:center;">вактинча ишсиз</td>
                                    <td style="border: 1px solid black; text-align:center;">Наманган шахар</td>

                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>
