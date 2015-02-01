<?php

/**
 * Description of Tools
 *
 * @author Holger
 */
class Tools {
	
	public static function debug($expression, $output = 'var_dump') {
		
		if(!DEBUG) {
			return;
		}
		
		echo '<pre>';
		($output == 'var_dump') ? var_dump($expression) : print_r($expression);
		echo '</pre>';
	}
}

?>
