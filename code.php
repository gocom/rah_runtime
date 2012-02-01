<?php	##################
	#
	#	rah_runtime-plugin for Textpattern
	#	version 0.2
	#	by Jukka Svahn
	#	http://rahforum.biz
	#
	#	Copyright (C) 2010 Jukka Svahn
	#	Licensed under GNU Genral Public License version 2
	#	http://www.gnu.org/licenses/gpl-2.0.html
	#
	###################

	function rah_runtime($atts) {
		global $rah_runtime;

		extract(lAtts(array(
			'format' => 1,
			'index' => 0
		),$atts));

		if(!isset($rah_runtime[$index]) or empty($rah_runtime[$index])) {
			$rah_runtime[$index] = getmicrotime();
			return;
		}

		if($format == 1)
			$time = rtrim(number_format(getmicrotime() - $rah_runtime[$index],15,'.',''),0);
		else
			$time = getmicrotime() - $rah_runtime[$index];

		$rah_runtime[$index] = '';
		unset($GLOBALS['rah_runtime'][$index]);

		return $time;
	}
?>