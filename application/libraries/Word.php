<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once  APPPATH . '/third_party/PhpWord/Autoloader.php';
use PhpOffice\PhpWord\Autoloader;
use PhpOffice\PhpWord\Settings;
Autoloader::register();
Settings::loadConfig();

class Word extends Autoloader {


    public $phpWord;

    public function __construct()
    {
        $this->phpWord=new \PhpOffice\PhpWord\PhpWord();
        $this->phpWord->getCompatibility()->setOoxmlVersion(14);
        $this->phpWord->getCompatibility()->setOoxmlVersion(15);
    }

    public function download($data=[]){


        $targetFile = "./global/uploads/";
        $filename = 'test.docx';
        $section = $this->phpWord->addSection();
        $section->addText('МАЪЛУМОТНОМА', array('bold' => true,'name'=> 'Times New Roman','size' => 14,'color' =>'black'),array('align' => 'center', 'spaceAfter' => 10));

        $section->addImage(base_url($data['employee'][0]['photo']), array('align'=>'right',
            'wrappingStyle' => 'square',
            'positioning' => 'absolute',
            'posHorizontal'    => \PhpOffice\PhpWord\Style\Image::POSITION_HORIZONTAL_RIGHT,
            'posHorizontalRel' => 'margin',
            'posVerticalRel' => 'line',));
        $section->addText($data['employee'][0]['name_f'] . ' ' . $data['employee'][0]['name_i'] . ' ' . $data['employee'][0]['name_o'], array('name'=> 'Times New Roman','size' => 14),array('align' => 'center', 'spaceAfter' => 100));
        $section->addTextBreak(1);
        $section->addText($data['employee'][0]['kollej_name'].', '.$data['employee'][0]['lavozim_name'], array('single','name'=> 'Times New Roman','size' => 11,'color' =>'black'),array('align' => 'left', 'spaceAfter' => 10));
        $section->addTextBreak(2);


        $section->addText('МЕҲНАТ ФАОЛИЯТИ', array('bold' => true,'name'=> 'Times New Roman','size' => 14,'color' =>'black'),array('align' => 'center', 'spaceAfter' => 10));


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
        header('Content-Disposition: attachment; filename='.$filename);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filename));
        flush();
        readfile($filename);
        unlink($filename); // deletes the temporary file
        exit;
    }

    public function download2($data=[]){
        $filename = 'test.docx';
        $section = $this->phpWord->addSection();
        $this->phpWord=new \PhpOffice\PhpWord\TemplateProcessor(APPPATH.'/libraries/Example/Template2.docx');

        $this->phpWord->setValue('Value1', htmlspecialchars($data['employee'][0]['name_f'] . ' ' . $data['employee'][0]['name_i'] . ' ' . $data['employee'][0]['name_o']));
        $this->phpWord->setValue('kollej_name_lavozim', htmlspecialchars($data['employee'][0]['kollej_name'].', '.$data['employee'][0]['lavozim_name']));
        $this->phpWord->setValue('Value3', htmlspecialchars('100x300'));

        $img = array(
        'src' => $data['employee'][0]['photo'],
        'swh'=>'120',
        'size'=>array(120, 160));
        $section->addImage(base_url($data['employee'][0]['photo']), array('width'=>210, 'height'=>210, 'align'=>'center'));
//        $this->phpWord->setImg('Value2',$img);
        $this->phpWord->setValue('Value2',base_url($data['employee'][0]['photo']));
        $this->phpWord->saveAs($filename);

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.$filename);
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
