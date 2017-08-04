<?php
/**
 * This file is part of PHPWord - A pure PHP library for reading and writing
 * word processing documents.
 *
 * PHPWord is free software distributed under the terms of the GNU Lesser
 * General Public License version 3 as published by the Free Software Foundation.
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/PHPOffice/PHPWord/contributors.
 *
 * @link        https://github.com/PHPOffice/PHPWord
 * @copyright   2010-2014 PHPWord contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace PhpOffice\PhpWord\Writer\Word2007\Part;

use PhpOffice\PhpWord\Element\Link;
use PhpOffice\PhpWord\Element\Section;
use PhpOffice\PhpWord\Shared\XMLWriter;
use PhpOffice\PhpWord\Writer\HTML\Element\Image;
use PhpOffice\PhpWord\Writer\RTF\Element\Table;
use PhpOffice\PhpWord\Writer\Word2007\Element\Container;
use PhpOffice\PhpWord\Writer\Word2007\Element\ListItem;
use PhpOffice\PhpWord\Writer\Word2007\Element\Object;
use PhpOffice\PhpWord\Writer\Word2007\Element\PageBreak;
use PhpOffice\PhpWord\Writer\Word2007\Element\Text;
use PhpOffice\PhpWord\Writer\Word2007\Element\TextBreak;
use PhpOffice\PhpWord\Writer\Word2007\Element\TextRun;
use PhpOffice\PhpWord\Writer\Word2007\Element\Title;
use PhpOffice\PhpWord\Writer\Word2007\Element\TOC;
use PhpOffice\PhpWord\Writer\Word2007\Style\Section as SectionStyleWriter;

/**
 * Word2007 document part writer: word/document.xml
 */
class Document extends AbstractPart
{
    /**
     * Write part
     *
     * @return string
     */
    public function write()
    {
        $phpWord = $this->getParentWriter()->getPhpWord();
        $xmlWriter = $this->getXmlWriter();

        $sections = $phpWord->getSections();
        $sectionCount = count($sections);
        $currentSection = 0;
        $drawingSchema = 'http://schemas.openxmlformats.org/drawingml/2006/wordprocessingDrawing';

        $xmlWriter->startDocument('1.0', 'UTF-8', 'yes');
        $xmlWriter->startElement('w:document');
        $xmlWriter->writeAttribute('xmlns:ve', 'http://schemas.openxmlformats.org/markup-compatibility/2006');
        $xmlWriter->writeAttribute('xmlns:o', 'urn:schemas-microsoft-com:office:office');
        $xmlWriter->writeAttribute('xmlns:r', 'http://schemas.openxmlformats.org/officeDocument/2006/relationships');
        $xmlWriter->writeAttribute('xmlns:m', 'http://schemas.openxmlformats.org/officeDocument/2006/math');
        $xmlWriter->writeAttribute('xmlns:v', 'urn:schemas-microsoft-com:vml');
        $xmlWriter->writeAttribute('xmlns:wp', $drawingSchema);
        $xmlWriter->writeAttribute('xmlns:w10', 'urn:schemas-microsoft-com:office:word');
        $xmlWriter->writeAttribute('xmlns:w', 'http://schemas.openxmlformats.org/wordprocessingml/2006/main');
        $xmlWriter->writeAttribute('xmlns:wne', 'http://schemas.microsoft.com/office/word/2006/wordml');

        $xmlWriter->startElement('w:body');


        if ($sectionCount > 0) {
            foreach ($sections as $section) {
                $currentSection++;

                $containerWriter = new Container($xmlWriter, $section);
                $containerWriter->write();

                if ($currentSection == $sectionCount) {
                    $this->writeSectionSettings($xmlWriter, $section);
                } else {
                    $this->writeSection($xmlWriter, $section);
                }
            }
        }

        $xmlWriter->endElement(); // w:body
        $xmlWriter->endElement(); // w:document

        return $xmlWriter->getData();
    }

    /**
     * Write begin section.
     *
     * @param \PhpOffice\PhpWord\Shared\XMLWriter $xmlWriter
     * @param \PhpOffice\PhpWord\Element\Section $section
     * @return void
     */
    private function writeSection(XMLWriter $xmlWriter, Section $section)
    {
        $xmlWriter->startElement('w:p');
        $xmlWriter->startElement('w:pPr');
        $this->writeSectionSettings($xmlWriter, $section);
        $xmlWriter->endElement();
        $xmlWriter->endElement();
    }

