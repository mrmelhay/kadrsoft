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

        }

        public function exportxsl($data=null)
        {
            $this->excel = $this->Reader->load(APPPATH . '/libraries/Example/template.xlsx');
            $this->excel->getActiveSheet()->setCellValue('A3', $data['kollej_name']['kollej_name'] . "нинг раҳбарлар ҳамда маъмурий ходимлари тўғрисида умумий");
            $this->excel->getActiveSheet()->setCellValue('Z5', date('d.m.Y') . " ҳолатига");
            $numrow = 8;
            if ($data != null) {
               foreach ($data['employee'] as $datae) {
                   $this->excel->getActiveSheet()->setCellValue('A' . $numrow, $numrow);
                   $this->excel->getActiveSheet()->setCellValue('C' . $numrow, $datae['name_f'] . ' ' . $datae['name_i'] . ' ' . $datae['name_o']);
                   $this->excel->getActiveSheet()->setCellValue('D' . $numrow, $datae['lavozim_name']);
                   $this->excel->getActiveSheet()->setCellValue('E' . $numrow, $datae['bdate']);
                   $this->excel->getActiveSheet()->setCellValue('F' . $numrow, $datae['partiya_name']);
                   $this->excel->getActiveSheet()->setCellValue('G' . $numrow, $datae['malumot_name']);
                   $this->excel->getActiveSheet()->setCellValue('H' . $numrow, $datae['otm_name']);
                   $this->excel->getActiveSheet()->setCellValue('I' . $numrow, $datae['diplom_num']);
                   $this->excel->getActiveSheet()->setCellValue('J' . $numrow, $datae['tugatgan_yili']);
                   $this->excel->getActiveSheet()->setCellValue('K' . $numrow, $datae['mutax_kodi_name']);
                   $this->excel->getActiveSheet()->setCellValue('L' . $numrow, $datae['fanlar_name']);
                   $this->excel->getActiveSheet()->setCellValue('P' . $numrow, $datae['dars_soat_all']);
                   $this->excel->getActiveSheet()->setCellValue('R' . $numrow, $datae['otm_name']);

                   $tillar = '';
                   foreach ($data['languages'] as $language) {
                       $tillar .= $language['tillar_nomi'] . ', ';
                   }
                   $this->excel->getActiveSheet()->setCellValue('S' . $numrow, $datae['kirgan_yili']);
                   $this->excel->getActiveSheet()->setCellValue('T' . $numrow, $datae['umumiy_staj']);
                   $this->excel->getActiveSheet()->setCellValue('U' . $numrow, $datae['ped_staj']);
                   $this->excel->getActiveSheet()->setCellValue('W' . $numrow, $datae['sex'] == 1 ? 'Aёл' : 'Эркак');
                   $this->excel->getActiveSheet()->setCellValue('X' . $numrow, $datae['millat_name']);
                   $this->excel->getActiveSheet()->setCellValue('Y' . $numrow, $tillar);
                   $this->excel->getActiveSheet()->setCellValue('Z' . $numrow, $datae['address']);
                   $this->excel->getActiveSheet()->setCellValue('AA' . $numrow, $datae['ps_ser'] . ' ' . $datae['ps_num'] . ' ' . $datae['date_of_given']);


                   if (file_exists($datae['photo'])){
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
                   }

                    $numrow++;
                }
            }
            $Writer = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
            header('Content-type: application/vnd.ms-excel');
            header("Content-Disposition: attachment; filename=xisobot1.xlsx");
            $Writer->save('php://output');
        }

        public function exportstir($data)
        {
            $this->excel = $this->Reader->load(APPPATH . '/libraries/Example/templatestir.xlsx');
            $numrow = 2;
            $counter = 0;
            if ($data != null) {
                foreach ($data['employees'] as $datae) {

                    $counter++;
                    $this->excel->getActiveSheet()->setCellValue('A' . $numrow, $counter);
                    $this->excel->getActiveSheet()->setCellValue('B' . $numrow, $datae['kollej_name']);
                    $this->excel->getActiveSheet()->setCellValue('C' . $numrow, $datae['name_f'] . ' ' . $datae['name_i'] . ' ' . $datae['name_o']);
                    $this->excel->getActiveSheet()->setCellValue('D' . $numrow, $datae['lavozim_name']);
                    $this->excel->getActiveSheet()->setCellValue('E' . $numrow, $datae['inn']);
                    $this->excel->getActiveSheet()->setCellValue('F' . $numrow, $datae['inps']);

                    $this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(false);
                    $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(72.86);
                    $this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                    $this->excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                    $this->excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                    $this->excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                    $this->excel->getActiveSheet()->setBreak('B' . $numrow, PHPExcel_Worksheet::BREAK_COLUMN);
                    $this->excel->getActiveSheet()->freezePane('A2');
                    $this->excel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, 1);

                    $numrow++;

                }
            }
            $Writer = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
            header('Content-type: application/vnd.ms-excel');
            header("Content-Disposition: attachment; filename=xisobot2.xlsx");
            $Writer->save('php://output');
        }

        public function exportProfTex20($data = null)
        {
            $this->excel = $this->Reader->load(APPPATH . '/libraries/Example/proftex20.xlsx');
            $numrow = 2;
            $counter = 0;
            if ($data != null) {
                foreach ($data['employees'] as $datae) {

                    $counter++;
                    $this->excel->getActiveSheet()->setCellValue('A' . $numrow, $counter);
                    $this->excel->getActiveSheet()->setCellValue('B' . $numrow, $datae['kollej_name']);
                    $this->excel->getActiveSheet()->setCellValue('C' . $numrow, $datae['name_f'] . ' ' . $datae['name_i'] . ' ' . $datae['name_o']);
                    $this->excel->getActiveSheet()->setCellValue('D' . $numrow, $datae['lavozim_name']);
                    $this->excel->getActiveSheet()->setCellValue('E' . $numrow, $datae['inn']);
                    $this->excel->getActiveSheet()->setCellValue('F' . $numrow, $datae['inps']);

                    $this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(false);
                    $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(72.86);
                    $this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                    $this->excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                    $this->excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                    $this->excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                    $this->excel->getActiveSheet()->setBreak('B' . $numrow, PHPExcel_Worksheet::BREAK_COLUMN);
                    $this->excel->getActiveSheet()->freezePane('A2');
                    $this->excel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, 1);

                    $numrow++;

                }
            }
            $Writer = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
            header('Content-type: application/vnd.ms-excel');
            header("Content-Disposition: attachment; filename=xisobot2.xlsx");
            $Writer->save('php://output');
        }

    }