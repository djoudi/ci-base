<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
		$this->load->library('SimpleLoginSecure');
   }
  
   public function index()
   {
      $data = $this->_arrayValue('home_view', 'Home');
		$this->load->view('template', $data);
   }
   	
	public function admin()
	{
		// check if logged in
      if($this->session->userdata('logged_in')) 
      {
          // logged in
         $data = $this->_arrayValue('admin_view', 'Admin', 'private');
         $this->load->view('template', $data);
      }
	}
	
	public function login()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		
      $loginInfo = $this->simpleloginsecure->login($username, $password);
      
		if( $loginInfo )
		{
			$this->admin();
		}
		else
		{
			echo "You do not have access rights, Please login";
		}
	}
	
	public function logout()
	{
		$this->simpleloginsecure->logout();
      $this->index();
	}

	private function _arrayValue($view_page, $title, $access_modifier = 'public')
	{
		$data = array(
      		'main_content' => $access_modifier. '/' . $view_page,
      		'title'			=> $title
      	);
		return $data;
	}
}
