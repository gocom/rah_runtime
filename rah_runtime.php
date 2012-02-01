<?php	##################
	#
	#	rah_runtime-plugin for Textpattern
	#	version 0.3
	#	by Jukka Svahn
	#	http://rahforum.biz
	#
	#	Copyright (C) 2010 Jukka Svahn
	#	Licensed under GNU Genral Public License version 2
	#	http://www.gnu.org/licenses/gpl-2.0.html
	#
	###################

	function rah_runtime($atts) {
		static $runtime = array();

		extract(lAtts(array(
			'format' => 1,
			'index' => 0,
			'persistent' => 0
		),$atts));

		if(!isset($runtime[$index])) {
			$runtime[$index] = getmicrotime();
			return;
		}

		$time = getmicrotime() - $runtime[$index];

		if($format == 1)
			$time = rtrim(number_format($time,15,'.',''),0);

		if($persistent != 1)
			unset($runtime[$index]);

		return $time;
	}
?>