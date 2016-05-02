
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
    <link href="<?php echo base_url('public/template')?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url('public/template')?>/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('public/template')?>/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('public/template')?>/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	
	<!-- VALIDATION SCRIPT-->
	<script language="JavaScript" src="<?php echo base_url('public')?>/validation/gen_validatorv4.js"
		type="text/javascript" xml:space="preserve">
	</script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        
        <div id="page-wrapper">
            <div class="row" style="background-color:#003399">
				<div class="col-lg-12" >
					
					<h1><font color="white">Register</font></h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<br />
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading" >
                            Silahkan melengkapi form pendaftaran!
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="<?php echo base_url('index.php/pages')?>/registrasi_action" method="post" name="myform" id="myform">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <font color = "red"><div id='myform_Email_errorloc' class="error_strings"></div></font>
											<input class="form-control" name="Email" >
                                    
                                        </div>
										<div class="form-group">
                                            <label>Nama</label>
											<font color = "red"><div id='myform_Name_errorloc' class="error_strings"></div></font>
                                            <input class="form-control" name="Name" type="text">
                                    
                                        </div>
										<div class="form-group">
                                            <label>Password</label>
                                            <font color = "red"><div id='myform_Password_errorloc' class="error_strings"></div></font>
											<input class="form-control" type="password" name="Password">
                                    
                                        </div>
										<div class="form-group">
                                            <label>Konfirmasi Password</label>
                                            <font color = "red"><div id='myform_confpassword_errorloc' class="error_strings"></div></font>
											<input class="form-control" type="password" name="confpassword">
                                    
                                        </div>
										
                                        <input type="submit" class="btn btn-primary"></button>  
                                                                           
                                    </form>
					<br />
					<a href="<?php echo base_url()?>">Kembali</a>   				
                                </div>
                            <!-- END FORM -->    
							<div class="col-lg-6">
                                   
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
							
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="http://mauwhbu.maktabah-online.com/public/template/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="http://mauwhbu.maktabah-online.com/public/template/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="http://mauwhbu.maktabah-online.com/public/template/js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="http://mauwhbu.maktabah-online.com/public/template/js/sb-admin-2.js"></script>
	
	<!-- VALIDATION SCRIPT-->
	<script language="JavaScript" type="text/javascript"
			xml:space="preserve">//<![CDATA[
		//You should create the validator only after the definition of the HTML form
	  	    var frmvalidator  = new Validator("myform");
			frmvalidator.EnableOnPageErrorDisplay();
			frmvalidator.EnableMsgsTogether();

			frmvalidator.addValidation("Name","req","ERROR: Nama harus diisi!");			

			frmvalidator.addValidation("Email","maxlen=50");
			frmvalidator.addValidation("Email","req","ERROR: Email harus diisi!");
			frmvalidator.addValidation("Email","email","ERROR: Format email tidak benar!");
			
			frmvalidator.addValidation("Password","req","ERROR: Password harus diisi!");
			
			frmvalidator.addValidation("confpassword","req","ERROR: Konfirmasi password harus diisi!");
			frmvalidator.addValidation("confpassword","eqelmnt=Password","Password dan konfirmasi password harus sama!");
			
			
		//]]>
	</script>
	
	

</body>

</html>