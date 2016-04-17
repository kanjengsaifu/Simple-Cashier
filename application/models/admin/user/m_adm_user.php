<?php

	class M_adm_user extends CI_Model
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
				$this->db->from("tb_user");							
				$this->db->order_by("username","ASC");				
			}
			//jika 'txt_cari' tidak kosong
			else
			{				
				$this->db->select("*");
				$this->db->from("tb_user");
				$this->db->where("username LIKE '%$txt_cari%'");				
				$this->db->order_by("username","ASC");
				
			}	
			$query = $this->db->get('',$perpage,$uri);
			return $query;												
		}
		
		function id_otomatis(&$idnya)//membuat id otomatis
		{
			$cek=$this->db->query("SELECT id FROM tb_user ORDER BY id DESC");
			 
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
		
		//model untuk tambah data
		function simpan($txt_username,$txt_password)
		{
			$cek = $this->db->query("SELECT username, password FROM tb_user WHERE username = '$txt_username' AND password = '$txt_password'");			
			
			if($cek->num_rows !=0)
			{
				return false;
			}
			else
			{
				$txt_id = "";
				$this->id_otomatis($txt_id);
				
				$simpan=$this->db->query("INSERT INTO tb_user VALUES('$txt_id','$txt_username','$txt_password')");
				return true;
			}
		}
		
		//model untuk menampilkan detail data
		function detail($idnya)
		{
			$detail = $this->db->query("SELECT * FROM tb_user WHERE md5(sha1(id)) = '$idnya'");
			$baris = $detail->row();
			
			return $baris;
		}
		
		//model untuk edit data
		function ubah($idnya,$txt_username,$txt_password)
		{
			
			$cek = $this->db->query("SELECT username, password FROM tb_user WHERE username = '$txt_username' AND password = '$txt_password' AND md5(sha1(id)) != '$idnya'");
			
			if($cek->num_rows != 0)
			{
				return false;
			}
			else
			{	
				$ubah=$this->db->query("UPDATE tb_user SET username = '$txt_username', password = '$txt_password' WHERE md5(sha1(id)) = '$idnya'");
				return true;	
			}
		}

		//model untuk hapus data
		function hapus($idnya)
		{
			
			$hapus = $this->db->query("DELETE FROM tb_user WHERE id = '$idnya' ");	
		}

	}

/* end of file m_adm_user.php */
/* location: ./aplication/models/admin/user/m_adm_user.php */