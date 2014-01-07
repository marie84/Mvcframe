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
 * Set what to show as debug or developer information in the get_debug() theme helper.
 */
$mv->config['debug']['mvcframe'] = false;
$mv->config['debug']['session'] = false;
$mv->config['debug']['timer'] = true;
$mv->config['debug']['db-num-queries'] = true;
$mv->config['debug']['db-queries'] = true;


/**
 * Set database(s).
 */
$mv->config['database'][0]['dsn'] = 'sqlite:' . MVCFRAME_SITE_PATH . '/data/.ht.sqlite';


/**
 * What type of urls should be used?
 * 
 * default      = 0      => index.php/controller/method/arg1/arg2/arg3
 * clean        = 1      => controller/method/arg1/arg2/arg3
 * querystring  = 2      => index.php?q=controller/method/arg1/arg2/arg3
 */
$mv->config['url_type'] = 1;


/**
 * Set a base_url to use another than the default calculated
 */
$mv->config['base_url'] = null;


/**
 * Define session name
 */
$mv->config['session_name'] = preg_replace('/[:\.\/-_]/', '', $_SERVER["SERVER_NAME"]);
$mv->config['session_key']  = 'mvcframe';


/**
 * Define server timezone
 */
$mv->config['timezone'] = 'Europe/Stockholm';


/**
 * Define internal character encoding
 */
$mv->config['character_encoding'] = 'UTF-8';


/**
 * Define language
 */
$mv->config['language'] = 'en';


/**
 * Define the controllers, their classname and enable/disable them.
 *
 * The array-key is matched against the url, for example: 
 * the url 'developer/dump' would instantiate the controller with the key "developer", that is 
 * CCDeveloper and call the method "dump" in that class. This process is managed in:
 * $ly->FrontControllerRoute();
 * which is called in the frontcontroller phase from index.php.
 */
$mv->config['controllers'] = array(
  'index'     => array('enabled' => true,'class' => 'CCIndex'),
  'developer' => array('enabled' => true,'class' => 'CCDeveloper'),
  'guestbook' => array('enabled' => true,'class' => 'CCGuestbook'),
);

/**
 * Settings for the theme.
 */
$mv->config['theme'] = array(
  // The name of the theme in the theme directory
  'name'    => 'core', 
);