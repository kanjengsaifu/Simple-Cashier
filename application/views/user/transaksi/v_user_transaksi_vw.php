<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap -->
<link href="<?php echo base_url(); ?>asset/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>asset/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>asset/bootstrap/css/simple.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>asset/css/loading.css" rel="stylesheet" type="text/css">
<title>Tampil Data transaksi</title>

</head>

<body>
<div class="body">	
 <!-- Static navbar -->
    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo site_url ("c_user_home");?>">Kasir</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li ><a href="<?php echo site_url ("c_user_penjualan");?>">Penjualan</a></li>
            <li ><a href="<?php echo site_url ("c_user_transaksi");?>">Teransaksi</a></li>
            <li><a href="<?php echo site_url ("c_user_logout");?>"><span class="glyphicon glyphicon-off"></span> logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<br/>
    <br/>
	
	<div class="container" style="border-bottom:solid 1px #cacaca;">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header font_ku body">
					<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Daftar transaksi
				</div>
				<br/>
				<div class="col-md-4 col-md-offset-4 col">
					<center>
						<p class="text-success"><?php echo $this->session->flashdata('message');?></p>
					</center>
				</div>
				<div class="clear"></div>
				<br/>
				<div class="row">
					<div class="col-md-9" style="margin-bottom:1.5%;">
								<form action="<?php echo site_url('c_user_transaksi')?>" method="post">
                                     
                                    <div class="form-group">
                                    	<label class="col-sm-3 control-label"><h4>Pilih Berdasarkan:</h4></label>
                                        
                                        <div class="col-sm-3">
                                            <select name="txt_cari_tahun" class="form-control" >
                                                <?php $thn_skr = date('Y'); ?>
                                                <option value="0">- Tahun -</option>
                                                <?php
                                                $thn_skr = date('Y');
                                                for ($x=$thn_skr; $x>=2009; $x--) 
                                                {
                                                ?>
                                                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            
                                        </div>
                                        <div class="col-sm-3">
                                            <select name="txt_cari_bulan" class="form-control" >
                                                <option selected="selected">- Bulan -</option>
                                                <?php
                                                $bln=array(1=>"Januari","Februari","Maret","April","Mei","Juni","July","Agustus","September","Oktober","November","Desember");
                                                for($bulan=1; $bulan<=12; $bulan++)
												{
                                                ?>
                                               	 <option value="<?php echo $bulan ?>"><?php echo $bln[$bulan] ?></option>
                                                <?php
												}
												?>
                                            </select>
                                        </div>
                                      	 <div class="col-sm-2"> 
                                         	<button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Filter</button>
                                         </div>
                                    </div>
                                    <br/>
                                    <br/>
                                    <br/>
                                 
                            	</form>
                              </div>
				</div>
				<div class="clear"></div>
				<div class="table-responsive body_table font_isi">  
                <?php
					if($tampil->result())
					{
                 ?>
					<table class="table table-bordered table-hover table-striped" width="100%" >
						<thead class="navbar-default" >
							<tr>
								<td width="5%" align="center"><b>No</b></td>
								<td width="18%" align="center"><b>No Resi</b></td>
								<td width="18%" align="center"><b>Tanggal</b></td>
                                <td width="15%" align="center"><b>Total</b></td>
								<td width="15%" align="center"><b>Jumlah Bayar</b></td>
                                <td width="15%" align="center"><b>Jumlah Kembali</b></td>
								<td width="14%" align="center"><b>Kasir</b></td>
							</tr>
						</thead>
						<tbody>
						  <?php
							$no = $no+1;
							foreach($tampil->result() as $baris)
							{
						  ?>
							 <tr>
								<td id="isi_tb" align="center"><?php echo $no; ?></td>
								<td id="isi_tb" align="center"><?php echo $baris->no_rensi;?></td>
								<td id="isi_tb" align="center"><?php echo $baris->tanggal_rensi;?></td>
                                <td id="isi_tb" align="center"><?php echo number_format($baris->total,0,'.','.');?></td>
								<td id="isi_tb" align="center"><?php echo number_format($baris->jumlah_bayar,0,'.','.');?></td>
                                <td id="isi_tb" align="center"><?php echo number_format($baris->jumlah_kembali,0,'.','.');?></td>
								<td id="isi_tb" align="center"><?php echo $baris->username;?></td>
							  </tr>
						  <?php
							$no++;	
							}
						  ?>
						</tbody>
					</table>
						
				<center>
					<?php
					if(set_value('txt_cari_tahun') == "" || set_value('txt_cari') == "")
					{			  
						echo $halaman;				              
					}
					else
					{
					?>
		  
				</center>
				<a href="<?php echo site_url("c_user_transaksi"); ?>">
				<span class="glyphicon glyphicon-list-alt"></span> Tampilkan Seluruh Data
				  </a>
                  
				  <?php
					}
				  ?>
                   <!-- tutup if($tampil->result()) -->
						<?php }
							else
							{	
						?>
                       <br />
                       <center>
                       <h2><span class="glyphicon glyphicon-floppy-remove"></span> Data Tidak Ditemukan</h2>
                       </center>
                       <br />
                       <br />
                       <a href="<?php echo site_url("c_user_transaksi"); ?>">
                       <span class="glyphicon glyphicon-list-alt"></span> Tampilkan Seluruh Data
                       </a>
                        <?php }
						?>
				  <br/>
				  <br/>
				  <br/>
                  </div>
			</div>
		</div>
	</div>

<?php $this->load->view('user/menu/footer');?>