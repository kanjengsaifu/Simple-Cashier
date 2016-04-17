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
<title>Tampil Data Barang</title>

</head>

<body>
<div class="body">	
 
	
	<div class="container" style="border-bottom:solid 1px #cacaca;">
		<div class="row">
			<div class="col-md-10">
				<div class="page-header font_ku body">
					<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Daftar Barang
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
					<div class="col-md-5 col-md-offset-7" style="margin-bottom:1.5%;">
						<form action="<?php echo site_url('c_user_barang')?>" method="post" enctype="multipart/form-data">
							<div class="input-group">
							  <input type="text" name="txt_cari"  size="25" class="form-control" placeholder="Cari berdasarkan Nama atau Kode Barang">
							  <span class="input-group-btn">
								<button type="submit" class="btn btn-default" >Cari</button>
							  </span>
							</div><!-- /input-group -->
						</form>
					</div><!-- /.col-lg-6 -->
				</div>
				<div class="clear"></div>
				<div class="table-responsive body_table font_isi">  
                <?php
					if($tampil->result())
					{
                 ?>
					<table class="table table-bordered table-hover" width="100%" >
						<thead class="navbar-default" >
							<tr>
								<td width="3%" align="center"><b>No</b></td>
								<td width="20%" align="center"><b>Kode Barang</b></td>
								<td width="24%" align="center"><b>Nama Barang</b></td>
                                <td width="15%" align="center"><b>Harga</b></td>
								<td width="9%" align="center"><b>Diskon</b></td>
                                <td width="9%" align="center"><b>Stok</b></td>
								<td width="20%"></td>
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
								<td id="isi_tb"><?php echo $baris->kode_barang;?></td>
								<td id="isi_tb"><?php echo $baris->nama_barang;?></td>
                                <td id="isi_tb" align="center"><?php echo number_format($baris->harga,0,'.','.');?></td>
								<td id="isi_tb" align="center"><?php echo $baris->diskon;?>%</td>
                                <td id="isi_tb" align="center"><?php echo $baris->stok;?></td>
								<td align="center"> 
								
								<button type="button" name="btn_hapus" class="btn-sm btn-link" style="color:#ec4445; text-decoration: none;" onClick="window.opener.document.getElementById('kode_barang').value = '<?php echo $baris->kode_barang ?>'; window.close(); /*window.opener.document.location='refresh.html'*/;"><span class="glyphicon glyphicon-check"></span> pilih</button>
								</td>
							  </tr>
						  <?php
							$no++;	
							}
						  ?>
						</tbody>
					</table>
						
				<center>
					<?php
					if(set_value('txt_cari') == "")
					{			  
						echo $halaman;				              
					}
					else
					{
					?>
		  
				</center>
				<a href="<?php echo site_url("c_user_barang"); ?>">
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
                       <a href="<?php echo site_url("c_user_barang"); ?>">
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

<?php $this->load->view('admin/menu/footer');?>