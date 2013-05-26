<?php
/**
 * Site configuration, this file is changed by user per site.
 *
 */

/**
 * Set level of error reporting
 */
error_reporting(-1);
ini_set('display_errors', 1);

/**
 * What type of urls should be used?
 *
 * default      = 0      => index.php/controller/method/arg1/arg2/arg3
 * clean        = 1      => controller/method/arg1/arg2/arg3
 * querystring  = 2      => index.php?q=controller/method/arg1/arg2/arg3
 */
$paw -> config['url_type'] = 1;

/**
 * Set a base_url to use another than the default calculated
 */
$paw -> config['base_url'] = null;

/**
 * Define session name
 */
$paw -> config['session_name'] = preg_replace('/[:\.\/-_]/', '', $_SERVER["SERVER_NAME"]);

/**
 * Define server timezone
 */
$paw -> config['timezone'] = 'Europe/Stockholm';

/**
 * Define internal character encoding
 */
$paw -> config['character_encoding'] = 'UTF-8';

/**
 * Define language
 */
$paw -> config['language'] = 'en';

/**
 * Define the controllers, their classname and enable/disable them.
 *
 * The array-key is matched against the url, for example:
 * the url 'developer/dump' would instantiate the controller with the key "developer", that is
 * CCDeveloper and call the method "dump" in that class. This process is managed in:
 * $paw->FrontControllerRoute();
 * which is called in the frontcontroller phase from index.php.
 */
$paw -> config['controllers'] = array('index' => array('enabled' => true, 'class' => 'CCIndex'), 'developer' => array('enabled' => true, 'class' => 'CCDeveloper'), );

/**
 * Settings for the theme.
 */
$paw -> config['theme'] = array(
// The name of the theme in the theme directory
'name' => 'core', );
