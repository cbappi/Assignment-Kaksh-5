<?php

function input($name, $placeholder, $value=null) {
	if($value == null && isset($_SESSION['POST'][$name])) {
		$value = $_SESSION['POST'][$name];
		
		// Remove from session data
		unset($_SESSION['POST'][$name]);
	
		if($value == '') {
			$class = 'class="error"';
		} else {
			$class = '';
		}
	} elseif($value != null) {
		$class = '';
	} else {
		$value = '';
		$class = '';
	}
	return "<input $class type=\"text\" name=\"$name\" placeholder=\"$placeholder\" value=\"$value\" />";
}



function dropdown($name, $options) {
	$select = "<select name=\"$name\">";
	
	// Add option elements to select element
	foreach($options as $value => $text) {
		// If there is session form data for $name, AND its value
		// is the same as the current array element, select it
		if(isset($_SESSION['POST'][$name]) && $_SESSION['FORM'][$name] == $value) {
			unset($_SESSION['FIRM'][$name]);
			$selected = 'selected="selected';
		} else {
			$selected = '';
		}
		$select .= "<option $selected value=\"$value\">$text</option>";
	}
	
	$select .= "</select>";
	return $select;
}

function radio($name, $options) {
	$radio = '';
	
	// Loop over options
	foreach($options as $value => $text) {
		// If there is session form data for $name, AND its value is the same as the current array
		// element, select it
		if(isset($_SESSION['POST'][$name]) && $_SESSION['POST'][$name] == $value) {
			unset($_SESSION['POST'][$name]);
			$checked = 'checked="checked"';
		} else {
			$checked = '';
		}
		$radio .="<label><input type=\"radio\" name=\"$name\" value=\"$value\" $checked /> $text</label>";
	}
	return $radio;
}
?>