    /**
     * Write end section.
     *
     * @param \PhpOffice\PhpWord\Shared\XMLWriter $xmlWriter
     * @param \PhpOffice\PhpWord\Element\Section $section
     * @return void
     */
    private function writeSectionSettings(XMLWriter $xmlWriter, Section $section)
    {
        $xmlWriter->startElement('w:sectPr');

        // Header reference
        foreach ($section->getHeaders() as $header) {
            $rId = $header->getRelationId();
            $xmlWriter->startElement('w:headerReference');
            $xmlWriter->writeAttribute('w:type', $header->getType());
            $xmlWriter->writeAttribute('r:id', 'rId' . $rId);
            $xmlWriter->endElement();
        }

        // Footer reference
        foreach ($section->getFooters() as $footer) {
            $rId = $footer->getRelationId();
            $xmlWriter->startElement('w:footerReference');
            $xmlWriter->writeAttribute('w:type', $footer->getType());
            $xmlWriter->writeAttribute('r:id', 'rId' . $rId);
            $xmlWriter->endElement();
        }

        // Different first page
        if ($section->hasDifferentFirstPage()) {
            $xmlWriter->startElement('w:titlePg');
            $xmlWriter->endElement();
        }

        // Section settings
        $styleWriter = new SectionStyleWriter($xmlWriter, $section->getStyle());
        $styleWriter->write();

        $xmlWriter->endElement(); // w:sectPr
    }

    public function getObjectAsText($element){

        if($this->getParentWriter()->getUseDiskCaching()) {
            $objWriter = new \PhpOffice\PhpWord\Shared\XMLWriter(\PhpOffice\PhpWord\Shared\XMLWriter::STORAGE_DISK, $this->getParentWriter()->getDiskCachingDirectory());
        } else {
            $objWriter = new \PhpOffice\PhpWord\Shared\XMLWriter(\PhpOffice\PhpWord\Shared\XMLWriter::STORAGE_MEMORY);
        }
        if($element instanceof PHPWord_Section_Text) {
            $this->_writeText($objWriter, $element);
        } elseif($element instanceof PHPWord_Section_TextRun) {
            $this->_writeTextRun($objWriter, $element);
        } elseif($element instanceof PHPWord_Section_Link) {
            $this->_writeLink($objWriter, $element);
        } elseif($element instanceof PHPWord_Section_Title) {
            $this->_writeTitle($objWriter, $element);
        } elseif($element instanceof PHPWord_Section_TextBreak) {
            $this->_writeTextBreak($objWriter);
        } elseif($element instanceof PHPWord_Section_PageBreak) {
            $this->_writePageBreak($objWriter);
        } elseif($element instanceof PHPWord_Section_Table) {
            $this->_writeTable($objWriter, $element);
        } elseif($element instanceof PHPWord_Section_ListItem) {
            $this->_writeListItem($objWriter, $element);
        } elseif($element instanceof PHPWord_Section_Image ||
            $element instanceof PHPWord_Section_MemoryImage) {
            $this->_writeImage($objWriter, $element);
        } elseif($element instanceof PHPWord_Section_Object) {
            $this->_writeObject($objWriter, $element);
        } elseif($element instanceof PHPWord_TOC) {
            $this->_writeTOC($objWriter);
        }
        return trim(preg_replace("/[\x1-\x8\xB-\xC\xE-\x1F-\t+]/", "", $objWriter->getData()));

    }

    public function getTableAsText($element) {

//
//        $objWriter = $this->getXmlWriter();
//        if($element instanceof Text) {
//            $writer = new \PhpOffice\PhpWord\Writer\Word2007\Element\Text($objWriter, $element);
//            $writer->write();
//        } elseif($element instanceof TextRun) {
//            $this->write($objWriter, $element);
//        } elseif($element instanceof Link) {
//            $this->write($objWriter, $element);
//        } elseif($element instanceof Title) {
//            $this->write($objWriter, $element);
//        } elseif($element instanceof TextBreak) {
//            $this->write($objWriter);
//        } elseif($element instanceof PageBreak) {
//            $this->write($objWriter);
//        } elseif($element instanceof Table) {
//            $writer = new \PhpOffice\PhpWord\Writer\Word2007\Element\Table($objWriter, $element);
//            $writer->write();
//        } elseif($element instanceof ListItem) {
//            $this->write($objWriter, $element);
//        } elseif($element instanceof Image) {
//            $this->write($objWriter, $element);
//        } elseif($element instanceof Object) {
//            $this->write($objWriter, $element);
//        } elseif($element instanceof TOC) {
//            $this->write($objWriter);
//        }
//        return trim(preg_replace("/[\x1-\x8\xB-\xC\xE-\x1F-\t+]/", "", $objWriter->getData()));


        $xmlWriter = $this->getXmlWriter();
        $writer = new \PhpOffice\PhpWord\Writer\Word2007\Element\Table($xmlWriter, $element);
        $writer->write();
        return $xmlWriter->getData();
    }

    public function getTextAsText($element){

        $xmlWriter = $this->getXmlWriter();
        $writer = new \PhpOffice\PhpWord\Writer\Word2007\Element\Text($xmlWriter, $element);
        $writer->write();
        return $xmlWriter->getData();
    }
}
