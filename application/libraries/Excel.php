<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 19.07.2017
 * Time: 14:23
 */

require_once APPPATH . '/third_party/PHPExcel.php';

class Excel extends PHPExcel {


    public $excel;
    public $Reader;

    public function __construct()
    {
        parent::__construct();
        $this->excel=$this;
        $this->Reader=PHPExcel_IOFactory::createReader('Excel2007');
        $this->excel=$this->Reader->load(APPPATH.'/libraries/Example/template.xlsx');
    }

    public function exportxsl($data=null)
    {
        $numrow = 8;
        if ($data != null) {
           foreach ($data['employee'] as $datae) {
                $this->excel->getActiveSheet()->setCellValue('A'.$numrow, $numrow);
                $this->excel->getActiveSheet()->setCellValue('C'.$numrow, $datae['name_f'].' '.$datae['name_i'].' '.$datae['name_o']);
                $this->excel->getActiveSheet()->setCellValue('D'.$numrow, $datae['lavozim_name']);
                $this->excel->getActiveSheet()->setCellValue('E'.$numrow, $datae['bdate']);
               $this->excel->getActiveSheet()->setCellValue('F' . $numrow, $datae['partiya_name']);
                $this->excel->getActiveSheet()->setCellValue('G'.$numrow, $datae['malumot_name']);
               $this->excel->getActiveSheet()->setCellValue('H' . $numrow, $datae['otm_name']);
               $this->excel->getActiveSheet()->setCellValue('I' . $numrow, $datae['diplom_num']);
               $this->excel->getActiveSheet()->setCellValue('J' . $numrow, $datae['tugatgan_yili']);
               $this->excel->getActiveSheet()->setCellValue('K' . $numrow, $datae['mutax_kodi_name']);

               $tillar = '';
               foreach ($data['languages'] as $language) {
                   $tillar .= $language['tillar_nomi'] . ', ';
               }
               $this->excel->getActiveSheet()->setCellValue('T' . $numrow, $datae['umumiy_staj']);
               $this->excel->getActiveSheet()->setCellValue('U' . $numrow, $datae['ped_staj']);
               $this->excel->getActiveSheet()->setCellValue('X' . $numrow, $datae['millat_name']);
               $this->excel->getActiveSheet()->setCellValue('Y' . $numrow, $tillar);
               $this->excel->getActiveSheet()->setCellValue('Z' . $numrow, $datae['address']);
               $this->excel->getActiveSheet()->setCellValue('AA' . $numrow, $datae['ps_ser'] . ' ' . $datae['ps_num'] . ' ' . $datae['date_of_given']);



                $objDrawing = new PHPExcel_Worksheet_Drawing();
                $objDrawing->setName('Customer Signature');
                $objDrawing->setDescription('Customer Signature');
                $objDrawing->setPath($datae['photo']);
                $objDrawing->setOffsetX(0);
                $objDrawing->setOffsetY(0);
                $objDrawing->setCoordinates('B'.$numrow);
                $objDrawing->setWidth(80);
                $objDrawing->setHeight(60);
                $objDrawing->setWorksheet($this->excel->getActiveSheet());
                $numrow++;
            }
        }
        $Writer = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
        header('Content-type: application/vnd.ms-excel');
        header("Content-Disposition: attachment; filename=xisobot1.xls");
        $Writer->save('php://output');
    }

}