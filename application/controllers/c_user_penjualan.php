<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class C_user_penjualan extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->helper(array('url','form'));
			$this->load->model('user/penjualan/m_user_penjualan','','TRUE');
			$this->load->library(array('session','cart','user_agent','form_validation','pagination','fpdf'));
			
		}
		
		function index()
		{
			//jika session terisi
			if($this->session->userdata('ses_user_id'))
			{
				$data["kode_resi"]=$this->m_user_penjualan->kode_resi();
				
				
				$kode_barang = $this->input->post('txt_kode_barang');
				$jumlah = $this->input->post('txt_jumlah');
				$btn_beli = $this->input->post('btn_beli');	
			
				$data["error_1"] = "";
				
				$data['cart'] = $this->cart->contents();
				
				//untuk menyimpan pembelian barang ke library cart 
				if($btn_beli)
				{
					$this->form_validation->set_rules('txt_kode_barang');					
					$this->form_validation->set_rules('txt_jumlah');
					
					if($this->form_validation->run()==TRUE)
					{
						if(empty($kode_barang)||empty($jumlah))
						{
							$data['error_1'] = "Lengkapi Seluruh Data !";
						}
						else
						{
							
							
							$query=$this->db->query("SELECT * FROM tb_barang WHERE kode_barang = '$kode_barang' ORDER BY nama_barang");				
							$barang = $query;
							
							//tampung data yang akan 
							//dimasukan ke cart
							if($barang->num_rows() > 0)
							{
								foreach($barang->result() as $baris)
								{
									//$harga_disc = $baris->harga-($baris->harga*$baris->diskon/100);
									$data = array(
										'id'	=> $baris->kode_barang,
										'name'	=> $baris->nama_barang,
										'qty'	=> $jumlah,
										'price'	=> $baris->harga,
										'options' => array('diskon' => $baris->diskon)
									
									);
									
									$this->cart->insert($data);
									redirect('c_user_penjualan');
								}
							}
						}
					}
				}
				
				//untuk menyimpan ke data transaksi
				$kode_resi = $this->m_user_penjualan->kode_resi();
				$total_bayar = $this->cart->total();
				$jumlah_bayar = $this->input->post('txt_jumlah_bayar');
				$jumlah_kembali = $this->input->post('txt_jumlah_kembali');
				$btn_simpan = $this->input->post('btn_simpan');	
				$btn_simpan = $this->input->post('btn_simpan');	
				
				if($btn_simpan)
				{
					
					foreach($this->cart->contents() as $cart)
					{
						$qty = $cart['qty'];
						$id = $cart['id'];
						
						$ubah = $this->db->query("UPDATE tb_barang SET stok = (stok-('$qty')) WHERE kode_barang = '$id'");
					}
					
					$simpan = $this->m_user_penjualan->simpan($kode_resi,$total_bayar,$jumlah_bayar,$jumlah_kembali);
					
					if($simpan)
					{
						$this->cart->destroy();
						redirect('c_user_penjualan');
					}
				}
				
				
				
				$this->load->view('user/penjualan/v_user_penjualan',$data);
				
			}
			else
			{
				redirect('c_user_login');
			}
		}
		
		
		//untuk print out/cetak
		function cetak()
		{
			define('FPDF_FONTPATH',$this->config->item('fonts_path'));
			$data["kode_resi"]=$this->m_user_penjualan->kode_resi();
			$data['cart'] = $this->cart->contents();
			$data['total_item'] = $this->cart->total_items();
			$this->load->view('user/penjualan/v_user_penjualan_lp',$data);
			
		}
		
		//menghapus item dalam cart
		function hapus()
		{
			if($this->session->userdata('ses_user_id'))
			{
				$rowid = $this->uri->segment(3);
				$cart = $this->cart->contents();
				foreach($cart as $item)
				{
					$data = array(
						'rowid' => $rowid,
						'qty' => 0
					
					);
				}
				$this->cart->update($data);
				
				redirect('c_user_penjualan');
			}
			else
			{
				redirect('c_user_login');
			}
		}
		
		function hapus_cart() {
			if($this->session->userdata('ses_user_id'))
			{
				$this->cart->destroy();
				redirect('c_user_penjualan');
			}
			else
			{
				redirect('c_user_login');
			}
		}
		
		
	
	}





/* end of file c_user_penjualan.php */
/* location: ./aplication/controllers/c_user_penjualan.php */