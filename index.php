<?php
//
// PHASE: BOOTSTRAP
//
define('PAW_INSTALL_PATH', dirname(__FILE__));
define('PAW_SITE_PATH', PAW_INSTALL_PATH . '/site');

require (PAW_INSTALL_PATH . '/src/CPaw/bootstrap.php');

$paw = CPaw::Instance();

//
// PHASE: FRONTCONTROLLER ROUTE
//
$paw -> FrontControllerRoute();

//
// PHASE: THEME ENGINE RENDER
//
$paw -> ThemeEngineRender();
