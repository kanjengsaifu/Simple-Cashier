<?php
	class M_user_login extends CI_Model
	{				
				
		function cek($txt_nama,$txt_password)
		{
			
			$cek = $this->db->query("SELECT * FROM tb_user WHERE username = '$txt_nama' AND password = '$txt_password'");			
			
			if($cek->num_rows ==0)
			{
				return false;
			}			
			else
			{			
				$row = $cek->row();
				$id = $row->id;										
				
				$this->session->set_userdata('ses_user_id',$id);		
				$this->session->set_userdata('ses_user_nama',$txt_nama);						
				return true;
			}						
		}				
	}




/* end of file m_adm_login.php */
/* location: ./aplication/models/admin/login/m_adm_login.php */