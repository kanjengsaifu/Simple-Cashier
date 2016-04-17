<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class C_adm_home extends CI_Controller
	{
		function index()
		{
			$this->load->helper('form');
			$this->load->library(array('session'));
			
			if($this->session->userdata('ses_sts_id'))
			{
				$this->load->view('admin/home/v_adm_home');
			}
			else
			{
				redirect('c_adm_login');
			}
		}
		
	
	}





/* end of file c_adm_home.php */
/* location: ./aplication/controllers/c_adm_home.php */