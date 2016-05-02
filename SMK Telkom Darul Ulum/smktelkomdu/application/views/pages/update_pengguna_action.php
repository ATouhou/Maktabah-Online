 <div class="row" style="background-color:#003399">
	<div class="col-lg-12" >
		
		<h1><font color="white">Ubah Hak Akses Pengguna</font></h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<br />
<div class="row">
	<div class="col-lg-4">
		<div class="panel panel-primary">
			<form role="form" action = "<?php echo base_url('index.php/pages/update_pengguna_bt/')?>" method="POST">
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
							<label>Ubah Hak Akses</label>
							<select class="form-control" name="tindakan_approve_privilege">
								<?php 									
									if($privilege == 1)
										$optionSelectedPrivilege = "Admin";
									else if($privilege == 2)
										$optionSelectedPrivilege = "User Biasa";
								?>
								<option selected="true" style="display:none;"> <?php  echo $optionSelectedPrivilege?> </option>    
								<option value='2'>User Biasa</option>
								<option value='1'>Admin</option>								
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