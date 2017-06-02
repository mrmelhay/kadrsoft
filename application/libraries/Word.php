<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 01.06.2017
 * Time: 17:06
 */
require  APPPATH.'/libraries/PhpWord.php';
class Word{

    private $phpWord;

    public function __construct()
    {
        $this->phpWord = new PHPWord();
    }


    public function down($data=[]){

        $template = $this->phpWord->loadTemplate(APPPATH.'/libraries/Example/obektivka.docx');
        $template->setValue('NOMORSURAT', 1);
        $template->setValue('TANGGALSURAT', $data['name_f'] . ' ' . $data['name_i'] . ' ' . $data['name_o']);
        $template->setValue('BULANSURAT', date('m'));
        $template->setValue('TAHUNSURAT', date('Y'));
        $template->setValue('NAMA', 'M Arief Fakhrudin');
        $template->setValue('NRP', '7411030042');
        $template->setValue('NAMAPERUSAHAAN', 5);
        $template->setValue('JUMLAHBULAN', '2');
        $template->setValue('JUMLAHBULANHURUF', 'dua');

        $temp_filename = APPPATH.'/libraries/Example/save/obektivka.docx';
        $template->save($temp_filename);

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


}