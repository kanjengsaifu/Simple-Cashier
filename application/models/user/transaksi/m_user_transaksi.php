<?php

	class M_user_transaksi extends CI_Model
	{		
		//model untuk tampil data
		function tampil($perpage,$uri)		
		{			
			//ambil nilai 'txt_cari'
			$txt_cari_tahun =$this->input->post('txt_cari_tahun');
			$txt_cari_bulan =$this->input->post('txt_cari_bulan');
			//jika 'txt_cari' kosong						
			if (empty($txt_cari_tahun)||empty($txt_cari_bulan))
			{						
				$this->db->select("*");
				$this->db->from("tb_transaksi");
				$this->db->join('tb_user','tb_user.id=tb_transaksi.kasir','inner');							
				$this->db->order_by("tanggal_rensi","DESC");				
			}
			//jika 'txt_cari' tidak kosong
			else
			{				
				$this->db->select("*");
				$this->db->from("tb_transaksi");
				$this->db->join('tb_user','tb_user.id=tb_transaksi.kasir','inner');
				$this->db->where("(YEAR(tanggal_rensi)='$txt_cari_tahun') AND (Month(tanggal_rensi)='$txt_cari_bulan')");				
				$this->db->order_by("tanggal_rensi","DESC");
				
			}	
			$query = $this->db->get('',$perpage,$uri);
			return $query;												
		}
		
		
		

	}

/* end of file m_user_transaksi.php */
/* location: ./aplication/models/user/transaksi/m_user_transaksi.php */