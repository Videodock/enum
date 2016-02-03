<?php
/**
 * EnumHelper.php.
 *
 * @author      Nick van Ginkel <nick@videodock.com>
 * @copyright   2015 Video Dock b.v.
 *
 * This file is part of the videodock/enum project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Videodock\Component\Enum\Helpers;

class EnumHelper
{
    public static function isEnum($class)
    {
        $uses = class_uses($class);
        return array_key_exists('Videodock\Component\Enum\Enum',$uses);
    }
}
