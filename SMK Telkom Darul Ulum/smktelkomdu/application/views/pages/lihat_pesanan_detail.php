<div class="row" style="background-color:#003399">
	<div class="col-lg-12" >
		
		<h1><font color="white">Ubah Status Pesanan</font></h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<br />
<div class="row">
	<div class="col-lg-4">
		<form role="form" action = "<?php echo base_url('index.php/pages/update_status_pesanan')?>" method="POST">
			<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-12 text-left">                                    						
								<div class="form-group">
									<label>ID Pemesanan</label>
									<input class="form-control" name="id_psn" readOnly="true" value="<?php echo $id_psn?>">
								</div>
								<div class="form-group">
									<label>Tanggal Pesan</label>
									<input class="form-control" name="tanggal" readOnly="true" value="<?php echo $tgl_upload?>">
								</div>
								<div class="form-group">
									<label>Pemesan</label>
									<input class="form-control" readOnly="true" value="<?php echo $email?>">
								</div>
								<div class="form-group">
									<label>Judul</label>
									<textarea class="form-control" rows="5" readOnly="true"><?php echo $judul?></textarea>
								</div>
								<div class="form-group">
									<label>Kategori</label>
									<input class="form-control" name="email_user" readOnly="true" value="<?php echo $kategori?>">
								</div>                                        
							</div>
						</div>
					</div>
				
				
					<div class="panel-footer" >	
					
					<div class="clearfix"> <br /></div>
					<div class="col-xs-30 text-right">   
					<button type="submit" class="btn btn-primary">Update Pesanan Menjadi Tersedia</button>
					</div>
					<div class="clearfix"></div>
					</div>
				</div>
		</div> 
	</form>	
</div>
<!-- /.row -->

