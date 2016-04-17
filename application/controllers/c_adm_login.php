<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class C_adm_login extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();			
			$this->load->helper(array('url','form'));			
			$this->load->model('admin/login/m_adm_login','',TRUE);			
			$this->load->library(array('session','user_agent','form_validation','pagination'));
		}
		
		function index()
		{										
			$txt_nama = $this->input->post('txt_nama');
			$txt_password = $this->input->post('txt_password');
			$btn_login = $this->input->post('btn_login');						
			
			$pesan["error"] = "";									
			
			if($btn_login)
			{
				$this->form_validation->set_rules('txt_nama');
				$this->form_validation->set_rules('txt_password');
				
				if($this->form_validation->run()==TRUE)
				{
					if(empty($txt_nama)||empty($txt_password))
					{
						$pesan["error"] = "Lengkapi Seluruh Data !";					
					}
					else
					{
						$cek = $this->m_adm_login->cek($txt_nama,$txt_password);//untuk mengecek data username/password	
						if($cek == TRUE)
						{
							redirect('c_adm_home');	//jika di cek benar						
						}
						else
						{
							$pesan["error"] = "Username / Password Salah !";//jika di cek salah	
						}
					}
				}				
			}
			
			$this->load->view('admin/login/v_adm_login',$pesan,$txt_nama,$txt_password);							
			
		}		

	}







/* end of file c_adm_login.php */
/* location: ./aplication/controllers/c_adm_login.php */