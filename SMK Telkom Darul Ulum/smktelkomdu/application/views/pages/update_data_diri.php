<div class="row" style="background-color:#003399">
				<div class="col-lg-12" >
					
					<h1><font color="white">Ubah Data Diri</font></h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<br />
<div class="row">
	<div class="col-lg-4">
		<div class="panel panel-primary">
			<form role="form" action = "<?php echo base_url('index.php/pages/update_data_diri_bt')?>" method="POST">
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
								<input class="form-control"  name="nama" value="<?php echo $nama ?>">
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