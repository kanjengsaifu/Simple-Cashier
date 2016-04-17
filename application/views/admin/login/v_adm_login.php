<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap -->
<link href="<?php echo base_url(); ?>asset/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>asset/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>asset/css/loading.css" rel="stylesheet" type="text/css">
<title>Login Admin</title>
</head>

<body>
<div id="body">	    
<div class="container">
	<div class="row" style="margin-top:11%; margin-bottom:11.8%;" >
		<div class="col-md-4 col-md-offset-4 col">
        	<div class="panel panel-default" style="border-radius:3; ">
  				<div class="panel-body">
   					 <div class="page-header" align="center">
                     	<h3>Login Admin</h3>
                     </div>
                     <form name="frm" method="post" role="form">
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
                     	<div class="form-group">
            				<label for="username">Username</label>
            				<div class="input-group">
           						<span class="input-group-addon"><span class="glyphicon glyphicon-user" ></span></span>
           						<input type="text" class="form-control" name="txt_nama" placeholder="Masukan username" 
                                value="<?php echo set_value('txt_nama') ?>" maxlength="30" autofocus/>
                            </div>
        				</div>
                       	<div class="form-group">
            				<label for="password">Password</label>
            				<div class="input-group">
           						<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
          				 		<input name="txt_password"  type="password" class="form-control" placeholder="Masukan password" 
                                value="<?php echo set_value('txt_password') ?>" maxlength="10" />
        					</div>
         				</div>
                        <hr/>
                        <input name="btn_login" type="submit" class="btn navbar-inverse btn-block" value="Login" style="color:#FFF;">
                     </form>
 				 </div>
			</div>
        </div>
	</div>
</div>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url(); ?>asset/js/jquery-1.11.3.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/bootstrap/js/bootstrap.min.js"></script>
</div>
</body>
</html>