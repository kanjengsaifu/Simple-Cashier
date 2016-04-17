<?php

	class M_user_barang extends CI_Model
	{		
		//model untuk tampil data
		function tampil($perpage,$uri)		
		{			
			//ambil nilai 'txt_cari'
			$txt_cari =$this->input->post('txt_cari');
			//jika 'txt_cari' kosong						
			if (empty($txt_cari))
			{						
				$this->db->select("*");
				$this->db->from("tb_barang");							
				$this->db->order_by("nama_barang","ASC");				
			}
			//jika 'txt_cari' tidak kosong
			else
			{				
				$this->db->select("*");
				$this->db->from("tb_barang");
				$this->db->where("nama_barang LIKE '%$txt_cari%' OR kode_barang LIKE '%$txt_cari%'");				
				$this->db->order_by("nama_barang","ASC");
				
			}	
			$query = $this->db->get('',$perpage,$uri);
			return $query;												
		}
		
		
	}

/* end of file m_user_barang.php */
/* location: ./aplication/models/user/barang/m_user_barang.php */