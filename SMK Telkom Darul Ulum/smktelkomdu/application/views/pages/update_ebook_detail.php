<div class="row" style="background-color:#003399">
	<div class="col-lg-12" >
		
		<h1><font color="white">Ubah Ebook</font></h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<br />
<div class="row">
	<div class="col-lg-7 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">					
					<div class="col-xs-9 text-left">                                    						
						Silahkan Update Data Ebook!
					</div>
				</div>
			</div>
			
				<div class="panel-footer">					
					<div class="panel-footer">		
						<form action="<?php echo base_url('index.php/pages/update_ebook_data')?>" method="post">
						<div class="form-group">
							<label>ID Ebook</label>
							<input class="form-control" name="id_ebook"  value="<?php echo $id_ebook?>" readOnly="true">					
						</div>
						<div class="form-group">
							<label>Kategori *</label>
							
							<select class="form-control" name="kategori">				
								<option selected="true" style="display:none;"><?php echo $kategori?></option>    
								<option>Ilmu pengetahuan umum</option>
								<option>Filsafat dan Psikologi</option>
								<option>Agama</option>
								<option>Ilmu sosial</option>
								<option>Bahasa</option>
								<option>Sains</option>
								<option>Teknologi</option>
								<option>Seni dan rekreasi</option>
								<option>Sastra</option>
								<option>Sejarah dan geografi</option>								
							</select>			
						</div>						
						<div class="form-group">
							<label>Judul *</label>							
							<textarea class="form-control" name="judul" rows="5" ><?php echo $judul?></textarea>							
						</div>
						<div class="form-group">
							<label>Pengarang *</label>
							<input class="form-control" name="pengarang"  value="<?php echo $pengarang?>">					
						</div>
						<div class="form-group">
							<label>Penerbit *</label>
							<input class="form-control" name="penerbit"  value="<?php echo $penerbit?>">						
						</div>
						<div class="form-group">
							<label>Tahun *</label>
							<?php	
								echo "<select class=\"form-control\" name=\"tahun\">";							
								for($i=2015 ; $i>1930 ; $i--)
								{
									
										echo "<option>$i</option>";
								
								}							
									echo "</select>";
							?>
						</div>
						<div class="form-group">
							<label>Sinopsis *</label> 
							<label><i><font size="1px"  color="brown">Panjang maksimal 500 digit</font></i></label>
							<textarea class="form-control"  name="sinopsis" rows="9" ><?php echo $sinopsis?></textarea>
						</div>
					<button type="submit" class="btn btn-primary">Update</button>
					<div class="clearfix"></div>
				</div>		
		</div>
	</div>               							
</div>