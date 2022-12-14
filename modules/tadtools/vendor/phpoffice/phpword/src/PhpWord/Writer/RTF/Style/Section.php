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

namespace PhpOffice\PhpWord\Writer\RTF\Style;

use PhpOffice\PhpWord\Style\Section as SectionStyle;

/**
 * RTF section style writer
 *
 * @since 0.12.0
 */
class Section extends AbstractStyle
{
    /**
     * Write style
     *
     * @return string
     */
    public function write()
    {
        $style = $this->getStyle();
        if (!$style instanceof SectionStyle) {
            return '';
        }

        $content = '';

        $content .= '\sectd ';

        // Size & margin
        $content .= $this->getValueIf(null !== $style->getPageSizeW(), '\pgwsxn' . $style->getPageSizeW());
        $content .= $this->getValueIf(null !== $style->getPageSizeH(), '\pghsxn' . $style->getPageSizeH());
        $content .= ' ';
        $content .= $this->getValueIf(null !== $style->getMarginTop(), '\margtsxn' . $style->getMarginTop());
        $content .= $this->getValueIf(null !== $style->getMarginRight(), '\margrsxn' . $style->getMarginRight());
        $content .= $this->getValueIf(null !== $style->getMarginBottom(), '\margbsxn' . $style->getMarginBottom());
        $content .= $this->getValueIf(null !== $style->getMarginLeft(), '\marglsxn' . $style->getMarginLeft());
        $content .= $this->getValueIf(null !== $style->getHeaderHeight(), '\headery' . $style->getHeaderHeight());
        $content .= $this->getValueIf(null !== $style->getFooterHeight(), '\footery' . $style->getFooterHeight());
        $content .= $this->getValueIf(null !== $style->getGutter(), '\guttersxn' . $style->getGutter());
        $content .= ' ';

        // Borders
        if ($style->hasBorder()) {
            $styleWriter = new Border($style);
            $styleWriter->setParentWriter($this->getParentWriter());
            $styleWriter->setSizes($style->getBorderSize());
            $styleWriter->setColors($style->getBorderColor());
            $content .= $styleWriter->write();
        }

        return $content . PHP_EOL;
    }
}
