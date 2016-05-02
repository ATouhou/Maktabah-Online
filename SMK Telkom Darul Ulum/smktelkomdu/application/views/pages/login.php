<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Maktabah Online</title>
	
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url("public/template")?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url("public/template")?>/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url("public/template")?>/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url("public/template")?>/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- VALIDATION SCRIPT-->
	<script language="JavaScript" src="<?php echo base_url('public')?>/validation/gen_validatorv4.js"
		type="text/javascript" xml:space="preserve">
	</script>

</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading" align="center">
						<a href="<?php echo base_url()?>"> 
							<img href="#" height = "130px" width="190px" src="<?php echo base_url('public/img/logo_sipos.png')?>">
						</a>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="<?php echo base_url("index.php/pages/login_action")?>" method="post" name="myform" id="myform">
                            <fieldset align="center">
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
								<font color = "red"><div id='myform_email_errorloc' class="error_strings"></div></font>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="passwd"  value="" type="password" autofocus>
                                </div>
								<font color = "red"><div id='myform_passwd_errorloc' class="error_strings"></div></font>
								
								
								<button type="submit"  class="btn btn-primary">L O G I N</button>  
                            </fieldset>
                        </form>
						<br />												
                        
						
						<table  align="center">
						<tr>
							<td>
								<h3 class="panel-title" ><a href="<?php echo base_url()?>" class="alert-link" align="center"><font color="#227594">Kembali</font></a></h3>                    
							</td>
							<td width="200px" />
							<td>
								<h3 class="panel-title" ><a href="<?php echo base_url("index.php/pages/register")?>" class="alert-link" align="center"><font color="#227594">Register</font></a></h3>                    
							</td>
						</tr>
						</table>
						
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery Version 1.11.0 -->
    <script src="<?php echo base_url("public/")?>js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url("public/")?>js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url("public/")?>js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url("public/")?>js/sb-admin-2.js"></script>
	
	<!-- VALIDATION SCRIPT-->
	<script language="JavaScript" type="text/javascript"
			xml:space="preserve">//<![CDATA[
		//You should create the validator only after the definition of the HTML form
	  	    var frmvalidator  = new Validator("myform");
			frmvalidator.EnableOnPageErrorDisplay();
			frmvalidator.EnableMsgsTogether();


			frmvalidator.addValidation("email","req","ERROR: Email harus diisi!");
			frmvalidator.addValidation("email","email","ERROR: Format email tidak benar!");
			
			frmvalidator.addValidation("passwd","req","ERROR: Password harus diisi!");
			
			
		//]]>
	</script>

</body>

</html>
