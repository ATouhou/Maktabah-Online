 <div class="row" style="background-color:#003399">
	<div class="col-lg-12" >
		
		<h1><font color="white">Reset Password Pengguna</font></h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<br />
<div class="row">
	<div class="col-lg-4">
		<div class="panel panel-primary">
			<form role="form" action = "<?php echo base_url('index.php/pages/reset_passsword_pengguna_bt/')?>" method="POST">
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
							</div><div class="form-group">
								<label>Privilege</label>
								<input class="form-control" name="privilege" readOnly="true" value="<?php 
									if($privilege == 1) $temp = "Admin";
									else if($privilege == 2) $temp = "Member";									
									echo $temp ?>">
							</div>
						</div>
					</div>
				</div>			
				<div class="panel-footer" >	
					<font color='red'>Mereset password artinya mengeset ulang password pengguna dengan password default yaitu <b>'pbsb-its' </b> </font> <br />
					<div class="clearfix"> <br /></div>
					<div class="col-xs-30 text-right">   
					<button type="submit" class="btn btn-primary">Reset</button>
					</div>
					<div class="clearfix"></div>
				</div>
			</form>
		</div>
	</div>               							
</div>