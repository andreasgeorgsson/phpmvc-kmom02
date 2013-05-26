<?php
/**
 * Helpers for the template file.
 */
$ly -> data['header'] = '<h1>Header: Lydia</h1>';
$ly -> data['main'] = '<p>Main: Now with a theme engine, Not much more to report for now.</p>';
$ly -> data['footer'] = '<p>Footer: &copy; Lydia by Mikael Roos (mos@dbwebb.se)</p>';

/**
 * Print debuginformation from the framework.
 */
function get_debug() {
	$ly = CAlyssa::Instance();
	$html = "<h2>Debuginformation</h2><hr><p>The content of the config array:</p><pre>" . htmlentities(print_r($ly -> config, true)) . "</pre>";
	$html .= "<hr><p>The content of the data array:</p><pre>" . htmlentities(print_r($ly -> data, true)) . "</pre>";
	$html .= "<hr><p>The content of the request array:</p><pre>" . htmlentities(print_r($ly -> request, true)) . "</pre>";
	return $html;
}
