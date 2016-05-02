<div class="row" style="background-color:#003399">
	<div class="col-lg-12" >
		
		<h1><font color="white">Detail Ebook</font></h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<br />
<table>
	<tr>
		<td width = "500px">
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
					<textarea class="form-control" rows="19" disabled><?php echo $sinopsis?></textarea>
			</div>
		</td>
		<td width = "10px">
		</td>
	<tr>
</table>
<a type="button" href="<?php echo base_url('uploads/')?>/<?php echo $path_ebook?>.pdf"><b><font color = "red">DOWNLOAD </font></b></a>