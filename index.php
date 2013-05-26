<?php
//
// PHASE: BOOTSTRAP
//
define('ALYSSA_INSTALL_PATH', dirname(__FILE__));
define('ALYSSA_SITE_PATH', ALYSSA_INSTALL_PATH . '/site');

require(ALYSSA_INSTALL_PATH.'/src/CAlyssa/bootstrap.php');

$ly = CAlyssa::Instance();


//
// PHASE: FRONTCONTROLLER ROUTE
//
$ly->FrontControllerRoute();


//
// PHASE: THEME ENGINE RENDER
//
$ly->ThemeEngineRender();