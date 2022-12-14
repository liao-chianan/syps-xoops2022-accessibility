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
 * @copyright   2010-2016 PHPWord contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace PhpOffice\PhpWord\Writer\Word2007\Style;

use PhpOffice\Common\XMLWriter;
use PhpOffice\PhpWord\Style;
use PhpOffice\PhpWord\Style\Paragraph as ParagraphStyle;
use PhpOffice\PhpWord\Writer\Word2007\Element\ParagraphAlignment;

/**
 * Paragraph style writer
 *
 * @since 0.10.0
 */
class Paragraph extends AbstractStyle
{
    /**
     * Without w:pPr
     *
     * @var bool
     */
    private $withoutPPR = false;

    /**
     * Is inline in element
     *
     * @var bool
     */
    private $isInline = false;

    /**
     * Write style.
     *
     * @return void
     */
    public function write()
    {
        $xmlWriter = $this->getXmlWriter();

        $isStyleName = $this->isInline && null !== $this->style && is_string($this->style);
        if ($isStyleName) {
            if (!$this->withoutPPR) {
                $xmlWriter->startElement('w:pPr');
            }
            $xmlWriter->startElement('w:pStyle');
            $xmlWriter->writeAttribute('w:val', $this->style);
            $xmlWriter->endElement();
            if (!$this->withoutPPR) {
                $xmlWriter->endElement();
            }
        } else {
            $this->writeStyle();
        }
    }

    /**
     * Write full style.
     *
     * @return void
     */
    private function writeStyle()
    {
        $style = $this->getStyle();
        if (!$style instanceof ParagraphStyle) {
            return;
        }
        $xmlWriter = $this->getXmlWriter();
        $styles = $style->getStyleValues();

        if (!$this->withoutPPR) {
            $xmlWriter->startElement('w:pPr');
        }

        // Style name
        if (true === $this->isInline) {
            $xmlWriter->writeElementIf(null !== $styles['name'], 'w:pStyle', 'w:val', $styles['name']);
        }

        // Pagination
        $xmlWriter->writeElementIf(false === $styles['pagination']['widowControl'], 'w:widowControl', 'w:val', '0');
        $xmlWriter->writeElementIf(true === $styles['pagination']['keepNext'], 'w:keepNext', 'w:val', '1');
        $xmlWriter->writeElementIf(true === $styles['pagination']['keepLines'], 'w:keepLines', 'w:val', '1');
        $xmlWriter->writeElementIf(true === $styles['pagination']['pageBreak'], 'w:pageBreakBefore', 'w:val', '1');

        // Paragraph alignment
        if ('' !== $styles['alignment']) {
            $paragraphAlignment = new ParagraphAlignment($styles['alignment']);
            $xmlWriter->startElement($paragraphAlignment->getName());
            foreach ($paragraphAlignment->getAttributes() as $attributeName => $attributeValue) {
                $xmlWriter->writeAttribute($attributeName, $attributeValue);
            }
            $xmlWriter->endElement();
        }

        // Child style: alignment, indentation, spacing, and shading
        $this->writeChildStyle($xmlWriter, 'Indentation', $styles['indentation']);
        $this->writeChildStyle($xmlWriter, 'Spacing', $styles['spacing']);
        $this->writeChildStyle($xmlWriter, 'Shading', $styles['shading']);

        // Tabs
        $this->writeTabs($xmlWriter, $styles['tabs']);

        // Numbering
        $this->writeNumbering($xmlWriter, $styles['numbering']);

        // Border
        if ($style->hasBorder()) {
            $xmlWriter->startElement('w:pBdr');

            $styleWriter = new MarginBorder($xmlWriter);
            $styleWriter->setSizes($style->getBorderSize());
            $styleWriter->setColors($style->getBorderColor());
            $styleWriter->write();

            $xmlWriter->endElement();
        }

        if (!$this->withoutPPR) {
            $xmlWriter->endElement(); // w:pPr
        }
    }

    /**
     * Write tabs.
     *
     * @param \PhpOffice\PhpWord\Style\Tab[] $tabs
     * @return void
     */
    private function writeTabs(XMLWriter $xmlWriter, $tabs)
    {
        if (!empty($tabs)) {
            $xmlWriter->startElement('w:tabs');
            foreach ($tabs as $tab) {
                $styleWriter = new Tab($xmlWriter, $tab);
                $styleWriter->write();
            }
            $xmlWriter->endElement();
        }
    }

    /**
     * Write numbering.
     *
     * @param array $numbering
     * @return void
     */
    private function writeNumbering(XMLWriter $xmlWriter, $numbering)
    {
        $numStyle = $numbering['style'];
        $numLevel = $numbering['level'];

        /** @var \PhpOffice\PhpWord\Style\Numbering $numbering */
        $numbering = Style::getStyle($numStyle);
        if (null !== $numStyle && null !== $numbering) {
            $xmlWriter->startElement('w:numPr');
            $xmlWriter->startElement('w:numId');
            $xmlWriter->writeAttribute('w:val', $numbering->getIndex());
            $xmlWriter->endElement(); // w:numId
            $xmlWriter->startElement('w:ilvl');
            $xmlWriter->writeAttribute('w:val', $numLevel);
            $xmlWriter->endElement(); // w:ilvl
            $xmlWriter->endElement(); // w:numPr

            $xmlWriter->startElement('w:outlineLvl');
            $xmlWriter->writeAttribute('w:val', $numLevel);
            $xmlWriter->endElement(); // w:outlineLvl
        }
    }

    /**
     * Set without w:pPr.
     *
     * @param bool $value
     * @return void
     */
    public function setWithoutPPR($value)
    {
        $this->withoutPPR = $value;
    }

    /**
     * Set is inline.
     *
     * @param bool $value
     * @return void
     */
    public function setIsInline($value)
    {
        $this->isInline = $value;
    }
}
