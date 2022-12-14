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

namespace PhpOffice\PhpWord\SimpleType;

use Zend\Validator\InArray;

/**
 * Table Alignment Type.
 *
 * Introduced in ISO/IEC-29500:2008.
 *
 * @since 0.13.0
 *
 * @codeCoverageIgnore
 */
final class JcTable
{
    const START = 'start';
    const CENTER = 'center';
    const END = 'end';

    /**
     * @since 0.13.0
     *
     * @return \Zend\Validator\InArray
     */
    final public static function getValidator()
    {
        // todo: consider caching validator instances.
        return new InArray(
            [
                'haystack' => [self::START, self::CENTER, self::END],
                'strict' => InArray::COMPARE_STRICT,
            ]
        );
    }
}
