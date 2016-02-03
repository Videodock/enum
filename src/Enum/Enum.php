<?php

/**
 * Enum.php.
 *
 * @author      Nick van Ginkel <nick@videodock.com>
 * @copyright   2015 Video Dock b.v.
 *
 * This file is part of the videodock/enum project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Videodock\Component\Enum;

trait Enum
{
    /**
     * @var array A cache of all enum values to increase performance
     */
    protected static $cache = array();

    public static function getConstantForValue($value)
    {
        $key = array_search($value, static::values());

        return $key;
    }

    /**
     * Determine if a value as a valid constant for the enum.
     *
     * @param $value
     *
     * @return bool
     */
    public static function has($value)
    {
        return in_array($value, self::values());
    }

    /**
     * Returns the names (or keys) of all of constants in the enum.
     *
     * @return array
     */
    public static function keys()
    {
        return array_keys(static::values());
    }

    /**
     * Return the names and values of all the constants in the enum.
     *
     * @return array
     */
    public static function values()
    {
        $class = get_called_class();

        if (!isset(self::$cache[$class])) {
            $reflected           = new \ReflectionClass($class);
            self::$cache[$class] = $reflected->getConstants();
        }

        return self::$cache[$class];
    }
}
