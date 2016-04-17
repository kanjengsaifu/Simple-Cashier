<?php

	class M_user_penjualan extends CI_Model
	{		
		function kode_resi()
		{
			$tanggal_sekarang = date('ymd');
			$kode_tgl = $tanggal_sekarang.$this->session->userdata('ses_user_id');
			
			$query = $this->db->query("SELECT MAX(no_rensi) as max_id FROM tb_transaksi WHERE no_rensi LIKE '$kode_tgl%'");
			$kode = "";
			if($query->num_rows()>0)
			{
				foreach ($query->result() as $kode) 
				{
					$next_urut  = ((int)substr($kode->max_id,7))+1;
					$next_kode  = $kode_tgl.sprintf("%04s", $next_urut);
				}
			}
			else
			{
				$next_kode = "0001";
				
			}
			return $next_kode;
			 
		}
		
		function id_otomatis(&$idnya)//membuat id otomatis
		{
			$cek=$this->db->query("SELECT id FROM tb_transaksi ORDER BY id DESC");
			 
			if ($cek->num_rows()==0)
			{				
				$id = 1;			
			}			
			else
			{
				$row = $cek->row();				
				$id =$row->id+1;
			
			}
			$idnya = $id;						
		}			
		
		
		function simpan($kode_resi,$total_bayar,$jumlah_bayar,$jumlah_kembali)
		{
			$txt_id = "";
			$this->id_otomatis($txt_id);
			
			$tanggal = date("Y-m-d h:m:s");
			
			$kasir = $this->session->userdata('ses_user_id');
			
			$simpan=$this->db->query("INSERT INTO tb_transaksi VALUES('$txt_id','$kode_resi','$tanggal','$total_bayar','$jumlah_bayar','$jumlah_kembali','$kasir')");
			return true;
		}

	}

/* end of file m_user_penjualan.php */
/* location: ./aplication/models/admin/barang/m_user_penjualan.php */