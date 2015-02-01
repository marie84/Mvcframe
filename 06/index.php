<?php
//
// PHASE: BOOTSTRAP
//
define('MVCFRAME_INSTALL_PATH', dirname(__FILE__));
define('MVCFRAME_SITE_PATH', MVCFRAME_INSTALL_PATH . '/site');

require(MVCFRAME_INSTALL_PATH.'/src/bootstrap.php');

$mv = CMvcframe::Instance();

//
// PHASE: FRONTCONTROLLER ROUTE
//
$mv->FrontControllerRoute();


//
// PHASE: THEME ENGINE RENDER
//
$mv->ThemeEngineRender();
