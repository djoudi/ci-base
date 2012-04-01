<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
   }
  
   public function index()
   {
      if ($this->session->userdata('logged_in'))
      {
         $data = $this->_arrayValue('dashboard_view', 'Dashboard', 'private');
         $this->load->view('template', $data);
      }
      else
      {
         echo 'sorry access denied';
      }
   }
   
   private function _arrayValue($view_page, $title, $access_modifier = 'public')
   {
      $data = array(
            'main_content' => $access_modifier. '/' . $view_page,
            'title'        => $title
         );
      return $data;
   }
}
