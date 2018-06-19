<?php 

/**
* PLUGIN DEACTIVATION CLASS
*/
class RelatedPostMPFDeactivate
{
	function __construct()
	{
		# code...
	}

	public static function deactivate() {

		flush_rewrite_rules();

	}

}
