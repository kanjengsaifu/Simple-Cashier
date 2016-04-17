<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class C_user_transaksi extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->helper(array('url','form'));
			$this->load->model('user/transaksi/m_user_transaksi','','TRUE');
			$this->load->library(array('session','user_agent','form_validation','pagination'));
			
		}
		
		//controller untuk menampilkan data
		function index($id=NULL)
		{
			//jika session terisi
			if($this->session->userdata('ses_user_id')==true)
			{
				$txt_cari_tahun = $this->input->post('txt_cari_tahun');
				$txt_cari_bulan = $this->input->post('txt_cari_bulan');					
				$this->form_validation->set_rules('txt_cari_tahun');
				$this->form_validation->set_rules('txt_cari_bulan');
				
				$query=$this->db->query("SELECT * FROM tb_transaksi ORDER BY tanggal_rensi DESC");				
				$n = $query->num_rows();
				 
				//pengaturan pagination
				$config["base_url"]=base_url().'c_user_transaksi/index';				
				$config["per_page"]=5;
				$config["total_rows"]=$n;
				$config['full_tag_open'] = "<ul class='pagination pagination-sm' style='margin-top:0px;'>";
				$config['full_tag_close'] ="</ul>";
				$config['num_tag_open'] = '<li>';
				$config['num_tag_close'] = '</li>';
				$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
				$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
				$config['next_tag_open'] = "<li>";
				$config['next_tagl_close'] = "</li>";
				$config['prev_tag_open'] = "<li>";
				$config['prev_tagl_close'] = "</li>";
				$config['first_tag_open'] = "<li>";
				$config['first_tagl_close'] = "</li>";
				$config['last_tag_open'] = "<li>";
				$config['last_tagl_close'] = "</li>";
				
				$this->pagination->initialize($config);
				$data['halaman'] = $this->pagination->create_links();//untuk memunculkan pagination di view
				
				$data["tampil"]=$this->m_user_transaksi->tampil($config['per_page'],$id);
				$data["no"]=$id;
				
				if($this->form_validation->run()==TRUE)
				{
										
				}
				//menampilkan "view" tampil v_user_transaksi_vw
				$this->load->view('user/transaksi/v_user_transaksi_vw',$data);	
			}
			else
			{
				//menampilkan view login
				redirect('c_user_login');
			}
		}
		
	}


/* end of file c_user_transaksi.php */
/* location: ./aplication/controllers/c_user_transaksi.php */