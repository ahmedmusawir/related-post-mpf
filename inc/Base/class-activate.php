<?php 

/**
* PLUGIN ACTIVATION CLASS
*/
class RelatedPostMPFActivate
{
	function __construct()
	{
		# code...
	}

	public static function activate() {

		flush_rewrite_rules();
	}
}
