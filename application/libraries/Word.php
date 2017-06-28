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
        $section->addText($data['employee'][0]['kollej_name'].', '.$data['employee'][0]['lavozim_name'], array('bold' => true,'underline' => 'single','name'=> 'arial','size' => 21,'color' =>'red'),array('align' => 'center', 'spaceAfter' => 10));
        $section->addTextBreak(1);
        $section->addImage(base_url($data['employee'][0]['photo']), array('align' => 'right'));
        $section->addTextBreak(1);
        $section->addText($data['employee'][0]['name_f'] . ' ' . $data['employee'][0]['name_i'] . ' ' . $data['employee'][0]['name_o'], array('name'=> 'arial','size' => 14),array('align' => 'left', 'spaceAfter' => 100));

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
}
