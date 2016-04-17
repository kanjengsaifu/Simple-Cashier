<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class C_user_home extends CI_Controller
	{
		function index()
		{
			$this->load->helper('form');
			$this->load->library(array('session'));
			
			if($this->session->userdata('ses_user_id'))
			{
				$this->load->view('user/home/v_user_home');
			}
			else
			{
				redirect('c_user_login');
			}
		}
		
	
	}





/* end of file c_user_home.php */
/* location: ./aplication/controllers/c_user_home.php */