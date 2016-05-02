<!-- VALIDATION SCRIPT-->
	<script language="JavaScript" src="<?php echo base_url('public')?>/validation/gen_validatorv4.js"
		type="text/javascript" xml:space="preserve">
	</script>
	
	<div class="row" style="background-color:#003399">
				<div class="col-lg-12" >
					
					<h1><font color="white">Pesan Ebook</font></h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<br />
	<div class="row">
		<div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading" >
					Silahkan melengkapi form pemesanan Ebook!
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<form role="form" action="<?php echo base_url("index.php/pages/insertPesanEbook")?>" method="post" name="myform" id="myform">
								<div class="form-group">
									<label>Judul *</label>
									 <font color = "red"><div id='myform_judul_errorloc' class="error_strings"></div></font>
									<input class="form-control" name="judul">
									<p class="help-block">Contoh : Pendekatan Algoritma Fuzzy</p>
								</div>
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
									<label><font color="brown" size="1px"><i>*) Harus diisi</i></font></label>
								</div>
								<button type="submit" class="btn btn-primary" >Pesan</button>                                        
							</form>
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

<!-- VALIDATION SCRIPT-->
	<script language="JavaScript" type="text/javascript"
			xml:space="preserve">//<![CDATA[
		//You should create the validator only after the definition of the HTML form
	  	    var frmvalidator  = new Validator("myform");
			frmvalidator.EnableOnPageErrorDisplay();
			frmvalidator.EnableMsgsTogether();

			frmvalidator.addValidation("judul","req","ERROR: Judul Ebook harus diisi!");			
			frmvalidator.addValidation("kategori","req","ERROR: Kategori Ebook harus diisi!");			

			
		//]]>
	</script>
	