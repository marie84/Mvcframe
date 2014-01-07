<?php
/**
* Holding a instance of CMvcframe to enable use of $this in subclasses.
*
* @package MvcframeCore
*/
class CObject {

   /**
    * Members
    */
   public $config;
   public $request;
   public $data;
   public $db;
   public $views;
   public $session;

   /**
    * Constructor
    */
   protected function __construct() {
    $mv = CMvcframe::Instance();
    $this->config   = &$mv->config;
    $this->request  = &$mv->request;
    $this->data     = &$mv->data;
    $this->db       = &$mv->db;
	$this->views    = &$mv->views;
	$this->session  = &$mv->session;
  }

/**
         * Redirect to another url and store the session
         */
        protected function RedirectTo($url) {
    $mv = CMvcframe::Instance();
    if(isset($mv->config['debug']['db-num-queries']) && $mv->config['debug']['db-num-queries'] && isset($mv->db)) {
      $this->session->SetFlash('database_numQueries', $this->db->GetNumQueries());
    }    
    if(isset($mv->config['debug']['db-queries']) && $mv->config['debug']['db-queries'] && isset($mv->db)) {
      $this->session->SetFlash('database_queries', $this->db->GetQueries());
    }    
    if(isset($mv->config['debug']['timer']) && $mv->config['debug']['timer']) {
            $this->session->SetFlash('timer', $mv->timer);
    }    
    $this->session->StoreInSession();
    header('Location: ' . $this->request->CreateUrl($url));
  }


}