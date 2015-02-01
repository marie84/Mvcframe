<?php
/**
 * Holding a instance of CLydia to enable use of $this in subclasses and provide some helpers.
 *
 * @package LydiaCore
 */
class CObject {

        /**
         * Members
         */
        protected $mv;
        protected $config;
        protected $request;
        protected $data;
        protected $db;
        protected $views;
        protected $session;
        protected $user;


        /**
         * Constructor, can be instantiated by sending in the $ly reference.
         */
        protected function __construct($mv=null) {
          if(!$mv) {
            $mv = CMvcframe::Instance();
          }
          $this->mv       = &$mv;
    $this->config   = &$mv->config;
    $this->request  = &$mv->request;
    $this->data     = &$mv->data;
    $this->db       = &$mv->db;
    $this->views    = &$mv->views;
    $this->session  = &$mv->session;
    $this->user     = &$mv->user;
        }


        /**
         * Wrapper for same method in CLydia. See there for documentation.
         */
        protected function RedirectTo($urlOrController=null, $method=null, $arguments=null) {
    $this->mv->RedirectTo($urlOrController, $method, $arguments);
  }


        /**
         * Wrapper for same method in CLydia. See there for documentation.
         */
        protected function RedirectToController($method=null, $arguments=null) {
    $this->mv->RedirectToController($method, $arguments);
  }


        /**
         * Wrapper for same method in CLydia. See there for documentation.
         */
        protected function RedirectToControllerMethod($controller=null, $method=null, $arguments=null) {
    $this->mv->RedirectToControllerMethod($controller, $method, $arguments);
  }


        /**
         * Wrapper for same method in CMvcframe. See there for documentation.
         */
  protected function AddMessage($type, $message, $alternative=null) {
    return $this->mv->AddMessage($type, $message, $alternative);
  }


        /**
         * Wrapper for same method in CLydia. See there for documentation.
         */
        protected function CreateUrl($urlOrController=null, $method=null, $arguments=null) {
    return $this->mv->CreateUrl($urlOrController, $method, $arguments);
  }


}
  