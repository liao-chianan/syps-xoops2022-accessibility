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

namespace PhpOffice\PhpWord\Style;

/**
 * Spacing between lines and above/below paragraph style
 *
 * @link http://www.schemacentral.com/sc/ooxml/t-w_CT_Spacing.html
 * @since 0.10.0
 */
class Spacing extends AbstractStyle
{
    /**
     * Spacing above paragraph (twip)
     *
     * @var int|float
     */
    private $before;

    /**
     * Spacing below paragraph (twip)
     *
     * @var int|float
     */
    private $after;

    /**
     * Spacing between lines in paragraph (twip)
     *
     * @var int|float
     */
    private $line;

    /**
     * Type of spacing between lines
     *
     * @var string
     */
    private $rule = 'auto';

    /**
     * Create a new instance
     *
     * @param array $style
     */
    public function __construct($style = [])
    {
        $this->setStyleByArray($style);
    }

    /**
     * Get before
     *
     * @return int|float
     */
    public function getBefore()
    {
        return $this->before;
    }

    /**
     * Set before
     *
     * @param int|float $value
     * @return self
     */
    public function setBefore($value = null)
    {
        $this->before = $this->setNumericVal($value, $this->before);

        return $this;
    }

    /**
     * Get after
     *
     * @return int|float
     */
    public function getAfter()
    {
        return $this->after;
    }

    /**
     * Set after
     *
     * @param int|float $value
     * @return self
     */
    public function setAfter($value = null)
    {
        $this->after = $this->setNumericVal($value, $this->after);

        return $this;
    }

    /**
     * Get line
     *
     * @return int|float
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * Set distance
     *
     * @param int|float $value
     * @return self
     */
    public function setLine($value = null)
    {
        $this->line = $this->setNumericVal($value, $this->line);

        return $this;
    }

    /**
     * Get line rule
     *
     * @return string
     */
    public function getRule()
    {
        return $this->rule;
    }

    /**
     * Set line rule
     *
     * @param string $value
     * @return self
     */
    public function setRule($value = null)
    {
        $this->rule = $value;

        return $this;
    }
}
