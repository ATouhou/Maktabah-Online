<!-- VALIDATION SCRIPT-->
	<script language="JavaScript" src="<?php echo base_url('public')?>/validation/gen_validatorv4.js"
		type="text/javascript" xml:space="preserve">
	</script>

	<div class="row" style="background-color:#003399">
	<div class="col-lg-12" >
		
		<h1><font color="white">Approve Pengguna</font></h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<br />
<!-- /.row -->
<div class="row">
	<div class="col-lg-4">
		<div class="panel panel-primary">
			<form role="form" action = "<?php echo base_url('index.php/pages/approve_pengguna_bt/')?>" method="POST" name="myform" id="myform">
				<div class="panel-heading">			 
					<div class="row">					
						<div class="col-xs-12 text-left">                                    
							<div class="form-group">
								<label>Tanggal Daftar</label>
								<input class="form-control" name="tanggal" readOnly="true" value="<?php echo $tanggal_dft ?>">
							</div>
							<div class="form-group">
								<label>Nama</label>
								<input class="form-control" name="tanggal" readOnly="true" value="<?php echo $nama ?>">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input class="form-control" name="email_user" readOnly="true" value="<?php echo $email ?>">
							</div>
						</div>
					</div>
				</div>			
				<div class="panel-footer" >	
					<form>
					
					<div class="form-group">
							<label>Tindakan Persetujuan</label>
							 <font color = "red"><div id='myform_tindakan_approve_user_errorloc' class="error_strings"></div></font>
							<select class="form-control" name="tindakan_approve_user">
								<option selected disabled></option>
								<option value='1'>Disetujui </option>
								<option value='2'>Ditolak</option>
							</select>
					</div>
					
					
					<div class="form-group" >
							<label>Hak Akses</label>
							<font color = "red"><div id='myform_tindakan_approve_privilege_errorloc' class="error_strings"></div></font>
							<select class="form-control" name="tindakan_approve_privilege">
								<option selected disabled></option>
								<option value='2'>Siswa</option>
								<option value='1'>Pustakawan</option>								
							</select>
					</div>
					
					<div class="col-xs-30 text-left">   
					<button type="submit" class="btn btn-primary">Submit</button>
					</div>
					</form>
					<div class="clearfix"></div>
				</div>
			</form>
		</div>
	</div>               							
</div>

<!-- VALIDATION SCRIPT-->
	<script language="JavaScript" type="text/javascript"
			xml:space="preserve">//<![CDATA[
		//You should create the validator only after the definition of the HTML form
	  	    var frmvalidator  = new Validator("myform");
			frmvalidator.EnableOnPageErrorDisplay();
			frmvalidator.EnableMsgsTogether();

			frmvalidator.addValidation("tindakan_approve_user","req","ERROR: Tindakan Approve harus diisi!");			
			frmvalidator.addValidation("tindakan_approve_privilege","req","ERROR: Hak Akses harus diisi!");			

			
			
		//]]>
	</script>