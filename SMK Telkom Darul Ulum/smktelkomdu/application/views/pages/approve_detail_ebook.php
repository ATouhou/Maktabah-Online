<!-- VALIDATION SCRIPT-->
	<script language="JavaScript" src="<?php echo base_url('public')?>/validation/gen_validatorv4.js"
		type="text/javascript" xml:space="preserve">
	</script>
	
<div class="row" style="background-color:#003399">
	<div class="col-lg-12" >
		
		<h1><font color="white">Persetujuan Ebook Kontributor</font></h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<br />
<form action = "<?php echo base_url('index.php/pages/approve_action')?>" method="post" name="myform" id="myform">
<table>
	<tr>
		<td width = "500px">
			<div class="form-group">
				<label>ID Ebook</label>
				<input class="form-control" name="id_ebook" readOnly="true" value="<?php echo $id_ebook?>">
			</div>
			<div class="form-group">
				<label>Judul</label>
				<textarea class="form-control" rows="4" disabled><?php echo $judul?></textarea>
			</div>
			<div class="form-group">
				<label>Kategori</label>
				<input class="form-control" name="kategori" disabled value="<?php echo $kategori?>">
			</div>
			<div class="form-group">
				<label>Pengarang</label>
				<input class="form-control" name="pengarang" disabled value="<?php echo $pengarang?>">
			</div>
			<div class="form-group">
				<label>Tahun</label>
				<input class="form-control" disabled value="<?php echo $tahun?>">
			</div>
			<div class="form-group">
				<label>Penerbit</label>
				<input class="form-control" name="penerbit" disabled value="<?php echo $penerbit ?>">
			</div> 
			
		</td>
		<td width="10px">
		</td>
		<td width="500px">
		<div class="form-group">
					<label>Sinopsis</label>
					<textarea class="form-control" rows="22" disabled><?php echo $sinopsis?></textarea>
			</div>
		</td>
		<td width = "10px">
		</td>
	<tr>
</table>
<br />

<a type="button" href="<?php echo base_url('uploads/')?>/<?php echo $path_ebook?>.pdf"><b><font color = "red">DOWNLOAD </font></b></a>

<hr />
			<div class="panel-heading">
				<font color="blue"><b>TINDAKAN</b></font>
				<font color = "red"><div id='myform_pilih_errorloc' class="error_strings"></div></font>
			</div>
			<!-- /.panel-heading -->
			
			<div class="panel-body">				
				
						<div class="form-group">							
							<select class="form-control" name="pilih" id="pilih">											
								<option selected disabled></option>
								<option value='1'>Approve</option>
								<option value='4'>Disapprove</option>										
							</select>																
						</div>

						<div class="col-xs-30 text-right">   
						<button type="submit" class="btn btn-primary">Submit</button>
						</div>
				</form>
			</div>
			
			
<!-- VALIDATION SCRIPT-->
	<script language="JavaScript" type="text/javascript"
			xml:space="preserve">//<![CDATA[
		//You should create the validator only after the definition of the HTML form
	  	    var frmvalidator  = new Validator("myform");
			frmvalidator.EnableOnPageErrorDisplay();
			frmvalidator.EnableMsgsTogether();

			frmvalidator.addValidation("pilih","req","ERROR: Tindakan persetujuan harus diisi!");			

			
		//]]>
	</script>
	