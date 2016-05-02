<div class="row" style="background-color:#003399">
				<div class="col-lg-12" >
					
					<h1><font color="white">Ubah Password</font></h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<br />
<!-- /.row -->
<div class="row">
	<div class="col-lg-4">
		<div class="panel panel-primary">
			<form role="form" action = "<?php echo base_url('index.php/pages/update_password_bt')?>" method="POST" name="myform" id="myform">
				<div class="panel-heading">			 
					<div class="row">					
						<div class="col-xs-12 text-left">                                    
							<div class="form-group">
								<label>Tanggal Daftar</label>
								<input class="form-control" name="tanggal" readOnly="true" value="<?php echo $tanggal_dft ?>">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input class="form-control" name="email_user" readOnly="true" value="<?php echo $email ?>">
							</div>
							<div class="form-group">
								<label>Nama</label>
								<input class="form-control"  name="nama" readOnly="true" value="<?php echo $nama ?>"> 
							</div>							
							<div class="form-group">
								<label>Password Lama</label>								
								<font color = "red"><div id='myform_passwd_lama_errorloc' class="error_strings"></div></font>
								<input class="form-control" type="password" name="passwd_lama"  >
							</div>
							<div class="form-group">
								<label>Password Baru</label>
								<font color = "red"><div id='myform_passwd_baru_errorloc' class="error_strings"></div></font>
								<input class="form-control" type="password" name="passwd_baru"  >
							</div>
							<div class="form-group">
								<label>Konfirmasi Password Baru</label>
								<font color = "red"><div id='myform_confpassword_errorloc' class="error_strings"></div></font>
								<input class="form-control" type="password" name="confpassword">								
							</div>
							
						</div>
					</div>
				</div>			
				
				<div class="panel-footer" >	
					
					<div class="clearfix"> <br /></div>
					<div class="col-xs-30 text-left">   
					<button type="submit" class="btn btn-primary">Submit</button>
					</div>
					<div class="clearfix"></div>
				</div>					
			</div>
			</form>
		</div>
	</div>               							
</div>

<!-- VALIDATION SCRIPT-->
	<script language="JavaScript" src="<?php echo base_url('public')?>/validation/gen_validatorv4.js"
		type="text/javascript" xml:space="preserve">
	</script>
<!-- VALIDATION SCRIPT-->
	<script language="JavaScript" type="text/javascript"
			xml:space="preserve">//<![CDATA[
		//You should create the validator only after the definition of the HTML form
	  	    var frmvalidator  = new Validator("myform");
			frmvalidator.EnableOnPageErrorDisplay();
			frmvalidator.EnableMsgsTogether();

			
			frmvalidator.addValidation("passwd_lama","req","ERROR: Password lama harus diisi!");
			frmvalidator.addValidation("passwd_baru","req","ERROR: Password baru harus diisi!");
			
			
			frmvalidator.addValidation("confpassword","req","ERROR: Konfirmasi password harus diisi!");
			frmvalidator.addValidation("confpassword","eqelmnt=passwd_baru","Password baru dan konfirmasi password harus sama!");
			
			
			
		//]]>
	</script>