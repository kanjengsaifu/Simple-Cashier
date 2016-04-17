<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class C_adm_user extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->helper(array('url','form'));
			$this->load->model('admin/user/m_adm_user','','TRUE');
			$this->load->library(array('session','user_agent','form_validation','pagination'));
			
		}
		
		//controller untuk menampilkan data
		function index($id=NULL)
		{
			//jika session terisi
			if($this->session->userdata('ses_sts_id')==true)
			{
				$txt_cari = $this->input->post('txt_cari');				
				$this->form_validation->set_rules('txt_cari');
				
				$query=$this->db->query("SELECT * FROM tb_user ORDER BY username");				
				$n = $query->num_rows();
				 
				//pengaturan pagination
				$config["base_url"]=base_url().'c_adm_user/index';				
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
				
				$data["tampil"]=$this->m_adm_user->tampil($config['per_page'],$id);
				$data["no"]=$id;
				
				if($this->form_validation->run()==TRUE)
				{
										
				}
				//menampilkan "view" tampil v_adm_user_vw
				$this->load->view('admin/user/v_adm_user_vw',$data);	
			}
			else
			{
				//menampilkan view login
				redirect('c_adm_login');
			}
		}
		
		//controller untuk menambah data
		function tambah()
		{
			//jika session terisi
			if($this->session->userdata('ses_sts_id')==true)
			{
				$txt_username = $this->input->post('txt_username');						
				$txt_password = $this->input->post('txt_password');
				$btn_simpan = $this->input->post('btn_simpan');						
				
				$pesan["error"] = "";
				
				if($btn_simpan)
				{
					$this->form_validation->set_rules('txt_username');
					$this->form_validation->set_rules('txt_password');
					
					if($this->form_validation->run()==TRUE)
					{
						if(empty($txt_username)||empty($txt_password))
						{
							$pesan["error"] = "Lengkapi Seluruh Data !";					
						}
						else
						{
							$simpan = $this->m_adm_user->simpan($txt_username,$txt_password);
							
							if($simpan)
								{
								$this->session->set_flashdata('message', '<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> Data berhasil ditambah</div>');
								//alihkan ke halaman display
								redirect('c_adm_user');
								}
								else
								{
									$pesan['error'] = "Data Sudah Pernah Tersimpan !";
								}
						}
					}
				}
				
				$this->load->view('admin/user/v_adm_user_en',$pesan,$txt_username,$txt_password);	
			}
			else
			{
				//menampilkan view login
				redirect('c_adm_login');
			}
		}
		
		//controller untuk mengedit data
		function detail()
		{
			//jika session terisi
			if($this->session->userdata('ses_sts_id')==true)
			{
				$idnya = $this->uri->segment(3);				
				$data["detail"]=$this->m_adm_user->detail($idnya);
				
				$txt_username = $this->input->post('txt_username');
				$txt_password = $this->input->post('txt_password');
				$btn_ubah = $this->input->post('btn_ubah');						
				
				$data["error"] = "";
				$data["act"] = "0";
				
				if($btn_ubah)
				{
					$data["act"] = "1";
					$this->form_validation->set_rules('txt_username');
					$this->form_validation->set_rules('txt_password');
					
					if($this->form_validation->run()==TRUE)
					{
						if(empty($txt_username)||empty($txt_password))
						{
							$data["error"] = "Lengkapi Seluruh Data !";					
						}
						else
						{
							//panggil model "ubah"
							$ubah = $this->m_adm_user->ubah($idnya,$txt_username,$txt_password);
							if($ubah)
							{
							$this->session->set_flashdata('message', '<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> Data berhasil diubah</div>');
							
							//alihkan ke halaman display
							redirect('c_adm_user');
							}
							else
							{
								$data['error'] = "Data Sudah Pernah Tersimpan !";
							}
						}
					}
				
				}
				
				$this->load->view('admin/user/v_adm_user_dt',$data,$txt_username,$txt_password);
			}
			else
			{
				//menampilkan view login
				redirect('c_adm_login');
			}		
			
		}
		
		//controller untuk menghapus data
		function hapus()
		{
			//jika session terisi
			if($this->session->userdata('ses_sts_id')==true)
			{
				$idnya = $this->uri->segment(3);				
				$this->m_adm_user->hapus($idnya);
				//pesan data sukses
				$this->session->set_flashdata('message', '<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> Data berhasil dihapus</div>');
				
				redirect('c_adm_user');
			}
			//jika session tidak terisi
			else
			{
				//menampilkan view login
				redirect('c_adm_login');
			}			
		}

	}


/* end of file c_adm_user.php */
/* location: ./aplication/controllers/c_adm_user.php */