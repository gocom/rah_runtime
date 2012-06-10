<?php

/**
 * Rah_runtime plugin for Textpattern CMS
 *
 * @author Jukka Svahn
 * @date 2010-
 * @license GNU GPLv2
 * @link http://rahforum.biz/plugins/rah_runtime
 *
 * Copyright (C) 2012 Jukka Svahn <http://rahforum.biz>
 * Licensed under GNU Genral Public License version 2
 * http://www.gnu.org/licenses/gpl-2.0.html
 */

	function rah_runtime($atts) {
		static $runtime = array();

		extract(lAtts(array(
			'format' => 1,
			'index' => 0,
			'persistent' => 0
		), $atts));

		if(!isset($runtime[$index])) {
			$runtime[$index] = getmicrotime();
			return;
		}

		$time = getmicrotime() - $runtime[$index];

		if($format == 1) {
			$time = rtrim(number_format($time, 15, '.', ''), 0);
		}

		if(!$persistent) {
			unset($runtime[$index]);
		}

		return $time;
	}
?>