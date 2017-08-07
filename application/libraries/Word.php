<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . '/third_party/PhpWord/Autoloader.php';
use PhpOffice\PhpWord\Autoloader;
use PhpOffice\PhpWord\Settings;

Autoloader::register();
Settings::loadConfig();

class Word extends Autoloader
{


    public $phpWord;
    public $document;

    public function __construct()
    {
        $this->phpWord = new \PhpOffice\PhpWord\PhpWord();
        $this->phpWord->getCompatibility()->setOoxmlVersion(14);
        $this->phpWord->getCompatibility()->setOoxmlVersion(15);
    }

    public function download($data = [])
    {
        $targetFile = "./global/uploads/";
        $filename = 'test.docx';
        $section = $this->phpWord->addSection();
        $section->addText('МАЪЛУМОТНОМА', array('bold' => true, 'name' => 'Times New Roman', 'size' => 14, 'color' => 'black'), array('align' => 'center', 'spaceAfter' => 10));

        $section->addImage(base_url($data['employee'][0]['photo']), array('align' => 'right',
            'wrappingStyle' => 'square',
            'positioning' => 'absolute',
            'posHorizontal' => \PhpOffice\PhpWord\Style\Image::POSITION_HORIZONTAL_RIGHT,
            'posHorizontalRel' => 'margin',
            'posVerticalRel' => 'line',));
        $section->addText($data['employee'][0]['name_f'] . ' ' . $data['employee'][0]['name_i'] . ' ' . $data['employee'][0]['name_o'], array('name' => 'Times New Roman', 'size' => 14), array('align' => 'center', 'spaceAfter' => 100));
        $section->addTextBreak(1);
        $section->addText($data['employee'][0]['kollej_name'] . ', ' . $data['employee'][0]['lavozim_name'], array('single', 'name' => 'Times New Roman', 'size' => 11, 'color' => 'black'), array('align' => 'left', 'spaceAfter' => 10));
        $section->addTextBreak(2);
        $section->addText('МЕҲНАТ ФАОЛИЯТИ', array('bold' => true, 'name' => 'Times New Roman', 'size' => 14, 'color' => 'black'), array('align' => 'center', 'spaceAfter' => 10));

        $table = $section->addTable();
//        $this->phpWord->addFontStyle('rStyle', array('bold'=>true, 'italic'=>true, 'size'=>16));
        //header row
        $table->addRow(400);
        $table->addCell(2000)->addText('Cell 1');
        $table->addCell(3500)->addText('Cell 1');
        $table->addCell(1500)->addText('Cell 1');
        $table->addCell(2000)->addText('Cell 1');

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($this->phpWord, 'Word2007');
        $objWriter->save($filename);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . $filename);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filename));
        flush();
        readfile($filename);
        unlink($filename);
        exit;
    }

    public function download2($data = [])
    {
        $filename = 'test.docx';
        $this->document = new \PhpOffice\PhpWord\TemplateProcessor(APPPATH . '/libraries/Example/Template2.docx');
        $section = $this->phpWord->addSection();
        $this->document->setValue('Value1', htmlspecialchars($data['employee'][0]['name_f'] . ' ' . $data['employee'][0]['name_i'] . ' ' . $data['employee'][0]['name_o']));
        $this->document->setValue('kollej_name_lavozim', htmlspecialchars($data['employee'][0]['kollej_name'] . ', ' . $data['employee'][0]['lavozim_name']));
        $this->document->setValue('Value4', $data['employee'][0]['viloyat'] . ', ' . $data['employee'][0]['tuman']);
        $this->document->setValue('Value3', htmlspecialchars($data['employee'][0]['bdate']));
        $this->document->setValue('millat_name', $data['employee'][0]['millat_name']);
        $this->document->setValue('partiya_name', $data['employee'][0]['partiya_name']);
        $this->document->setValue('malumot_name', $data['employee'][0]['malumot_name']);
        $this->document->setValue('tugatgan', $data['employee'][0]['tugatgan_yili'] . ' ' . $data['employee'][0]['otm_name']);
        $this->document->setValue('mutaxasis', $data['employee'][0]['mutax_kodi_name']);
        $this->document->setValue('ilmiydaraja', $data['employee'][0]['ilm_daraja_name']);
        $this->document->setValue('ilmiyunvon', $data['employee'][0]['ilmiy_unvon_nomi']);
        $lang = '';
        if (count($data['languages']) > 0) {
            foreach ($data['languages'] as $language) {
                $lang .= $language['tillar_nomi'] . ', ';
            }
            $lang .= ' тили ';
        }
        $this->document->setValue('tillari', $lang);
        $this->document->setValue('mukofoti', $data['employee'][0]['mukofot_name']);

        $img = array(
            'src' => $data['employee'][0]['photo'],
            'swh' => '160',
            'size' => array(120, 160));
        $this->document->setImg('Value2', $img);

        $this->document->cloneRow('saylovyear', sizeof($data['saylov']));
        $countSaylov = 0;
        foreach ($data['saylov'] as $saylov) {
            $countSaylov += 1;
            $this->document->setValue('saylovyear#' . $countSaylov, $saylov['saylov_year']);
            $this->document->setValue('saylovname#' . $countSaylov, $saylov['saylov_name']);
        }


        $this->document->cloneRow('workyear',sizeof($data['mehnats']));
        $count1=0;
        foreach ($data['mehnats'] as $mehnat) {
           $count1+=1;
           $this->document->setValue('workyear#'.$count1, $mehnat['ish_vaqti']);
           $this->document->setValue('space#'.$count1, $mehnat['ish_tashkilot']);


//            $table->addRow(2);
//            $table->addCell(1500)->addText($mehnat['ish_vaqti'].' йй. ',array('size'=>'11','cellMargin' => 80));
//            $table->addCell(4000)->addText(' -'.$mehnat['ish_tashkilot'],array('size'=>'11','cellMargin' => 80));
//            $table->addCell()->addTextBreak(1);
        }


//        $styleTable = array('borderSize'=>6, 'borderColor'=>'006699', 'cellMargin'=>80);

        $styleFirstRow = array('borderBottomSize' => 18, 'borderBottomColor' => '0000FF', 'bgColor' => '66BBFF');
        $styleCell = array('valign'=>'center');
        $fontStyle = array('bold'=>true, 'align'=>'center');
        $styleTable = array('borderSize' => 6, 'borderColor' => '006699', 'cellMargin' => 80);
        $this->phpWord->addTableStyle('Fancy Table', $styleTable, $styleFirstRow);



//        $table2 = $section->addTable('Fancy Table');
//        $table2->addRow(900);
//        $table2->addCell(2000, $styleCell)->addText('Қарин-дошлиги', $fontStyle);
//        $table2->addCell(2000, $styleCell)->addText('Туғилган йили ва жойи', $fontStyle);
//        $table2->addCell(2000, $styleCell)->addText('Фамилияси, исми ва отасининг исми', $fontStyle);
//        $table2->addCell(2000, $styleCell)->addText('Иш жойи ва лавозими', $fontStyle);
//        $table2->addCell(2000, $styleCell)->addText('Турар жойи', $fontStyle);

        $this->document->cloneRow('qarindosh',sizeof($data['oilas']));
        $count=0;
        foreach ($data['oilas'] as $oila) {
            $count+=1;
            $this->document->setValue('qarindosh#'.$count, $oila['qarindosh_name']);
            $this->document->setValue('fio#'.$count, $oila['q_lname'] . ' ' . $oila['q_name'] . ' ' . $oila['q_mname']);
            $this->document->setValue('bdate#'.$count, $oila['q_bdate'] . ' ' . $oila['viloyat'] . ' ' . $oila['tuman']);
            $this->document->setValue('workspace#'.$count, $oila['q_work']);
            $this->document->setValue('address#'.$count, $oila['q_address']);
//            $table2->addRow();
//            $table2->addCell(2000,array('valign'=>'center','align'=>'center'))->addText($oila['qarindosh_name']);
//            $table2->addCell(2000,array('valign'=>'center','align'=>'center'))->addText($oila['q_lname'] . ' ' . $oila['q_name'] . ' ' . $oila['q_mname']);
//            $table2->addCell(2000,array('valign'=>'center','align'=>'center'))->addText($oila['q_bdate'] . ' ' . $oila['viloyat'] . ' ' . $oila['tuman']);
//            $table2->addCell(2000,array('valign'=>'center','align'=>'center'))->addText($oila['q_work']);
//            $table2->addCell(2000,array('valign'=>'center','align'=>'center'))->addText($oila['q_address']);
        }

//        $objWriter = new PhpOffice\PhpWord\Writer\Word2007($this->phpWord);
//        $tableStr = $objWriter->getWriterPart('Document')->getTableAsText($table);
//        $tableStr2 = $objWriter->getWriterPart('Document')->getTableAsText($table2);
//        $this->document->setValue('myTable', $tableStr);
//        $this->document->setValue('myFamily', $tableStr2);
        $this->document->saveAs($filename);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . $filename);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filename));
        flush();
        readfile($filename);
        unlink($filename); // deletes the temporary file
    }
}
