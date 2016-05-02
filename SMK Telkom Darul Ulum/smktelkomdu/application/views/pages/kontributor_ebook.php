<!-- VALIDATION SCRIPT-->
	<script language="JavaScript" src="<?php echo base_url('public')?>/validation/gen_validatorv4.js"
		type="text/javascript" xml:space="preserve">
	</script>
	
<div class="row" style="background-color:#003399">
	<div class="col-lg-12" >
		
		<h1><font color="white">Kontributor Ebook</font></h1>
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
						Silahkan isi data Ebook!
					</div>
				</div>
			</div>
			
				<form role="form" action="<?php echo base_url("index.php/pages/insert_ebook_kontributor")?>" method="POST" enctype="multipart/form-data" name="myform" id="myform">
					<div class="panel-footer">					
						<div class="form-group">
							<label>Kategori *</label>
							<font color = "red"><div id='myform_kategori_errorloc' class="error_strings"></div></font>
							<select class="form-control" name="kategori">								
								<option selected disabled></option>
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
							<font color = "red"><div id='myform_judul_errorloc' class="error_strings"></div></font>
							<textarea class="form-control" name="judul" rows="5" ></textarea>				
						</div>
						<div class="form-group">
							<label>Pengarang *</label>
							<font color = "red"><div id='myform_pengarang_errorloc' class="error_strings"></div></font>
							<input class="form-control" name="pengarang">						
						</div>
						<div class="form-group">
							<label>Penerbit *</label>
							<font color = "red"><div id='myform_penerbit_errorloc' class="error_strings"></div></font>
							<input class="form-control" name="penerbit">						
						</div>
						<div class="form-group">
							<label>Tahun *</label>
							<font color = "red"><div id='myform_tahun_errorloc' class="error_strings"></div></font>
							
							<?php	
								echo "<select class=\"form-control\" name=\"tahun\">";	
								echo "<option selected disabled></option>";
								for($i=2015 ; $i>1930 ; $i--)
								{
									
										echo "<option>$i</option>";
								
								}							
									echo "</select>";
							?>
						</div>
						<div class="form-group">
							<label>Sinopsis *</label> 
							<font color = "red"><div id='myform_sinopsis_errorloc' class="error_strings"></div></font>
							<label><i><font size="1px" color="brown">Panjang maksimal 500 digit</font></i></label>
							<textarea class="form-control" rows="3" name="sinopsis"></textarea>
						</div>
						<div class="form-group">
							<label>Upload File *</label>
							<label><i><font size="1px" color="brown">File harus berekstensi .pdf</font></i></label>
							<input type="file" name="userfile">
						</div>
						<button type="submit" class="btn btn-primary">Tambahkan</button>
						<div class="clearfix"></div>
					</div>
				</form>
				</div>
			
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

			frmvalidator.addValidation("judul","req","ERROR: Judul Ebook harus diisi!");			
			frmvalidator.addValidation("kategori","req","ERROR: Kategori Ebook harus diisi!");			
			frmvalidator.addValidation("pengarang","req","ERROR: Pengarang Ebook harus diisi!");			
			frmvalidator.addValidation("penerbit","req","ERROR: Penerbit Ebook harus diisi!");			
			frmvalidator.addValidation("tahun","req","ERROR: Tahun Ebook harus diisi!");			
			frmvalidator.addValidation("sinopsis","req","ERROR: Sinopsis Ebook harus diisi!");			

			
		//]]>
	</script>
	