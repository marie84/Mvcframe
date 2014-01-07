<?php
/**
 * Helpers for theming, available for all themes in their template files and functions.php.
 * This file is included right before the themes own functions.php
 */
 

/**
 * Print debuginformation from the framework.
 */
function get_debug() {
  // Only if debug is wanted.
  $mv = CMvcframe::Instance();  
  if(empty($mv->config['debug'])) {
    return;
  }
  
  // Get the debug output
  $html = null;
  if(isset($mv->config['debug']['db-num-queries']) && $mv->config['debug']['db-num-queries'] && isset($mv->db)) {
    $flash = $mv->session->GetFlash('database_numQueries');
    $flash = $flash ? "$flash + " : null;
    $html .= "<p>Database made $flash" . $mv->db->GetNumQueries() . " queries.</p>";
  }    
  if(isset($mv->config['debug']['db-queries']) && $mv->config['debug']['db-queries'] && isset($mv->db)) {
    $flash = $mv->session->GetFlash('database_queries');
    $queries = $mv->db->GetQueries();
    if($flash) {
      $queries = array_merge($flash, $queries);
    }
    $html .= "<p>Database made the following queries.</p><pre>" . implode('<br/><br/>', $queries) . "</pre>";
  }    
  if(isset($mv->config['debug']['timer']) && $mv->config['debug']['timer']) {
    $html .= "<p>Page was loaded in " . round(microtime(true) - $mv->timer['first'], 5)*1000 . " msecs.</p>";
  }    
  if(isset($mv->config['debug']['mvcframe']) && $mv->config['debug']['mvcframe']) {
    $html .= "<hr><h3>Debuginformation</h3><p>The content of CMvcframe:</p><pre>" . htmlent(print_r($mv, true)) . "</pre>";
  }    
  if(isset($mv->config['debug']['session']) && $mv->config['debug']['session']) {
    $html .= "<hr><h3>SESSION</h3><p>The content of CMvcframe->session:</p><pre>" . htmlent(print_r($mv->session, true)) . "</pre>";
    $html .= "<p>The content of \$_SESSION:</p><pre>" . htmlent(print_r($_SESSION, true)) . "</pre>";
  }    
  return $html;
}


/**
 * Get messages stored in flash-session.
 */
function get_messages_from_session() {
  $messages = CMvcframe::Instance()->session->GetMessages();
  $html = null;
  if(!empty($messages)) {
    foreach($messages as $val) {
      $valid = array('info', 'notice', 'success', 'warning', 'error', 'alert');
      $class = (in_array($val['type'], $valid)) ? $val['type'] : 'info';
      $html .= "<div class='$class'>{$val['message']}</div>\n";
    }
  }
  return $html;
}


/**
 * Prepend the base_url.
 */
function base_url($url=null) {
  return CMvcframe::Instance()->request->base_url . trim($url, '/');
}


/**
 * Create a url to an internal resource.
 */
function create_url($url=null) {
  return CMvcframe::Instance()->request->CreateUrl($url);
}


/**
 * Prepend the theme_url, which is the url to the current theme directory.
 */
function theme_url($url) {
  $mv = CMvcframe::Instance();
  return "{$mv->request->base_url}themes/{$mv->config['theme']['name']}/{$url}";
}


/**
 * Return the current url.
 */
function current_url() {
  return CMvcframe::Instance()->request->current_url;
}


/**
 * Render all views.
 */
function render_views() {
  return CMvcframe::Instance()->views->Render();
}