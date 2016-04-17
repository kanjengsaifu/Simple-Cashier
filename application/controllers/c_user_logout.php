<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class C_user_logout extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();			
			$this->load->helper(array('url','form'));						
			$this->load->library(array('session','user_agent','form_validation','pagination'));
		}				
		
		function index()
		{										
			$this->session->unset_userdata('ses_user_id');
			$this->session->unset_userdata('ses_user_nama');
		
			//$this->session->sess_destroy();
			redirect('c_user_login');							
		}				
		
	
	}





/* end of file c_user_logout.php */
/* location: ./aplication/controllers/c_user_logout.php */