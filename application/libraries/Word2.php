<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 01.06.2017
 * Time: 17:06
 */
require  APPPATH.'/libraries/PhpWord.php';
class Word2{

    private $phpWord,$obPHPWord;

    public function __construct()
    {
        $this->obPHPWord = new PHPWord();
        $this->phpWord = new PHPWord();
    }


    public function down($data=[]){

//        print_r($data);

        $document = $this->phpWord->loadTemplate(APPPATH.'/libraries/Example/Template2.docx');
//        $section = $this->phpWord->createSection();

        $document->setValue('kollej_name_lavozim', $data['employee'][0]['kollej_name'].', '.$data['employee'][0]['lavozim_name']);
        $document->setValue('Value1', $data['employee'][0]['name_f'] . ' ' . $data['employee'][0]['name_i'] . ' ' . $data['employee'][0]['name_o']);

//        $section->addImage(base_url($data['employee'][0]['photo']));

//        $document->replaceImage( base_url($data['employee'][0]['photo']),'Value2');
//        $document->setValue('Value2', $section->getElements());
        $document->setValue('Value3', $data['employee'][0]['bdate']);
        $document->setValue('Value4', $data['employee'][0]['viloyat'].', '.$data['employee'][0]['tuman']);
        $document->setValue('millat_name', $data['employee'][0]['millat_name']);
        $document->setValue('partiya_name', $data['employee'][0]['partiya_name']);
        $document->setValue('malumot_name', $data['employee'][0]['malumot_name']);
        $document->setValue('tugatgan', $data['employee'][0]['tugatgan_yili'].' '.$data['employee'][0]['otm_name']);
        $document->setValue('mutaxasis', $data['employee'][0]['mutax_kodi_name']);
        $document->setValue('ilmiydaraja', $data['employee'][0]['ilm_daraja_name']);
        $document->setValue('ilmiyunvon', $data['employee'][0]['ilmiy_unvon_nomi']);


        $lang='';
        if (count($data['languages'])>0) {
        foreach ($data['languages'] as $language) {
            $lang.=$language['tillar_nomi'].', ' ;
        }
        $lang.=' тили ';
        }
        $document->setValue('tillari',$lang);
        $document->setValue('mukofoti', $data['employee'][0]['mukofot_name']);

//        $table = $section->addTable();
//        $table->addRow(900);
//        $table->addCell(2000)->addText('Col 1');
//        $table->addCell(2000)->addText('Col 2');
//        $table->addCell(2000)->addText('Col 3');
//        $objWriter = PHPWord_IOFactory::createWriter($this->phpWord, 'Word2007');
//        $sTableText = $objWriter->getWriterPart('document')->getObjectAsText($table);
//
//        $document->setValue('myTable',$sTableText);
//        $document->save(APPPATH.'/libraries/Example/Solarsystem2.docx');

//        $template = $this->phpWord->loadTemplate(APPPATH.'/libraries/Example/obektivka.docx');
//        $template->setValue('objectname', $data['name_f'] . ' ' . $data['name_i'] . ' ' . $data['name_o']);
//        $template->setValue('objectimage', $data['photo']);
        $temp_filename =  $data['employee'][0]['name_f'] . ' ' . $data['employee'][0]['name_i'] . ' ' . $data['employee'][0]['name_o'].'.docx';
        $document->save($temp_filename);


        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.$temp_filename);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($temp_filename));
        flush();
        readfile($temp_filename);
        unlink($temp_filename);
        exit;
    }

    public function down2(){

        $obPHPWordDocument = $this->obPHPWord->loadTemplate(APPPATH.'/libraries/Example/Template2.docx');
        $section = $this->obPHPWord->createSection();
        $table = $section->addTable();
        $table->addRow(900);

        $table->addCell(2000)->addText('Col 1');
        $table->addCell(2000)->addText('Col 2');
        $table->addCell(2000)->addText('Col 3');

        $objWriter = PHPWord_IOFactory::createWriter($this->obPHPWord, 'Word2007');
        $sTableText = $objWriter->getWriterPart('document')->getObjectAsText($table);
        $obPHPWordDocument->setValue('myTable', $sTableText);
        $obPHPWordDocument->save(APPPATH.'/libraries/Example/result.docx');
    }


}