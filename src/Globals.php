<?php

namespace OOPHP;

/**
 * Class Globals
 * @package OOPHP
 * string(4) "_GET"
 * string(5) "_POST"
 * string(7) "_COOKIE"
 * string(6) "_FILES"
 * string(4) "argv"
 * string(4) "argc"
 * string(7) "_SERVER"
 * string(7) "GLOBALS"
 */
class Globals extends ArrayO
{
    const REAL_GLOBALS = ['_GET', '_POST', '_COOKIE', '_FILES', '_SERVER'];
    const EXT_GLOBALS = ['GLOBALS', 'argv'];

    public static function objectify(array $globals = null)
    {
        if ($globals === null) {
            $globals = $GLOBALS;
        }

        // This is to check that we are initializing from the actual globals
        if (array_key_exists('GLOBALS', $globals)) {
            foreach (static::EXT_GLOBALS as $key) {
                if (array_key_exists($key, $globals)) {
                    global ${$key};
                    ${$key} = new static($globals[$key]);
                }
            }
            foreach (static::REAL_GLOBALS as $key) {
                if (array_key_exists($key, $globals)) {
                    global ${$key};
                    ${$key} = new static(${$key});
                }
            }
        }
    }
}
