<?php

/**
 * Rah_runtime plugin for Textpattern CMS.
 *
 * @author  Jukka Svahn
 * @license GNU GPLv2
 * @link    http://rahforum.biz/plugins/rah_runtime
 *
 * Copyright (C) 2012 Jukka Svahn http://rahforum.biz
 * Licensed under GNU General Public License version 2
 * http://www.gnu.org/licenses/gpl-2.0.html
 */

function rah_runtime($atts, $thing = null)
{
    static $runtime = array();

    extract(lAtts(array(
        'format'     => 1,
        'index'      => 'default',
        'persistent' => 0,
        'return'     => 0,
    ), $atts));

    if ($thing !== null)
    {
        $time = getmicrotime();
        $thing = parse($thing);
    }
    else
    {   
        if (!isset($runtime[$index]))
        {
            $runtime[$index] = getmicrotime();
            return;
        }

        $time = $runtime[$index];

        if (!$persistent)
        {
            unset($runtime[$index]);
        }
    }

    $time = getmicrotime() - $time;

    if ($format)
    {
        $time = rtrim(number_format($time, 15, '.', ''), 0);
    }

    trace_add('[rah_runtime ('.$index.'): '.$time.']');

    $out = (string) $thing;

    if ($return)
    {
        $out .= $time;
    }

    return $out;
}