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
            <button type="button" class="btn btn-info"
                    onclick="document.location.href='<?php echo base_url('employee/download/' . $employee->kadrid) ?>'">
                Юклаб олиш
            </button>
            <a type="button" class="btn btn-info btn-danger" onclick="window.history.back()"> Ортга
                қайтиш <i class="fa fa-mail-reply-all"></i> </a>

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
                                            <?php echo $employee->kollej_name; ?>
                                            , <?php echo $employee->lavozim_name; ?>
                                        </strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Туғилган йили:</b></td>
                                    <td><b>Туғилган жойи:</b></td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo date_format(date_create($employee->bdate), 'd.m.Y'); ?>
                                    </td>
                                    <td colspan="2"><?php echo $employee->viloyat; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Миллати:</b></td>
                                    <td colspan="2"><b>Партиявийлиги:</b></td>
                                </tr>
                                <tr>
                                    <td><?php echo $employee->millat_name; ?></td>
                                    <td colspan="2"><?php echo !empty($employee->partiya_name) ? $employee->partiya_name : 'Йўқ'; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Маълумоти:</b></td>
                                    <td colspan="2"><b>Тамомлаган:</b></td>
                                </tr>
                                <tr>
                                    <td><?php echo $employee->malumot_name; ?></td>
                                    <td colspan="2">
                                        <?php echo $employee->otm_name; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Маълумоти бўйича мутахассислиги:</b></td>
                                    <td colspan="2"><?php echo $employee->mutax_kodi_name; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Илмий даражаси:</b></td>
                                    <td colspan="2"><b>Илмий унвони:</b></td>
                                </tr>
                                <tr>
                                    <td><?php echo !empty($employee->ilm_daraja_name) ? $employee->ilm_daraja_name : 'Йўқ'; ?></td>
                                    <td colspan="2"><?php echo !empty($employee->ilmiy_unvon_nomi) ? $employee->ilmiy_unvon_nomi : 'Йўқ'; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><b>Қайси чет тилларини билади:</b></td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <?php
                                        if (count($languages)>0) {
                                            foreach ($languages as $language) { ?>
                                                <?php echo $language['tillar_nomi'] . ' тили ' . $language['tillar_turi_nomi'] . '</br>'; ?>
                                            <?php }
                                        }?>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="3"><b>Давлат мукофотлари билан тақдирланганми (қанақа):</b>
                                        <?php echo !empty($employee->mukofot_name) ? $employee->mukofot_name : 'Йўқ'; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="3"><b>Халқ депутатлари, республика, вилоят, шаҳар ва туман Кенгаши
                                            депутатими ёки бошқа сайланадиган органларнинг аъзосими:</b>
                                        <?php echo !empty($employee->saylov_name) ? $employee->saylov_name : 'Йўқ'; ?>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3 style="text-align: center;">МЕҲНАТ ФАОЛИЯТИ</h3>
                            <table cellpadding="10" cellspacing="5">
                                <tbody>
                                <?php foreach ($mehnats as $mehnat) { ?>
                                    <tr>
                                        <td><?php echo $mehnat['ish_vaqti']; ?> -</td>
                                        <td>&nbsp;<?php echo $mehnat['ish_tashkilot']; ?></td>

                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3 style="text-align: center;"><?php echo $employee->name_f . ' ' . $employee->name_i . ' ' . $employee->name_o; ?>
                                нинг яқин қариндошлари ҳақида <br> МАЪЛУМОТ</h3>

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
                                <?php foreach ($oilas as $oila) { ?>
                                    <tr>
                                        <td style="border: 1px solid black; text-align:center;">
                                            <?php echo $oila['qarindosh_name']; ?>
                                        </td>
                                        <td style="border: 1px solid black; text-align:center;"><?php echo $oila['q_lname'] . ' ' . $oila['q_name'] . ' ' . $oila['q_mname']; ?>
                                        </td>
                                        <td style="border: 1px solid black; text-align:center;">
                                            <?php echo $oila['q_bdate'] . ' ' . $oila['viloyat'] . ' ' . $oila['tuman']; ?>
                                        </td>
                                        <td style="border: 1px solid black; text-align:center;"><?php echo $oila['q_work']; ?></td>
                                        <td style="border: 1px solid black; text-align:center;"><?php echo $oila['q_address']; ?></td>

                                    </tr>
                                <?php } ?>
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
