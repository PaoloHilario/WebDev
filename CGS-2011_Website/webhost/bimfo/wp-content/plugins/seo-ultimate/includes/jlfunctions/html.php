<?php
/*
JLFunctions HTML Class
Copyright (c)2010 John Lamansky
*/

class suhtml {
	
	/**
	 * Returns <option> tags.
	 */
	function option_tags($options, $current = true) {
		$html = '';
		foreach ($options as $value => $label) {
			if (is_array($label)) {
				$html .= "<optgroup label='$value'>\n".suhtml::option_tags($label, $current)."</optgroup>\n";
			} else {
				//if (is_numeric($value)) $value = '';
				$html .= "\t<option value='$value'";
				if ($value == $current) $html .= " selected='selected'";
				$html .= ">$label</option>\n";
			}
		}
		return $html;
	}
}

?>