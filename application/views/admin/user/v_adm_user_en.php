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
<title>Tambah User</title>

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
          <a class="navbar-brand" href="<?php echo site_url ("c_adm_home");?>">Kasir</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
         	<li class="active" ><a href="<?php echo site_url ("c_adm_user");?>" >User</a></li>
            <li ><a href="<?php echo site_url ("c_adm_barang");?>">Barang</a></li>
            <li ><a href="<?php echo site_url ("c_adm_transaksi");?>">Teransaksi</a></li>
            <li><a href="<?php echo site_url ("c_adm_logout");?>"><span class="glyphicon glyphicon-off"></span> logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<br/>
    <br/>
	
	<div class="container" style="border-bottom:solid 1px #cacaca;">
		<div class="row">
			<div class="col-md-2">
				<div class="panel panel-default" style="border-radius:3; ">
					<div class="menu_head navbar-inverse"><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span> Menu</div>
					<div id="tambah">
						<button type="button" name="btn_tambah" id="btn_tambah" class="btn btn-link" style="color:#158843; text-decoration: none;" onClick="location.href='<?php echo site_url("c_adm_user");?>'" /><span class="glyphicon glyphicon-list-alt"></span> Lihat Data</button>
					</div>
					<div id="tambah">
						<button type="button" name="btn_tambah" id="btn_tambah" class="btn btn-link" style="color:#158843; text-decoration: none;" onClick="location.href='<?php echo site_url("c_adm_user/tambah");?>'" /><span class="glyphicon glyphicon-plus-sign"></span> Tambah Data</button>
					</div>
					<br/>
				</div>
			</div>
			<div class="col-md-10" style="margin-bottom:50px;">
				<div class="page-header font_ku body">
					<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Entry User
				</div>
				<br/>
				<br/>
				<div class="col-md-4 col-md-offset-4 col">
						<?php
							if(!empty($error))
							{
						?>
						<div class="alert alert-warning" role="alert">
							<center>
								<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
								<span class="sr-only">Error:</span>
									 <?php echo $error; ?>
							</center>
						</div>
						<?php
							}
						?>
				</div>
				<div class="clear"></div>
				<div class="col-md-6 col-md-offset-2 col">
					<form action="<?php echo site_url("c_adm_user/tambah"); ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
						 
						<div class="form-group">
							<label class="col-sm-4 control-label">Userrname</label>
							<div class="col-sm-8">
								<input name="txt_username" type="text" class="form-control"  id="userrname" value="<?php echo set_value("txt_username"); ?>" size="25" maxlength="50" placeholder="Isi Username" >
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-4 control-label">Password</label>
							<div class="col-sm-8">
								<input name="txt_password" type="text" class="form-control"  id="password" value="<?php echo set_value("txt_password"); ?>" size="25" maxlength="50" placeholder="Isi Password" > 
							</div>
						</div>
						<br/>
						<div class="col-sm-8 col-sm-offset-4">
								<input type="submit" name="btn_simpan" id="btn_simpan" class="btn btn-success" value="Simpan" />
								<input type="button" name="submit" id="submit" class="btn btn-default" value="Batal" onClick="location.href='<?php echo site_url("c_adm_user");?>'" />
						</div>
					</form>
				</div>		
			</div>
		</div>
	</div>

<?php $this->load->view('admin/menu/footer');?>