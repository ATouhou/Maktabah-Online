<div class="row" style="background-color:#003399">
	<div class="col-lg-12" >
		
		<h1><font color="white">Detail Ebook</font></h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<br />

<table>
	<tr>
		<td width = "600px">
			<div class="form-group">
				<label>Judul</label>
				<textarea class="form-control" rows="2" disabled><?php echo $judul?></textarea>
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
				<input class="form-control" name="penerbit" disabled value="<?php echo $penerbit?>">
			</div> 
			<div >
				<label>Sinopsis</label>
				<textarea class="form-control" rows="6" disabled><?php echo $sinopsis?></textarea>
			</div>
		</td>
		<td width="10px">
		</td>
		<td width="500px">
			<div class="chat-panel panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-comments fa-fw"></i>
					Komentar
				</div>
				<!-- /.panel-heading -->				
				 <div class="panel-body">
					<ul class="chat">
						<?php 
							foreach($komentar as $rows)
							{
								echo "<div class=\"chat-body clearfix\">";
										echo "<div class=\"header\">";
											echo "<strong class=\"primary-font\"><font color=\"#3b5998\">".$rows['EMAIL']."</font></strong>"; 
											echo "<small class=\"pull-right text-muted\">";
												echo "<i class=\"fa fa-clock-o fa-fw\"></i> ".$rows['WAKTU_KMT']."";
											echo "</small>";
										echo "</div>";
										echo "<p>";
											echo "<font color=\"#404040\">".$rows['ISI_KMT']."</font>";
										echo "</p>";
									echo "</div>";
							}
						?>
					</ul>
				</div>
			<!-- /.panel-body -->
				<div class="panel-footer">
					<form action="<?php echo base_url("index.php/pages/komentar_bt/".$id_ebook."")?>" method="post">
						<div class="input-group">					
							<input name="isi" type="text" class="form-control input-sm" placeholder="Tulis komentarmu disini" />
							<span class="input-group-btn">
								<button class="btn btn-primary btn-sm" id="btn-chat">
									Komentar
								</button>
							</span>					
						</div>
					</form>
				</div>
				<!-- /.panel-footer -->
		</div>
		</td>
	</tr>
	
</table>
<br />


<a type="button" href="<?php echo base_url('uploads/')?>/<?php echo $path_ebook?>.pdf"><b><font color = "red">DOWNLOAD </font></b></a>



<script type="text/javascript">
/* 
window.onload = function (){

	var success = new PDFObject({ url: "<?php echo base_url('uploads/')?>/<?php echo $path_ebook?>.pdf" }).embed("pdf");
	
};
 */
</script>