<?php

$this->load->library('fpdf');
$this->fpdf->FPDF("P","cm","A4");
// kita set marginnya dimulai dari kiri, atas, kanan. jika tidak diset, defaultnya 1 cm  
// kita set marginnya dimulai dari kiri, atas, kanan. jika tidak diset, defaultnya 1 cm
$this->fpdf->SetMargins(1,1,1);
/* AliasNbPages() merupakan fungsi untuk menampilkan total halaman
di footer, nanti kita akan membuat page number dengan format : number page / total page
*/
$this->fpdf->AliasNbPages();

// AddPage merupakan fungsi untuk membuat halaman baru
$this->fpdf->AddPage();

// Setting Font : String Family, String Style, Font size
$this->fpdf->SetFont('Times','B',14);

/* Kita akan membuat header dari halaman pdf yang kita buat
————– Header Halaman dimulai dari baris ini —————————–
*/
$this->fpdf->Cell(9.5, 0.5,'PT.XXXXXXX XXXX');

// fungsi Ln untuk membuat baris baru
$this->fpdf->Ln();

/* Setting ulang Font : String Family, String Style, Font size
kenapa disetting ulang ???
jika tidak disetting ulang, ukuran font akan mengikuti settingan sebelumnya.
tetapi karena kita menginginkan settingan untuk penulisan alamatnya berbeda,
maka kita harus mensetting ulang Font nya.
jika diatas settingannya : helvetica, 'B', '12'
khusus untuk penulisan alamat, kita setting : helvetica, ", 10
yang artinya string stylenya normal / tidak Bold dan ukurannya 10
*/
$this->fpdf->SetFont('helvetica','',10);
$this->fpdf->Cell(10,0.5,'Jl.XXX NO.XXX TLP.XXX',0,0,'L');



/* Fungsi Line untuk membuat garis */
$this->fpdf->Line(1,2.5,20,2.5);


/* ————– Header Halaman selesai ————————————————*/

$this->fpdf->Ln();
$this->fpdf->Ln();
$this->fpdf->Ln();
$this->fpdf->SetFont('helvetica','',10);
$this->fpdf->Cell(0,0.5,''.date('d-m-Y H:i').'');
$this->fpdf->Ln();
$this->fpdf->Cell(0,0.5,''.$this->session->userdata('ses_user_nama').'',0,0,'L');

$this->fpdf->Line(1,4.5,20,4.5);

/* bagian isi */

$this->fpdf->Ln();

$sum = 0;
foreach($cart as $item)
{							
$this->fpdf->Ln();
$this->fpdf->Ln();
$this->fpdf->Ln();
$this->fpdf->SetFont('helvetica','',10);
$this->fpdf->Cell(0,0.5,$item['name']);
$this->fpdf->Ln();
	foreach($this->cart->product_options($item['rowid']) as $option_name)
	{
		$diskon = ($item['price']*$option_name[0])/100;
		$this->fpdf->Cell(15,0.5,$item['qty'].' '.'x'.' '.number_format($item['price'],0,'.','.').' '.'('.$option_name[0].'%'.')',0,0,'L');
	}
$harga = (($item['price']-$diskon)*$item['qty']);
$this->fpdf->Cell(5,0.5,number_format($harga,0,'.','.'),0,0,'L');
$sum += $harga;
}



$this->fpdf->Line(1,22,20,22);

/* setting posisi footer 3 cm dari bawah */


$this->fpdf->SetY(-7);

/* setting font untuk footer */

$this->fpdf->Ln();
$this->fpdf->SetFont('helvetica','',10);
$this->fpdf->Cell(12,0.5,$total_item.' '.'items',0,0,'L');
$this->fpdf->Cell(3,0.5,'Total',0,0,'L');
$this->fpdf->Cell(5,0.5,number_format($sum,0,'.','.'),0,0,'L');
$this->fpdf->Ln();
$this->fpdf->Cell(12,0.5,'',0,0,'L');
$this->fpdf->Cell(3,0.5,'Bayar',0,0,'L');
$this->fpdf->Cell(5,0.5,'',0,0,'L');
$this->fpdf->Ln();
$this->fpdf->Cell(12,0.5,'',0,0,'L');
$this->fpdf->Cell(3,0.5,'Kembali',0,0,'L');
$this->fpdf->Cell(5,0.5,'',0,1,'L');
$this->fpdf->Ln();
/* setting cell untuk waktu pencetakan */
$this->fpdf->Cell(19,2,'Terimakasih atas kunjungan anda',0,1,'C');


/* generate pdf jika semua konstruktor, data yang akan ditampilkan, dll sudah selesai */
$this->fpdf->Output($kode_resi.".pdf","I");



























/* end of file v_user_penjualan_lp.php */
/* location: ./aplication/views/user/penjualan/v_user_penjualan_lp.php */