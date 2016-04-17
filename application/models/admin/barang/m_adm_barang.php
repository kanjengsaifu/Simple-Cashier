<?php

	class M_adm_barang extends CI_Model
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
		
		
		//model untuk tambah data
		function simpan($txt_nama_barang,$txt_harga,$txt_diskon,$txt_stok)
		{
			$cek = $this->db->query("SELECT nama_barang, harga FROM tb_barang WHERE nama_barang = '$txt_nama_barang' AND harga = '$txt_harga'");			
			
			if($cek->num_rows !=0)
			{
				return false;
			}
			else
			{
				
				//mengambil 3 karakter awal dari nama barang
				$awal = substr($txt_nama_barang,0,3);
				//merubah menjadi huruf kapital
				$barang = strtoupper($awal);
				//membuat nomer urut otomatis
				$query = $this->db->query("SELECT MAX(kode_barang) as max_id FROM tb_barang WHERE kode_barang LIKE '$barang%'");
				$kode = "";
				if($query->num_rows()>0)
				{
					foreach ($query->result() as $kode) 
					{
						$next_urut  = ((int)substr($kode->max_id,4))+1;
						$next_kode  = $barang.sprintf("%04s", $next_urut);
					}
				}
				else
				{
					$next_kode = "0001";
				}
				
				
				$kode_barang = $next_kode;
				
				$simpan=$this->db->query("INSERT INTO tb_barang VALUES('$kode_barang','$txt_nama_barang','$txt_harga','$txt_diskon','$txt_stok')");
				return true;
				
				
				
			}
			
		}
		
		//model untuk menampilkan detail data
		function detail($idnya)
		{
			$detail = $this->db->query("SELECT * FROM tb_barang WHERE md5(sha1(kode_barang)) = '$idnya'");
			$baris = $detail->row();
			
			return $baris;
		}
		
		//model untuk edit data
		function ubah($idnya,$txt_harga,$txt_diskon,$txt_stok)
		{
			
			$cek = $this->db->query("SELECT kode_barang, nama_barang, harga FROM tb_barang WHERE nama_barang = 'nama_barang' AND kode_barang = 'kode_barang' AND harga = '$txt_harga' AND md5(sha1(kode_barang)) != '$idnya'");
			
			if($cek->num_rows != 0)
			{
				return false;
			}
			else
			{	
				
				$ubah=$this->db->query("UPDATE tb_barang SET harga = '$txt_harga', diskon = '$txt_diskon', stok = '$txt_stok' WHERE md5(sha1(kode_barang)) = '$idnya'");
				return true;	
			}
		}

		//model untuk hapus data
		function hapus($idnya)
		{
			
			$hapus = $this->db->query("DELETE FROM tb_barang WHERE kode_barang = '$idnya' ");	
		}

	}

/* end of file m_adm_barang.php */
/* location: ./aplication/models/admin/barang/m_adm_barang.php */