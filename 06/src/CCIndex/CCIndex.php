<?php
/**
 * Standard controller layout.
 * 
 * @package MvcframeCore
 */
class CCIndex implements IController {

  /**
    * Implementing interface IController. All controllers must have an index action.
   */
  public function Index() {  
    global $mv;
    $mv->data['title'] = "The Index Controller";
    $mv->data['main'] = "<h1>The Index Controller</h1>";
  }

}  