<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap -->
<link href="<?php echo base_url(); ?>asset/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>asset/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>asset/bootstrap/css/simple.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>asset/css/loading.css" rel="stylesheet" type="text/css">
<title>Penjualan</title>
<script>
	function hapus_data(kode,url)
	{
		pesan = confirm ("Data "+kode+" Ingin Dihapus ?");
		if(pesan == true)
		{
			location.href=url;
			return true;
		}
		else
		{
			return false;
		}
	}
</script>
<script language="javascript">
    function hanyaAngka(e, decimal) {
    var key;
    var keychar;
     if (window.event) {
         key = window.event.keyCode;
     } else
     if (e) {
         key = e.which;
     } else return true;
   
    keychar = String.fromCharCode(key);
    if ((key==null) || (key==0) || (key==8) ||  (key==9) || (key==13) || (key==27) ) {
        return true;
    } else
    if ((("0123456789").indexOf(keychar) > -1)) {
        return true;
    } else
    if (decimal && (keychar == ".")) {
        return true;
    } else return false;
    }
</script> 

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
			<div class="col-md-12" style="margin-bottom:50px;">
				<div class="page-header font_ku body">
					<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Penjualan
				</div>
				<br/>
				<br/>
				<div class="clear"></div>
				<div class="col-md-6 col-md-offset-1 col">
				
                <form action="<?php echo site_url("c_user_penjualan"); ?>" name="penjualan" class="form-horizontal" method="post" enctype="multipart/form-data">
					<fieldset disabled>
					<div class="form-group">
						<label class="col-sm-3 control-label">Kode Transaksi</label>
						<div class="col-sm-7">
							<input name="#" type="text" class="form-control" id="kode_resi" value="<?php echo $kode_resi ?>">
						</div>
					</div>
					</fieldset>
                    <div class="clear"></div>
                    <form action="" name="barang" class="form-horizontal" method="post" enctype="multipart/form-data">
						<div class="col-md-6 col-md-offset-4 col">
							<?php
								if(!empty($error_1))
								{
							?>
							<br/>
							<div class="alert alert-warning" role="alert">
								<center>
									<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
									<span class="sr-only">Error:</span>
										 <?php echo $error_1; ?>
								</center>
							</div>
							<?php
								}
							?>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Barang</label>
							<div class="col-sm-7">
								<input name="txt_kode_barang" type="text" class="form-control"  id="kode_barang" value="<?php echo set_value("txt_kode_barang"); ?>" size="50" maxlength="50" placeholder="Isi Nama Barang" >
							</div>
							<div class="col-sm-1 ">
								<input type="button" class="btn btn-success" value="Cari" onClick="window.open('<?php echo site_url("c_user_barang"); ?>', 'winpopup', 'width=800,height=550,scrollbars=yes,status=no,resizable=no,screenx=600,screeny=50');"/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Jumlah</label>
							<div class="col-sm-7">
								<input name="txt_jumlah" type="text" class="form-control"  id="stok" value="<?php echo set_value("txt_jumlah"); ?>" onKeyPress="return hanyaAngka(event, false)" size="15" maxlength="10" placeholder="Jumlah" > 
							</div>
						</div>
						<div class="col-sm-7 col-sm-offset-3">
							<input type="submit" name="btn_beli" id="btn_ubah" class="btn btn-primary" value="Beli" /> 
						</div>
					
					<br>
					<br>
				</div>    
			</div>
					<?php 
						if($cart)
						{
					?>
					<div class="page-header font_ku body">
						<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Keranjang Belanja
					</div>
					<br/>
					<br/>
					<div class="col-md-11" style="margin-bottom:50px;">
						<div class="table-responsive body_table font_isi">  
							<table class="table table-bordered table-hover table-striped" width="100%" >
								<thead class="navbar-default" >
									<tr>
										<td width="6%" align="center"><b>No</b></td>
										<td width="22%" align="center"><b>Nama Barang</b></td>
										<td width="18%" align="center"><b>Harga Satuan</b></td>
                                        <td width="9%" align="center"><b>Diskon</b></td>
										<td width="8%" align="center"><b>Jumlah</b></td>
										<td width="19%" align="center"><b>Total Harga</b></td>
										<td width="18%"></td>
									</tr>
								</thead>
								<tbody>
								  <?php
									$no = 1;
									$sum = 0;
									foreach($cart as $item)
									{
								  ?>
								  
									<tr>
										<td id="isi_tb" align="center"><?php echo $no ?></td>
										<td id="isi_tb"><?php echo $item['name']; ?></td>
										<td id="isi_tb" align="center"><?php echo number_format($item['price'],0,'.','.'); ?></td>
                                  <?php foreach($this->cart->product_options($item['rowid']) as $option_name)
										{ 
										$diskon = ($item['price']*$option_name[0])/100;
										?>
                                        
                                        <td id="isi_tb" align="center"><?php echo $option_name[0] ?>%</td>
                                  <?php }?>
										<td id="isi_tb" align="center"><?php echo $item['qty']; ?></td>
										<td id="isi_tb" align="center"><?php $harga = (($item['price']-$diskon)*$item['qty']);
					echo number_format($harga,0,'.','.'); ?></td>
                    <?php $sum += $harga ?>
                    
										<td align="center"> 
										
										<button type="button" name="btn_hapus" class="btn-sm btn-link" style="color:#ec4445; text-decoration: none;" onClick="return hapus_data('<?php echo $item['name'] ?>','<?php echo site_url("c_user_penjualan/hapus/".$item['rowid']);?>');"><span class="glyphicon glyphicon-trash"></span> Hapus</button>
										</td>
									</tr>
								  
								  <?php
									$no++;	
									}
								  ?>
								</tbody>
							</table>
							
							<br>
							<h3><b>Total Bayar : Rp.<span style="color:#C30;"><?php echo number_format($sum,0,'.','.'); ?></span></b></h3>
                            <!--jumlah kembali otomatis --->
							<script type="text/javascript">
								 function startCalc(){interval=setInterval("calc()",1)}
								 function calc(){
									one=document.penjualan.txt_jumlah_bayar.value;
									two='<?php echo $sum ?>';
									document.penjualan.txt_jumlah_kembali.value=(one*1)-(two*1)}
								 function stopCalc(){clearInterval(interval)}
							</script>
							<br>
						 
							<div class="col-md-10">
								<form name="penjualan">
									<div class="form-group">
										<label class="col-sm-4 control-label" style="margin:0; padding:0;"><h4><b>Jumlah Bayar : </b></h4></label><div class="clear"></div>
										<label class="col-sm-1 control-label" style="margin:0; padding:0; text-align:right;"><h4><b>Rp.</b></h4></label>
										<div class="col-sm-4">
											<b><input name="txt_jumlah_bayar" type="text" class="form-control"  id="stok" value="<?php echo set_value("txt_jumlah_bayar"); ?>"  onKeyPress="return hanyaAngka(event, false)" size="15" maxlength="10" onFocus="startCalc();" onBlur="stopCalc();" placeholder="Jumlah Bayar" style="margin:3px 0 0 -10px;" > </b>
										</div>
									</div>
									<div class="clear"></div>
									<br>
									
									<div class="form-group">
										<label class="col-sm-4 control-label" style="margin:0; padding:0;"><h4><b>Jumlah Kembali :</b></h4></label><div class="clear"></div>
										<label class="col-sm-1 control-label" style="margin:0; padding:0; text-align:right;"><h4><b>Rp.</b></h4></label>
										<div class="col-sm-4">
											<b><input name="txt_jumlah_kembali" type="text" class="form-control"  id="stok" value="<?php echo set_value("txt_jumlah_kembali"); ?>" placeholder="Jumlah Kembali"  size="15" maxlength="10" style="margin:3px 0 0 -10px;" > </b>
										</div>
									</div>
									
                                    
								
							</div>
						</div>
					</div>
                    <div class="clear"></div>
                    <div class="col-sm-7">
							<input type="submit" name="btn_simpan" id="btn_simpan" class="btn btn-primary" value="Simpan" /> 
                            <button type="button" name="btn_ubah" class="btn btn-danger" onClick="location.href=('<?php echo site_url("c_user_penjualan/hapus_cart");?>');"><span class="glyphicon glyphicon-remove"></span> Batal</button>
                            <button type="button" name="btn_ubah" class="btn btn-success" onClick="location.href=('<?php echo site_url("c_user_penjualan/cetak");?>');"><span class="glyphicon glyphicon-print"></span> Cetak</button>
					</div>
                    
                    <br>
                    <br>
                    <br>
                    <br>
					<?php
						}
					?>	
				</form>
		</div>
    </div>
 
<?php $this->load->view('user/menu/footer');?>