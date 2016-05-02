<div class="row" style="background-color:#003399">
	<div class="col-lg-12" >
		
		<h1><font color="white">Hapus Ebook</font></h1>
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
						<table>
							<tr>
								<td width="90px">ID</td>
								<td width="50px">:</td>
								<td width="50px"><?php echo $id_ebook?></td>
							</tr>
							<tr>
								<td width="120px">Judul</td>
								<td width="50px">:</td>
								<td width="350px"><?php echo $judul?> </td>
							</tr>																
							<tr>
								<td>Kategori</td>
								<td>:</td>
								<td><?php echo $kategori?></td>
							</tr>
							<tr>
								<td>Pengarang</td>
								<td>:</td>
								<td><?php echo $pengarang?></td>
							</tr>
							<tr>
								<td>Tahun</td>
								<td>:</td>
								<td><?php echo $tahun?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
				<div class="panel-footer">
				<font color="red" ><b> PERINGATAN! </b><br />
				Data yang telah dihapus tidak dapat dikembalikan lagi! <br /><br /></font>				
				<form action="<?php echo base_url("index.php/pages/hapus_ebook_bt/".$id_ebook."")?>">
					<button type="submit" class="btn btn-danger">Hapus Ebook</button>
				<div class="clearfix"></div>
				</form>
				</div>
		</div>
	</div>               							
</div>
<!-- /.row -->

</div>
<!-- /.row -->
